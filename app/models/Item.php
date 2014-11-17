<?php

class Item extends Eloquent
{
	protected $fillable=array('id','name','picture','price','brand','model','volumn','property','size','quantity','quality','defect','returnPolicy','returnFee','shipping','tax','others','type','endDateTime','amount','bidManagerId');

	public $timestamps = false;

	public function bidManager(){
		return $this->belongsTo('BidManager','bidManagerId');
	}

  public function getUrl() {
    return URL::to('item/'.$this->id);
  }
    
}