<?php

class SupportTicket extends Eloquent{

    protected $fillable = ['reporterId', 'reporteeId', 'administratorId', 'title', 'content', 'answer'];

	public function reporter()
    {
        return $this->belongsTo('User','reporterId');
    }

    public function reportee()
    {
        return $this->belongsTo('User','reporteeId');
    }

    public function administrator()
    {
        return $this->belongsTo('Administrator');
    }

    public function scopeListByUser($query,$id){
        return $query->where('reporterId', '=', $id)->orderBy('created_at', 'desc');
    }

    public static function getReporteeCandidate($reporterUser) {

        $users = null;

        if($reporterUser->isBuyer()) {
            $users = DB::table('transactions')
                        ->where('buyerId', '=', $reporterUser->id)
                        ->join('users', 'sellerId', '=', 'users.id')
                        ->select('users.*')->distinct()
                        ->orderBy('users.username', 'asc')->get();
        }
        else if($reporterUser->isSeller()){
            $users = DB::table('transactions')
                        ->where('sellerId', '=', $reporterUser->id)
                        ->join('users', 'buyerId', '=', 'users.id')
                        ->select('users.*')->distinct()
                        ->orderBy('users.username', 'asc')->get();
        }

        return $users;
    }

    public static function reply($id, $input){
        $ticket = self::find($id);
        $ticket->answer = $input['content'];
        $ticket->answered_at = date('Y-m-d h:i:s', time());
        $ticket->administratorId = get_admin();
        $ticket->save();
        return $ticket;
    }

    public static function createTicket($input){
        $ticket = new SupportTicket($input);
        $ticket->reporterId = Auth::user()->id;
        $ticket->administratorId = null;
        $ticket->answer = '';
        $ticket->save();
        return $ticket;
    }

}