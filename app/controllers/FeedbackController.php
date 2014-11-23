<?php

class FeedbackController extends BaseController {

	public function create($id)
	{
		$input = Input::all();
		Feedback::newFeedback($id, $input);

		$user = User::find($id);
		$feedbacks = Feedback::receiver($id)->get();

		foreach ($feedbacks as $feedback) {
			$senderId = $feedback->senderId;
			$feedback->sender = User::find($senderId)->username;
		}

		return View::make('users.member_profile', 
			['user' => $user, 'feedbacks' => $feedbacks]);
	}


}
