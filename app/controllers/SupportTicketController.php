<?php

class SupportTicketController extends BaseController {

    protected $support_ticket;

    public function __construct(SupportTicket $support_ticket)
    {
        $this->support_ticket = $support_ticket;
    }

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

	public function create()
	{
		if(Auth::user()->role == 'Admin')		// MUST CHANGE, DONT KNOW HOW TO CHECK ADMIN NOW
			return Redirect::action('SupportTicketController@showAll');

		$users = User::all();
		$list_users = ['' => 'เลือกชื่อผู้ใช้'];
		foreach ($users as $user) {
			if(!isset($list_users[$user->id])) {
		        $list_users[$user->id] = $user->username;
		    }
		}
		return View::make('support_ticket.CreateSupportTicket',
			['list_users' => $list_users]);
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

		return Redirect::action('SupportTicketController@showAll');
    }
}
