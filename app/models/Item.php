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
		return $this->belongsTo('BidManager','bidManagerId','id');
	}

    public function seller()
    {
        return $this->belongsTo('User','sellerId','id');
    }

    public static function timeSentence($item){
        $closed = new DateTime($item->endDateTime);
        $today = new DateTime();
        $dif = $closed->diff($today);
        if($dif->invert==0) $timeSentence = 'หมดเวลาประมูล';
        else{
            $day = $dif->days;
            $hour = $dif->h;
            $min = $dif->i;
            $timeSentence = 'เหลือเวลาประมูลอีก '.$day.' วัน '.$hour.' ชั่วโมง '.$min.' นาที';
        }           
        return $timeSentence;
    }

  public function getUrl() {
    return URL::to('item/'.$this->id);
  }

  public function getTotalCostWithoutTax($amount){
        return $this->price*$amount;
    }

    public function getShippingPrice($shippingType) {
        $prices = json_decode($this->shipping,true);
        return $prices[$shippingType];
    }
    
}