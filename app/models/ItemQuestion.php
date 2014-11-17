<?php

class ItemQuestion extends Eloquent
{
	protected $table = 'item_questions';
	protected $fillable=array('content','answer','itemId','userId');

	public $timestamps = false;

	public function item(){
		return $this->belongsTo('Item','itemId');
	}

	public function user(){
		return $this->belongsTo('User','userId');
	}
    
}