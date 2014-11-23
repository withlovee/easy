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
		$this->question->userId = Auth::user()->id;
		$this->question->itemId = $input['id'];
		$this->question->content = $input['content'];
		$this->question->answer = '';

		if (!$this->question->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->question->errors);
        }

        $this->question->save();
        
		return Redirect::action('ItemController@showItem', array('id'=>$input['id']))->with('notice','คำถามของท่านถูกส่งไปยังผู้ขายเรียบร้อยแล้วค่ะ');
    }

    public function answer()
	{
		$input = Input::all();
		$question = ItemQuestion::find($input['id']);
		$question->answer = $input['answer'];
		print_r($input);
		print_r($question);
		//return View::make('emptypage');
        $question->save();
        
		return Redirect::back()->with('notice','ตอบคำถามเรียบร้อยค่ะ');
    }

}