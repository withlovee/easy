<?php

class SupportTicket extends Eloquent{
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

}