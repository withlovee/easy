<?php

class SupportTicketController extends BaseController {

    protected $support_ticket;

    public function __construct(SupportTicket $support_ticket)
    {
        $this->support_ticket = $support_ticket;
    }

	public function showAll()
	{
		if (is_admin()) {
			$support_tickets = SupportTicket::orderBy('created_at', 'desc')->get();
			
		}
		else {
			$support_tickets = SupportTicket::where('reporterId', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
		}

		foreach ($support_tickets as $support_ticket) {
			$reporterId = $support_ticket->reporterId;
			$support_ticket->reporter = User::find($reporterId)->username;

			$reporteeId = $support_ticket->reporteeId;
			$support_ticket->reportee = User::find($reporteeId)->username;
		}

		return View::make('support_ticket.SupportTicketList', ['support_tickets' => $support_tickets]);
	}

	public function show($id)
	{
		if (is_admin()) {
			$support_tickets = SupportTicket::orderBy('created_at', 'desc')->get();
		}
		else {
			$support_tickets = SupportTicket::where('reporterId', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
		}

		$support_ticket = SupportTicket::find($id);
		$reporterId = $support_ticket->reporterId;
		$support_ticket->reporter = User::find($reporterId)->username;

		$reporteeId = $support_ticket->reporteeId;
		$support_ticket->reportee = User::find($reporteeId)->username;

		if($support_ticket->administratorId != null){
			$administratorId = $support_ticket->administratorId;
			$support_ticket->administrator = Administrator::find($administratorId)->username;
		}
		return View::make('support_ticket.SupportTicket',['support_tickets' => $support_tickets,'support_ticket'=>$support_ticket]);	
	}

	public function create()
	{
		if(is_admin())
			return Redirect::action('SupportTicketController@showAll');

		if(Auth::user()->role == 'Buyer') {
			$users = DB::table('transactions')->where('buyerId', '=', Auth::user()->id)
					->join('users', 'sellerId', '=', 'users.id')
					->select('users.*')
					->distinct()->orderBy('users.username', 'asc')->get();
		}
		else {
			$users = DB::table('transactions')->where('sellerId', '=', Auth::user()->id)
					->join('users', 'buyerId', '=', 'users.id')
					->select('users.*')
					->distinct()->orderBy('users.username', 'asc')->get();
		}

		// $users = User::all();
		$list_users = ['' => 'เลือกชื่อผู้ใช้'];
		foreach ($users as $user) {
			if(!isset($list_users[$user->id])) {
		        $list_users[$user->id] = $user->username;
		    }
		}
		return View::make('support_ticket.CreateSupportTicket',
			['list_users' => $list_users]);
	}

	public function reply($id)
	{

		$input = Input::all();
		$ticket = SupportTicket::find($id);
		$ticket->answer = $input['content'];
		$ticket->answered_at = date('Y-m-d h:i:s', time());
		$ticket->administratorId = get_admin();

		$ticket->save();
 	// echo "</pre>";
		//return View::make('emptypage');

		// $input['content']
		 return Redirect::back();
	}

	public function store()
    {
		$input = Input::all();
		$this->support_ticket->reporterId = Auth::user()->id;
		$this->support_ticket->administratorId = null;
		$this->support_ticket->answer = '';
		if (!$this->support_ticket->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->support_ticket->errors);
        }

        //$input['']

		// echo "<pre>";
		// print_r($this->support_ticket);
		// print_r($input);
		// echo "</pre>";

        $this->support_ticket->save();

		// return View::make('emptypage', 
		// 	[
		// 		'reporterId' => $this->support_ticket->reporterId,
		// 		'reporteeId' => $this->support_ticket->reporteeId,
		// 		'title' => $this->support_ticket->title,
		// 		'content' => $this->support_ticket->content
		// 	]);

		return Redirect::action('SupportTicketController@showAll')->with('notice', 'ระบบได้รับข้อร้องเรียนเรียบร้อยแล้วค่ะ');
    }
}
