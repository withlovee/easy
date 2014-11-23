<?php

class SupportTicket extends Eloquent{

    protected $fillable = ['reporterId', 'reporteeId', 'administratorId', 'title', 'content', 'answer'];

    public static $rules = [
        'reporterId' => 'required',
        'reporteeId' => 'required',
        'title' => 'required',
        'content' => 'required'
    ];

    public $errors;

    public function isValid()
    {
        $validation = Validator::make($this->attributes, static::$rules);

        if($validation->passes()) {
            return true;
        }

        $this->errors = $validation->messages();

        return false;
    }

	public function reporter()
    {
        return $this->belongsTo('User','reporter_id');
    }

    public function reportee()
    {
        return $this->belongsTo('User','reportee_id');
    }

    public function administrator()
    {
        return $this->belongsTo('Administrator');
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

}