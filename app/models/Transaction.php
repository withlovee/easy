<?php

class Transaction extends Eloquent{
	
	public function buyer(){
		return $this->belongsTo('User', 'buyerId', 'id');
	}

	public function item(){
		return $this->belongsTo('Item', 'itemId', 'id');
	}

	public function buyerFeedback(){
		return $this->belongsTo('Feedback', 'buyerFeedbackId', 'id');
	}

	public function sellerFeedback(){
		return $this->belongsTo('Feedback', 'sellerFeedbackId', 'id');
	}

	public function getTotalCost() {
		return $this->amount * $this->price + $this->shippingCost;
	}

	public function getTotalTax(){
		return $this->item->tax/100.0*$this->price;
	}

	public function scopeListByBuyer($query,$id){
		return $query->where('buyerId', '=', $id)->orderBy('created_at', 'desc');
	}

	public function scopeListBySeller($query,$id){
		return $query->where('sellerId', '=', $id)->orderBy('created_at', 'desc');
	}

	static public function createTransaction($id, $input){
		$item = Item::find($id);
		if(!array_key_exists('option', $input)) $input['option'] = '0';

		if($item->quantity - $input['amount'] < 0){
			return false;
		}

		$transaction = new Transaction;
		$transaction->amount = $input['amount'];
		$transaction->price = $item->getTotalCostWithoutTaxAndShipping($input['amount']);
		$transaction->shipping = $input['deliver'];
		$transaction->shippingCost = $item->getShippingPrice($input['deliver']);
		$transaction->status = 'payment_waiting';
		$transaction->buyerId = Auth::user()->getId();
		$transaction->itemId = $id;
		$transaction->buyerFeedbackId = null;
		$transaction->sellerFeedbackId = null;
		$transaction->sellerId = $item->sellerId;
		$transaction->service = ($input['option'] == '1');
		$transaction->save();

		$item->quantity = $item->quantity - $input['amount'];
		$item->save();

		return $transaction;

	}

	static public function pay($id){
		$transaction = Transaction::find($id);
		$transaction->status = 'paid';
		$transaction->save();
		return $transaction;
	}

	static public function setStatus($id, $status){
		$transaction = self::find($id);

		if(!self::hasPermission($transaction))
			return false;

		$transaction->status = $status;
		$transaction->save();

		if($status == 'received'){
			//send email to remind buyer/seller to post feedback
			EmailHelper::sendFeedbackRequestEmail($transaction);
		}
		return $transaction;
	}

	public static function hasPermission($transaction){
		if($transaction->buyer->id != Auth::user()->id && 
		   $transaction->item->seller->id != Auth::user()->id)
			return false;
		return true;		
	}

	public function getTotal(){
		return $this->price + $this->getTotalTax() + $this->shippingCost;
	}

}