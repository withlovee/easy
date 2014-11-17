<?php



/**
 * UsersController Class
 *
 * Implements actions regarding user management
 */
class ItemController extends Controller
{

	public function showDirectItem($id){
		$item = Item::find($id);
		$questions = ItemQuestion::where('id', '=', $id)->where('answer','!=','')->orderBy('id', 'ASC')->get();
		if($item->type == 'direct')
			return View::make('item.directItem', compact('item','questions'));	
		elseif ($item->type == 'auction') 
			return View::make('item.auctionItem', compact('item','questions'));
			
	}

	public function buyDirectItem($id){
		$item = Item::find($id);
		return View::make('item.directItem', compact('item'));		
	}


}