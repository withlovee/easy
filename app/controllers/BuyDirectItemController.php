<?php
class BuyDirectItemController extends Controller{

	public function buyDirectItem($id){
		$input = Input::all();
		$transaction = Transaction::createTransaction($id, $input);
		if(!$transaction)
			return Redirect::to('item/'.$id)->with('error', 'ปริมาณสินค้าที่คงเหลือไม่เพียงพอ');	
		EmailHelper::sendInvoiceEmail($transaction);
		return Redirect::to('pay/'.$transaction->id);
	}

}