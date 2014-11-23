<?php
class BuyAuctionItemController extends Controller
{
	public function autoBid($id) {
		$input = Input::all();
		$item = Item::find($id);
		$deliver = $input['deliver'];
		$obj = json_decode($item->shipping, true);

		$bidManager = BidManager::find($item->bidManagerId);
		$price = $bidManager->updateAutoBidWinner($input['maxBid'], $input['increment'], 
						Auth::user()->id, $deliver, $obj[$deliver], Input::get('service', 0));

		if ($item->price != $price) {
			$item->price = $price;
			$item->save();
		}

		return Redirect::to('item/'.$id);
	}

	public function manualBid($id) {
		$input = Input::all();
		$item = Item::find($id);
		$deliver = $input['deliver'];
		$obj = json_decode($item->shipping, true);

		$bidManager = BidManager::find($item->bidManagerId);
		$price = $bidManager->updateManualBidWinner($input['maxBid'], 
						Auth::user()->id, $deliver, $obj[$deliver], Input::get('service', 0));
		
		if ($item->price != $price) {
			$item->price = $price;
			$item->save();
		}

		return Redirect::to('item/'.$id);
	}

}