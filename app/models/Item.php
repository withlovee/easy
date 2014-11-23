<?php

class Item extends Eloquent
{
	protected $table = 'items';
	protected $fillable = array('name','price','brand','model','volumn','property','size','quantity','quality','defect','returnPolicy','returnFee','tax','service','others','type','endDateTime','bidManagerId','sellerId');

	public $timestamps = false;

	public static $rules = [
		'name' => 'required',
		'quantity' => 'required',
		'price' => 'required',
		'property' => 'required'
	];

	public $errors;

	public function scopeAvailableItem($query){
		return $query->where('quantity','>','0')
			->where(function ($query) {
				$query->where('endDateTime', '>', new DateTime('now'))
					->orWhere('endDateTime', '=', null);
				})
			->orderBy('id', 'desc');
	}

	public function scopeAvailableAuctionItem($query){
		return $query->where('quantity','>','0')
			->where('type','=','auction')
			->where('endDateTime', '>', new DateTime('now'))
			->orderBy('id', 'desc');
	}

	public function scopeAvailableDirectItem($query){
		return $query->where('quantity','>','0')->where('type','=','direct')->orderBy('id', 'desc');
	}

	public function scopeSellerItem($query, $sellerId){
		return $query->where('sellerId','=',$sellerId)->orderBy('id', 'desc');
	}

	public function scopeSellerAuctionItem($query, $sellerId){
		return $query->where('sellerId','=',$sellerId)->where('type','=','auction')->orderBy('id', 'desc');
	}

	public function scopeSellerDirectItem($query, $sellerId){
		return $query->where('sellerId','=',$sellerId)->where('type','=','direct')->orderBy('id', 'desc');
	}

	public function scopeSearchSellerItem($query, $sellerId, $search){
		return $query->where('sellerId','=',$sellerId)
			->where('name','LIKE','%'.$search.'%')
			->orWhere('property','LIKE','%'.$search.'%');
	}

	public function scopeSearchActiveItem($query, $search){
		return $query->where('quantity','>','0')
			->where('name','LIKE','%'.$search.'%')
			->orWhere('property','LIKE','%'.$search.'%')
			->where(function($query) {
				$query->where('endDateTime', '>', new DateTime('now'))
					->orWhere('endDateTime', '=', null);
				});
	}

	public function scopeItemByIds($query, $ids){
		return $query->whereIn('id', $ids)->orderBy('id', 'desc');
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


	public function getTotalCostWithoutShipping($amount){
		return $this->price*$amount*(100.0+$this->tax)/100.0;
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