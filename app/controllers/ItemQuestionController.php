<?php



/**
 * ItemQuestionController Class
 *
 * Implements actions regarding user management
 */
class ItemQuestionController extends Controller
{
	protected $question;

	public function __construct(ItemQuestion $question)
	{
		$this->question = $question;
	}

	public function create()
	{
		$input = Input::all();
		$this->question = ItemQuestion::createItemQuestion($input);
		if(!$this->question)
			return Redirect::back()->withInput()->withErrors($this->question->errors);        
		return Redirect::action('ItemController@showDirectItem', 
			array('id'=>$input['id']))
			->with('notice','คำถามของท่านถูกส่งไปยังผู้ขายเรียบร้อยแล้วค่ะ');
	}

	public function answer()
	{
		$input    = Input::all();
		$question = ItemQuestion::answer($input);
		
		return Redirect::back()->with('notice','ตอบคำถามเรียบร้อยค่ะ');
	}

}