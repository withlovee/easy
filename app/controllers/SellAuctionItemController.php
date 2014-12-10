<?php

/**
 * UsersController Class
 *
 * Implements actions regarding user management
 */
class SellAuctionItemController extends Controller
{

	protected $item;

	public function __construct(Item $item)
	{
		$this->item = $item;
	}
	public function sellAuctionItem(){
		return View::make('sell_item.sellAuctionItem');		
	}
	public function createAuctionItem(){
		$file_max = ini_get('upload_max_filesize');

		try{
			$input = Input::all();

			$file = Input::file('picture');
			$filename = $file->getClientOriginalName();

			Input::file('picture')->move('upload/', $filename);

			$input['filename'] = $file->getClientOriginalName();
			$this->item = Item::createAuctionItem($input);
			

			// create BidManager

			$bidManager = BidManager::createBidManager(Input::get('price'));

			$this->item->bidManagerId = $bidManager->id;
			// $this->item->amount=NULL;
			$this->item->sellerId = Auth::user()->id;
			// $this->item->id = $input['id'];
			
			if (!$this->item->fill($input)->isValid()) {
				return Redirect::back()->withInput()->withErrors($this->item->errors)->with('error',$this->item->errors);
			}
			// echo "<pre>";
			// print_r($path);
			// echo "</pre>";

			// return View::make('emptypage');
			$this->item->save();
			$newItem = Item::orderBy('id', 'desc')->first();

			$inputDate = Carbon::createFromFormat('Y-m-d H:i',$this->item->endDateTime, "Asia/Bangkok");
			var_dump($inputDate);
			// $inputDate=Carbon::now()->addMinutes(10); 
			Queue::later($inputDate, 'EndAuctionItemController@endAuction', array('itemId' => "".$this->item->id));

			return Redirect::to('item/'.$newItem->id)->with('notice','ระบบเพิ่มสินค้าของท่านเรียบร้อยแล้วค่ะ');		
		}
		catch(Exception $e){

		 	return Redirect::back()->withInput()->withErrors($this->item->errors)->with('error','The file size should be lower than '.$file_max. 'B');
	
		}
	}

	public function deleteAuctionItem($id){
		$item = Item::find($id);
		$bidManager = BidManager::find($item->bidManagerId);
		$item->delete();
		$bidManager->delete();

		if(is_admin()) {
			return Redirect::to('/')->with('notice', 'ลบสินค้า #'.$id." เรียบร้อย!");
		} else {
			return Redirect::to('listItemSeller?show=all')->with('notice','ลบสินค้าเรียบร้อยแล้วค่ะ');		
		}
	}

	public function endAuction($job,$args){

		$itemId = $args["itemId"];

		$item = Item::find(intval($itemId));

		if($item) {

			$bidManager = BidManager::find($item->bidManagerId);
			
			if($bidManager->bidderId != null){


				$transaction = Transaction::createAuctionTransaction($item, $bidManager);

				$user = User::find($bidManager->bidderId);

				EmailHelper::sendAuctionResultEmail($user, $item);
				EmailHelper::sendInvoiceEmail($transaction);
				
			}

		}

		$job->delete();
		
	}
}
