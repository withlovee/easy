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
		// var_dump(Auth::user());
		if(Input::get('search') != null){
			$title = "ผลลัพธ์การค้นหาสินค้า";
			$searchs = explode(' ', Input::get('search'));
			$items_id = [];
			foreach ($searchs as $search) {
				$query = Item::where('name','LIKE','%'.$search.'%')
							 ->orWhere('property','LIKE','%'.$search.'%')->lists('id'); 	
				$items_id = array_unique(array_merge($items_id,$query));
			}
			$items = Item::whereIn('id', $items_id)->get();
		}
		else if(Input::get('show') == 'all'){
			$title = "สินค้าทั้งหมด";
			$items = Item::orderBy('id', 'desc')->get();
		}
		elseif(Input::get('show') == 'direct'){
			$title = "สินค้าขายโดยตรง";
			$items = Item::where('type','=','direct')->orderBy('id', 'desc')->get();
		}
		elseif(Input::get('show') == 'auction'){
			$title = "สินค้าประมูล";
			$items = Item::where('type','=','auction')->orderBy('id', 'desc')->get();
		}
		else{
			$n = 5;
			$title = "สินค้าล่าสุด";
			$items = Item::orderBy('id', 'desc')->take($n)->get();
		}
		return View::make('hello', ['items' => $items, 'title' => $title, 'item_count' => $item_count]);
		// $results = DB::select('select * from test where id = ?', array(2));
		// var_dump($results);
		// return '';
	}

}
