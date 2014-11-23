<?php

/**
 * UsersController Class
 *
 * Implements actions regarding user management
 */
class ItemController extends Controller
{

	protected $item;

	public function __construct(Item $item)
	{
		$this->item = $item;
	}

	public function showItem($id){
		$auction    = Item::availableAuctionItem()->count();
		$direct     = Item::availableDirectItem()->count();
		$item       = Item::find($id);
		$item_count = [
			'auction' => $auction,
			'direct'  => $direct,
			'all'     => $auction + $direct];

		if(Auth::user()!=null && $item->sellerId == Auth::user()->id){
			$questions = ItemQuestion::listByItem($id)->get();
		}
		else{
			$questions = ItemQuestion::listAnsweredByItem($id)->get();
		}


		$deliver=array();
		foreach(json_decode($item->shipping) as $text => $price) 
			$deliver[$text] = $text.': '.$price.' บาท';

		if($item->type == 'direct'){	
			return View::make('item.directItem', compact('item','questions','deliver','item_count'));
		}
		elseif ($item->type == 'auction'){
			$timeSentence = Item::timesentence($item);
			$bidManager = BidManager::find($item->bidManagerId);
			$bidder = User::find($bidManager->bidderId);
			return View::make('item.auctionItem', compact('item', 'questions', 'deliver', 'item_count', 'bidder','timeSentence'));
		}
	
	}

	public function showItemSeller(){
		$perPage    = 2;
		$sellerId   = Auth::user()->id;
		$auction    = Item::sellerAuctionItem($sellerId)->count();
		$direct     = Item::sellerDirectItem($sellerId)->count();
		$item_count = [
			'auction' => $auction,
			'direct'  => $direct,
			'all'     => $auction + $direct
		];

		if(Input::get('search') != null){
			$title    = "ผลลัพธ์การค้นหาสินค้าของฉัน";
			$searchs  = explode(' ', Input::get('search'));
			$items_id = [];
			foreach ($searchs as $search) {
				$query = Item::searchSellerItem($sellerId, $search)->lists('id');
				$items_id = array_unique(array_merge($items_id,$query));
			}
			if(count($items_id) > 0)
				$items = Item::itemByIds($items_id)->paginate($perPage);
			else
				$items = [];
		}
		elseif(Input::get('show') == 'direct'){
			$title = "สินค้าขายโดยตรงของฉัน";
			$items = Item::sellerDirectItem($sellerId)->paginate($perPage);
		}
		elseif(Input::get('show') == 'auction'){
			$title = "สินค้าประมูลของฉัน";
			$items = Item::sellerAuctionItem($sellerId)->paginate($perPage);
		}
		else{
			$title = "สินค้าทั้งหมดของฉัน";
			$items = Item::sellerItem($sellerId)->paginate($perPage);
		}
		return View::make('item.sellerListItem', compact('items', 'title', 'item_count'));
	}

	public function showItemList()
	{
		$auction = Item::availableAuctionItem()->count();
		$direct = Item::availableDirectItem()->count();
		$item_count = [
			'auction' => $auction,
			'direct'  => $direct,
			'all'     => $auction + $direct
		]; 
		$perPage = 5;
		$latest = 3;
		if(Input::get('search') != null){
			$title   = "ผลลัพธ์การค้นหาสินค้า";
			$searchs = explode(' ', Input::get('search'));
			$itemIds = [];
			foreach ($searchs as $search) {
				$query   = Item::searchActiveItem($search)->lists('id'); 	
				$itemIds = array_unique(array_merge($itemIds,$query));
			}

			if($itemIds == []) 
				$items = [];
			else 
				$items = Item::itemByIds($itemIds)->paginate($perPage);
		}
		else if(Input::get('show') == 'all'){
			$title = "สินค้าทั้งหมด";
			$items = Item::availableItem()->paginate($perPage);
		}
		elseif(Input::get('show') == 'direct'){
			$title = "สินค้าขายโดยตรง";
			$items = Item::availableDirectItem()->paginate($perPage);
		}
		elseif(Input::get('show') == 'auction'){
			$title = "สินค้าประมูล";
			$items = Item::availableAuctionItem()->paginate($perPage);
		}
		else{
			$title = "สินค้าล่าสุด";
			$items = Item::availableItem()->take($latest)->get();
		}
		return View::make('item.itemList', [
			'items' => $items, 
			'title' => $title, 
			'item_count' => $item_count,
			'params' => Input::all()]);
	}

}
