<?php

class Item extends Eloquent
{
	protected $table = 'items';
	protected $fillable=array('name','price','brand','model','volumn','property','size','quantity','quality','defect','returnPolicy','returnFee','shipping','tax','others','type','endDateTime','amount','bidManagerId','sellerId');

	public $timestamps = false;

	public static $rules = [
        'name' => 'required',
        'quantity' => 'required',
        'price' => 'required',
        'property' => 'required'
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

	public function bidManager(){
		return $this->belongsTo('BidManager','bidManagerId');
	}
    
}