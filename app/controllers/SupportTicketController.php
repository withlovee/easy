<?php

class SupportTicketController extends BaseController {

	public function showAll()
	{
		//$data = array();
		$support_tickets = SupportTicket::all();
		foreach ($support_tickets as $support_ticket) {
			$reporterId = $support_ticket->reporterId;
			$support_ticket->reporter = User::find($reporterId)->username;

			$reporteeId = $support_ticket->reporteeId;
			$support_ticket->reportee = User::find($reporteeId)->username;
		}
		//
		return View::make('support_ticket.SupportTicketList', ['support_tickets' => $support_tickets]);
	}

	public function show($id)
	{
		return View::make('support_ticket.SupportTicket');	
	}

}
