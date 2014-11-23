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

	

}