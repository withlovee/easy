<?php

/**
 * UsersController Class
 *
 * Implements actions regarding user management
 */
class SellDirectItemController extends Controller
{

	protected $item;

	public function __construct(Item $item)
	{
		$this->item = $item;
	}
	public function sellDirectItem(){
		return View::make('sell_item.sellDirectItem');		
	}
	public function createDirectItem(){
		$file_max = ini_get('upload_max_filesize');
		try{
			$input = Input::all();

			$file = Input::file('picture');
			$filename = $file->getClientOriginalName();
			Input::file('picture')->move('upload/', $filename);

			$input['filename'] = $file->getClientOriginalName();
			$this->item = Item::createDirectItem($input);
			
			if(!$this->item) {
				return Redirect::back()->withInput()->withErrors($this->item->errors);
			}
			return Redirect::to('item/'.$this->item->id)->with('notice','ระบบเพิ่มสินค้าของท่านเรียบร้อยแล้วค่ะ');		
		}
		catch(Exception $e){
			return Redirect::back()->withInput()->withErrors($this->item->errors)->with('error','The file size should be lower than '.$file_max. 'B');
		}
	}

	public function deleteDirectItem($id){
		$item = Item::find($id)->delete();
		return Redirect::to('listItemSeller?show=all')->with('notice','ลบสินค้าเรียบร้อยแล้วค่ะ');
	}
}
