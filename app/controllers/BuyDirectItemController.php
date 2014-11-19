<?php
class BuyDirectItemController extends Controller
{

	public function buyDirectItem($id){
		$input=Input::all();
		$item = Item::find($id);
		$amount = Input::get('amount');
		$deliver = Input::get('deliver');
		$price = $item->price*$amount*(100+$item->tax)/100.0;
		
		$transaction = new endTradingTransaction;
		$transaction->paymentId=null;
		$transaction->shippingId = null;
		$transaction->status = 'waiting for payment';
		if(Auth::check()){
			$transaction->buyerId = Auth::user()->getId();
		}
		$transaction->price=$price;
		$transaction->save();

		$directBuyTransaction = new endDirectBuyTransaction;
		$directBuyTransaction->amount = $amount;
		$directBuyTransaction->shippingType = $deliver;
		$directBuyTransaction->endTradingTransactionId=$transaction->id;
		$directBuyTransaction->itemId=$id;
		$directBuyTransaction->save();

		$item->quantity=$item->quantity-$amount;
		$item->save();

		return Redirect::to('item/'.$id);		
	}


}