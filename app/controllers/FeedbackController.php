<?php

class FeedbackController extends BaseController {

    //protected $feedback;

    //public function __construct(Feedback $feedback)
    //{
    //    $this->feedback = $feedback;
    //}

	public function create($id)
	{
		$feedback = new Feedback;
		$feedback->senderId = Auth::user()->getId();
		$feedback->receiverId = $id;
		$feedback->content = Input::get('content');
		$feedback->transactionId = Input::get('transaction_id');
		$feedback->score = Input::get('score');

		$feedback->save();		
		$user = User::find($id);
		$feedbacks = Feedback::where('receiverId', '=', $id)->orderBy('created_at', 'desc')->get();

		foreach ($feedbacks as $feedback) {
			$senderId = $feedback->senderId;
			$feedback->sender = User::find($senderId)->username;
		}

		return View::make('users.member_profile', 
			['user' => $user, 'feedbacks' => $feedbacks]);
	}
}
