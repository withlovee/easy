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

    public function scopeReceiver($query, $id){
        return $query->where('receiverId', '=', $id)->orderBy('created_at', 'desc');
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

    public static function newFeedback($id, $input){
        $feedback = new Feedback;
        $user = Auth::user();
        $feedback->senderId = $user->getId();
        $feedback->receiverId = $id;
        $feedback->content = $input['content'];
        $feedback->transactionId = $input['transaction_id'];
        $feedback->score = $input['score'];
        $feedback->save();

        if($user->role == 'Seller'){
            $transaction = Transaction::find($feedback->transactionId);
            $transaction->buyerFeedbackId = $feedback->id;
            $transaction->save();
        }
        if($user->role == 'Buyer'){
            $transaction = Transaction::find($feedback->transactionId);
            $transaction->sellerFeedbackId = $feedback->id;
            $transaction->save();
        }
        return $feedback;
    }

}
