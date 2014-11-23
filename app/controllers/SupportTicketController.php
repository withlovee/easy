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
			$support_tickets = SupportTicket::listByUser(Auth::user()->id)->get();
		}

		return View::make('support_ticket.SupportTicketList', ['support_tickets' => $support_tickets]);
	}

	public function show($id)
	{
		if (is_admin()) {
			$support_tickets = SupportTicket::orderBy('created_at', 'desc')->get();
		}
		else {
			$support_tickets = SupportTicket::listByUser(Auth::user()->id)->get();
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
		$reporter = Auth::user();

		$users = SupportTicket::getReporteeCandidate($reporter);
		$list_users = ['' => 'เลือกชื่อผู้ใช้'];
		foreach ($users as $user) {
			$list_users[$user->id] = $user->username;
		}
		return View::make('support_ticket.CreateSupportTicket', [
			'list_users' => $list_users
		]);
	}

	public function reply($id)
	{
		$input = Input::all();
		SupportTicket::reply($id, $input);
		return Redirect::back();
	}

	public function store()
	{
		$input = Input::all();
		$this->support_ticket = SupportTicket::createTicket($input);
		if(!$this->support_ticket)
			return Redirect::back()->withInput()->withErrors($this->support_ticket->errors);
		return Redirect::action('SupportTicketController@showAll')->with('notice', 'ระบบได้รับข้อร้องเรียนเรียบร้อยแล้วค่ะ');
	}
}
