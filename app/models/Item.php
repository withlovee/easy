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

	static public function createAuctionItem($input){
		$item = new Item($input);
		$shipping = array(
			'แบบด่วน' => $input['quick'], 
			'แบบมาตรฐาน' => $input['standard'], 
			'แบบประหยัด' => $input['cheap']
		);
		$item->picture = $input['filename'];
		$item->type = 'auction';
		$item->shipping = json_encode($shipping);
		$item->endDateTime = $input['endDate'].' '.$input['endTime'];
		$item->quantity = 1;
		$item->save();
		return $item;
		
	}

	static public function createDirectItem($input){
		$item = new Item($input);
		$shipping = array(
			'แบบด่วน' => $input['quick'], 
			'แบบมาตรฐาน' => $input['standard'], 
			'แบบประหยัด' => $input['cheap']
		);
		$item->picture = $input['filename'];
		$item->type = 'direct';
		$item->shipping = json_encode($shipping);
		$item->endDateTime = NULL;
		$item->bidManagerId = NULL;
		$item->sellerId = Auth::user()->id;
		$item->save();
		return $item;
		
	}
}