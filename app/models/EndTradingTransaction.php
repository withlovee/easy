<?php
class EndTradingTransaction extends Eloquent{
	
	protected $table = 'end_trading_transactions';
	
	public function buyer(){
		return $this->belongsTo('User','buyerId');
	}

	// public function payment(){
	// 	return $this->belongsTo('Payment','paymentId');
	// }

	// public function shipping(){
	// 	return $this->belongsTo('Shipping','shippingId');
	// }


}