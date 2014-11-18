<?php

class ItemQuestion extends Eloquent
{
	protected $table = 'item_questions';
	protected $fillable=array('content','answer','itemId','userId');

	public $timestamps = false;

	public static $rules = [
        'content' => 'required',
        'itemId' => 'required',
        'userId' => 'required'
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

	public function item(){
		return $this->belongsTo('Item','itemId');
	}

	public function user(){
		return $this->belongsTo('User','userId');
	}
    
}