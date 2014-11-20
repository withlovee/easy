<?php

class Feedback extends Eloquent
{
	protected $fillable = ['senderId', 'receiverId', 'transactionId', 'content', 'score'];

    public static $rules = [
        'senderId' => 'required',
        'receiverId' => 'required',
        'transactionId' => 'required',
        'content' => 'required',
        'score' => 'required'
    ];

    public $errors;

    public function create(){
        
    }
    public function isValid()
    {
        $validation = Validator::make($this->attributes, static::$rules);

        if($validation->passes()) {
            return true;
        }

        $this->errors = $validation->messages();

        return false;
    }

}
