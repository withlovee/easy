<?php
class BuyDirectItemController extends Controller
{

	public function buyDirectItem($id){
		$input = Input::all();
		$item = Item::find($id);
		$amount = Input::get('amount');
		$deliver = Input::get('deliver');
		$price = $item->getTotalCostWithoutTaxAndShipping($amount);

		if($item->quantity-$amount<0){
			return Redirect::to('item/'.$id)->with('error', 'ปริมาณสินค้าที่คงเหลือไม่เพียงพอ');	
		}

		$transaction = new Transaction;
		$transaction->amount = $amount;
		$transaction->price = $price;
		$transaction->shipping = $deliver;
		$transaction->shippingCost = $item->getShippingPrice($deliver);
		$transaction->status = 'payment_waiting';
		if(Auth::check()){
			$transaction->buyerId = Auth::user()->getId();
		}
		$transaction->itemId = $id;
		$transaction->buyerFeedbackId = null;
		$transaction->sellerFeedbackId = null;
		$transaction->sellerId=$item->sellerId;
		if (Input::get('option') === '1') {
    		$transaction->service = true;
		} else {
  			$transaction->service = false;
		}
		$transaction->save();

		$item->quantity = $item->quantity - $amount;
		$item->save();

		EmailHelper::sendInvoiceEmail($transaction);

		return Redirect::to('pay/'.$transaction->id);		
	}


}