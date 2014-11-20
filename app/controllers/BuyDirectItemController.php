<?php
class BuyDirectItemController extends Controller
{

	public function buyDirectItem($id){
		$input=Input::all();
		$item = Item::find($id);
		$amount = Input::get('amount');
		$deliver = Input::get('deliver');
		$price = $item->price*$amount*(100+$item->tax)/100.0;
		$obj = json_decode($item->shipping,true);

		$transaction = new Transaction;
		$transaction->amount = $amount;
		$transaction->price=$price;
		$transaction->shipping=$deliver;
		$transaction->shippingCost=$obj[$deliver];
		$transaction->status = 'payment_waiting';
		if(Auth::check()){
			$transaction->buyerId = Auth::user()->getId();
		}
		$transaction->itemId=$id;
		$transaction->buyerFeedbackId = null;
		$transaction->sellerFeedbackId = null;
		$transaction->sellerId=$item->sellerId;
		$transaction->save();

		$item->quantity=$item->quantity-$amount;
		$item->save();

		return Redirect::to('pay/'.$transaction->id);		
	}


}