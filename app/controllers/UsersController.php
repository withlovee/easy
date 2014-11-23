<?php



/**
 * UsersController Class
 *
 * Implements actions regarding user management
 */
class UsersController extends Controller
{

	// public function index(){
	// 	$users = User::orderBy('id', 'ASC')->get();
	// 	return View::make('users.index', compact('users'));
	// }

	/**
	 * Displays the form for account creation
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function create()
	{
		return View::make('users.signup');
	}

	/**
	 * Stores new account
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function store()
	{
		$repo = App::make('UserRepository');
		$input = Input::all();

		// Username should be between 6-20 characters
		if(strlen($input['username']) < 6 || strlen($input['username']) > 20)
			return Redirect::action('UsersController@create')
				->withInput(Input::except('password'))
				->with('error', 'ชื่อผู้ใช้ต้องมีขนาดระหว่าง 6-20 ตัว');

		// Two passwords should be the same
		if($input['password'] != $input['password_confirmation'])
			return Redirect::action('UsersController@create')
				->withInput(Input::except('password'))
				->with('error', 'กรุณายืนยันรหัสผ่านให้เหมือนกับรหัสผ่าน');

		// Password should be between 6-20 characters
		if(strlen($input['password']) < 6 || strlen($input['password']) > 20)
			return Redirect::action('UsersController@create')
				->withInput(Input::except('password'))
				->with('error', 'รหัสผ่านต้องมีขนาดระหว่าง 6-20 ตัว');

		$user = $repo->signup(Input::all());

		if ($user->id) {
			if (Config::get('confide::signup_email')) {
				// Send confirmation code to user's email
				Mail::queueOn(
					Config::get('confide::email_queue'),
					Config::get('confide::email_account_confirmation'),
					compact('user'),
					function ($message) use ($user) {
						$message
							->to($user->email, $user->username)
							->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
					}
				);
			}

			return Redirect::to('/')
				->with('notice', 'สมัครสมาชิกเรียบร้อยแล้วค่ะ กรุณาตรวจสอบอีเมลล์ของท่านเพื่อกดยืนยันตัวตนก่อนเข้าใช้งาน');
		} else {
			$error = $user->errors()->all(':message');

			return Redirect::action('UsersController@create')
				->withInput(Input::except('password'))
				->with('error', $error);
		}
	}

	/**
	 * Displays the login form
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function login()
	{
		if (Confide::user()) {
			return Redirect::to('/');
		} else {
			return View::make('users.login');
			// return View::make(Config::get('confide::login_form'));
		}
	}

	/**
	 * Attempt to do login
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function doLogin()
	{
		$repo = App::make('UserRepository');
		$input = Input::all();

		if ($repo->login($input)) {
			User::checkUpdateBanStatus(Auth::user());
			if(Auth::check()&&Auth::user()->isBanned){
				return Redirect::to('users/forceLogout');
			}
			return Redirect::intended('/');
		} 

		else {
			if ($repo->isThrottled($input)) {
				$err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
			} elseif ($repo->existsButNotConfirmed($input)) {
				$err_msg = Lang::get('confide::confide.alerts.not_confirmed');
			} else {
				$err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
			}

			return Redirect::action('UsersController@login')
				->withInput(Input::except('password'))
				->with('error', $err_msg);
		}
	}

	/**
	 * Attempt to confirm account with code
	 *
	 * @param  string $code
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function confirm($code)
	{
		if (Confide::confirm($code)) {
			$notice_msg = Lang::get('confide::confide.alerts.confirmation');
			return Redirect::action('UsersController@login')
				->with('notice', $notice_msg);
		} else {
			$error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
			return Redirect::action('UsersController@login')
				->with('error', $error_msg);
		}
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function logout(){
		Confide::logout();

		return Redirect::to('/');
	}

	public function forceLogout(){
		Confide::logout();

		return Redirect::to('login')->with('error','ขณะนี้คุณถูกระงับการใช้งาน เนื่องจากทำผิดกฏของเว็บ');
		
	}

	public function profile(){
		$user = Auth::user();
		return View::make('users.profile', compact('user'));			
	}

	public function doProfile(){
		$repo = App::make('UserRepository');
		$user = $repo->profile(Input::all());
		$error = $user->errors()->all();
		if(empty($error)) {
			return Redirect::action('UsersController@profile')
				->with('notice', 'ปรับปรุงข้อมูลเรียบร้อยแล้ว');
		} else {
			return Redirect::action('UsersController@profile', array($user->id))
				->withInput(Input::except('password'))
				->with('error', $error);
		}
	}

	public function show($id){
		$user = User::find($id);
		$country = User::countryList();
		$feedbacks = Feedback::receiver($id)->get();

		foreach ($feedbacks as $feedback) {
			$senderId = $feedback->senderId;
			$feedback->sender = User::find($senderId)->username;
		}

		return View::make('users.member_profile', 
			['user' => $user, 'feedbacks' => $feedbacks, 'country' => $country]);
	}

	public function ban($id){

		$user = User::find($id);
		$feedbacks = Feedback::receiver($id)->get();

		foreach ($feedbacks as $feedback) {
			$senderId = $feedback->senderId;
			$feedback->sender = User::find($senderId)->username;
		}
		if(is_admin()){
			
			$user->banWithExpireDate(date('Y-m-d H:i:s',mktime(0,0,0,date("m")+3,date("d"),date("Y"))));
			
			//$user->unBan();
		}
		return View::make('users.member_profile', 
			['user' => $user, 'feedbacks' => $feedbacks]);
	
	}
	public function unBan($id){
		$user = User::find($id);
		if(is_admin()){
			$user->unBan();
		}

		
		$feedbacks = Feedback::receiver($id)->get();

		foreach ($feedbacks as $feedback) {
			$senderId = $feedback->senderId;
			$feedback->sender = User::find($senderId)->username;
		}
		//$user->ban();
		return View::make('users.member_profile', 
			['user' => $user, 'feedbacks' => $feedbacks]);
	
	}
}
