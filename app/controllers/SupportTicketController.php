<?php

class SupportTicketController extends BaseController {

	public function showAll()
	{
		$data = array();
		return View::make('support_ticket.SupportTicketList', $data);
	}

}
