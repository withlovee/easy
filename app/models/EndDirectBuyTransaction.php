<?php
class EndDirectBuyTransaction extends Eloquent{
	
	protected $table = 'end_direct_buy_transactions';
	
	public static $rules = [
        'amount' => 'required',
        'shippingType' => 'required',
        'endTradingTransactionId' => 'required',
        'itemId' => 'required'
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

	public function endTradingTransaction(){
		return $this->belongsTo('EndTradingTransaction','EndTradingTransactionId');
	}
}