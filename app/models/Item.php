<?php

class Item extends Eloquent
{
	protected $table = 'items';
	protected $fillable=array('name','price','brand','model','volumn','property','size','quantity','quality','defect','returnPolicy','returnFee','tax','service','others','type','endDateTime','bidManagerId','sellerId');

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

    public function seller()
    {
        return $this->belongsTo('User','sellerId');
    }

  public function getUrl() {
    return URL::to('item/'.$this->id);
  }

  public function getTotalCostWithoutTax($amount){
        return $this->price*$amount;
    }
    
}