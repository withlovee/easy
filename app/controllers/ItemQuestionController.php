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

		return Redirect::action('ItemController@showDirectItem', array('id'=>$input['id']))->with('notice','คำถามของท่านถูกส่งไปยังผู้ขายเรียบร้อยแล้วค่ะ');
    }


}