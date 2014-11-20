<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		$auction = Item::where('type','=','auction')->count();
		$direct = Item::where('type','=','direct')->count();
		$item_count = ['auction' => $auction,
						'direct' => $direct,
						'all' => $auction+$direct]; 
		$perPage = 3;
		$latest = 1;
		if(Input::get('search') != null){
			$title = "ผลลัพธ์การค้นหาสินค้า";
			$searchs = explode(' ', Input::get('search'));
			$items_id = [];
			foreach ($searchs as $search) {
				$query = Item::where('quantity','!=','0')->where('name','LIKE','%'.$search.'%')
							 ->orWhere('property','LIKE','%'.$search.'%')->lists('id'); 	
				$items_id = array_unique(array_merge($items_id,$query));
			}

			if($items_id==[]) $items = [];
			else $items = $items = Item::whereIn('id', $items_id)->paginate($perPage);
		}
		else if(Input::get('show') == 'all'){
			$title = "สินค้าทั้งหมด";
			$items = Item::where('quantity','!=','0')->orderBy('id', 'desc')->paginate($perPage);
		}
		elseif(Input::get('show') == 'direct'){
			$title = "สินค้าขายโดยตรง";
			$items = Item::where('type','=','direct')->where('quantity','!=','0')->orderBy('id', 'desc')->paginate($perPage);
		}
		elseif(Input::get('show') == 'auction'){
			$title = "สินค้าประมูล";
			$items = Item::where('type','=','auction')->where('quantity','!=','0')->orderBy('id', 'desc')->paginate($perPage);
		}
		else{
			$title = "สินค้าล่าสุด";
			$items = Item::orderBy('id', 'desc')->where('quantity','!=','0')->take($latest)->get();
		}
		return View::make('hello', [
			'items' => $items, 
			'title' => $title, 
			'item_count' => $item_count,
			'params' => Input::all()]);
	}

}
