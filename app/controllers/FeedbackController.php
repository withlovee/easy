<?php

class FeedbackController extends BaseController {

    protected $feedback;

    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

	public function create()
	{
		return 0;
	}
}
