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

	public function showDirectItem($id){
		$auction = Item::where('quantity','>','0')->where('type','=','auction')->count();
		$direct = Item::where('quantity','>','0')->where('type','=','direct')->count();
		$item_count = ['auction' => $auction,
						'direct' => $direct,
						'all' => $auction+$direct]; 
		$item = Item::find($id);

		if(Auth::user()!=null && $item->sellerId == Auth::user()->id){
			$questions = ItemQuestion::where('itemId', '=', $id)->orderBy('id', 'ASC')->get();
		}
		else{
			$questions = ItemQuestion::where('itemId', '=', $id)->where('answer','!=','')->orderBy('id', 'ASC')->get();
		}


		$deliver=array();
		foreach(json_decode($item->shipping) as $text => $price) 
			$deliver[$text] = $text.': '.$price.' บาท';

		if($item->type == 'direct'){	
			return View::make('item.directItem', compact('item','questions','deliver','item_count'));
		}
		elseif ($item->type == 'auction'){
			$bidManager = BidManager::find($item->bidManagerId);
			$bidder = User::find($bidManager->bidderId);
			return View::make('item.auctionItem', compact('item', 'questions', 'deliver', 'item_count', 'bidder'));
		}
	
	}

	public function showItemSeller(){
		$perPage = 2;
		$sellerId = Auth::user()->id;
		$auction = Item::where('sellerId','=',$sellerId)->where('type','=','auction')->count();
		$direct = Item::where('sellerId','=',$sellerId)->where('type','=','direct')->count();
		$item_count = ['auction' => $auction,
		'direct' => $direct,
		'all' => $auction+$direct]; 

		if(Input::get('search') != null){
			$title = "ผลลัพธ์การค้นหาสินค้าของฉัน";
			$searchs = explode(' ', Input::get('search'));
			$items_id = [];
			foreach ($searchs as $search) {
				$query = Item::where('sellerId','=',$sellerId)->where('name','LIKE','%'.$search.'%')
				->orWhere('property','LIKE','%'.$search.'%')->lists('id');
				$items_id = array_unique(array_merge($items_id,$query));
			}
			if(count($items_id) > 0)
				$items = Item::whereIn('id', $items_id)->orderBy('id', 'desc')->paginate($perPage);
			else
				$items = [];
		}
		elseif(Input::get('show') == 'all'){
			$title = "สินค้าทั้งหมดของฉัน";
			$items = Item::where('sellerId','=',$sellerId)->orderBy('id', 'desc')->paginate($perPage);
		}
		elseif(Input::get('show') == 'direct'){
			$title = "สินค้าขายโดยตรงของฉัน";
			$items = Item::where('sellerId','=',$sellerId)->where('type','=','direct')->orderBy('id', 'desc')->paginate($perPage);
		}
		elseif(Input::get('show') == 'auction'){
			$title = "สินค้าประมูลของฉัน";
			$items = Item::where('sellerId','=',$sellerId)->where('type','=','auction')->orderBy('id', 'desc')->paginate($perPage);
		}
		else{
			$title = "สินค้าทั้งหมดของฉัน";
			$items = Item::where('sellerId','=',$sellerId)->orderBy('id', 'desc')->paginate($perPage);
		}
		return View::make('item.sellerListItem', compact('items', 'title', 'item_count'));
	}

	// public function findSellerName($item){
	// 	$user = User::find($item->sellerId);
	// 	$username = $user->username;
	// 	return $username;
	// }
	public function showItemList()
	{
		$auction = Item::where('quantity','>','0')->where('type','=','auction')->count();
		$direct = Item::where('quantity','>','0')->where('type','=','direct')->count();
		$item_count = ['auction' => $auction,
						'direct' => $direct,
						'all' => $auction+$direct]; 
		$perPage = 5;
		$latest = 3;
		if(Input::get('search') != null){
			$title = "ผลลัพธ์การค้นหาสินค้า";
			$searchs = explode(' ', Input::get('search'));
			$items_id = [];
			foreach ($searchs as $search) {
				$query = Item::where('quantity','>','0')->where('name','LIKE','%'.$search.'%')
							 ->orWhere('property','LIKE','%'.$search.'%')->lists('id'); 	
				$items_id = array_unique(array_merge($items_id,$query));
			}

			if($items_id==[]) $items = [];
			else $items = Item::whereIn('id', $items_id)->orderBy('id', 'desc')->paginate($perPage);
		}
		else if(Input::get('show') == 'all'){
			$title = "สินค้าทั้งหมด";
			$items = Item::where('quantity','>','0')->orderBy('id', 'desc')->paginate($perPage);
		}
		elseif(Input::get('show') == 'direct'){
			$title = "สินค้าขายโดยตรง";
			$items = Item::where('quantity','>','0')->where('type','=','direct')->where('quantity','!=','0')->orderBy('id', 'desc')->paginate($perPage);
		}
		elseif(Input::get('show') == 'auction'){
			$title = "สินค้าประมูล";
			$items = Item::where('quantity','>','0')->where('type','=','auction')->where('quantity','!=','0')->orderBy('id', 'desc')->paginate($perPage);
		}
		else{
			$title = "สินค้าล่าสุด";
			$items = Item::where('quantity','>','0')->orderBy('id', 'desc')->where('quantity','!=','0')->take($latest)->get();
		}
		return View::make('item.itemList', [
			'items' => $items, 
			'title' => $title, 
			'item_count' => $item_count,
			'params' => Input::all()]);
	}

}
