<?php



/**
 * UsersController Class
 *
 * Implements actions regarding user management
 */
class ItemController extends Controller
{

	public function showDirectItem(&id){
		$item = Item::find($id);
		return View::make('item.directItem', compact('item'));		
	}


}