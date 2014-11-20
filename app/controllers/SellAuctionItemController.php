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
		return View::make('item.sellAuctionItem');		
	}
	public function createAuctionItem(){
		//'id','name','picture','price','brand','model','volumn','property','size','quantity','quality','defect','returnPolicy','returnFee','shipping','tax','others','type','endDateTime','amount','bidManagerId','sellerId'
		$input = Input::all();
		
		$file = Input::file('picture');
		$destinationPath = 'upload/';
		$filename = $file->getClientOriginalName();
		Input::file('picture')->move($destinationPath, $filename);
		$path = '../public/'.$destinationPath.$filename;

		// $this->item->name = $input['name'];
		$this->item->picture = $path;

		// $this->item->price = $input['price'];
		// $this->item->brand = $input['brand'];
		// $this->item->model = $input['model'];
		// $this->item->volumn = $input['volumn'];
		// $this->item->property = $input['property'];
		// $this->item->size = $input['size'];
		// $this->item->quantity = $input['quantity'];
		// $this->item->quality = $input['quality'];
		//'defect','returnPolicy','returnFee','shipping','tax','others','type','endDateTime','amount','bidManagerId',
		// $this->item->defect = $input['defect'];
		// $this->item->returnPolicy = $input['returnPolicy'];
		// $this->item->returnFee = $input['returnFee'];
		// $this->item->shipping = $input['shipping'];
		// $this->item->tax = $input['tax'];
		// $this->item->others = $input['others'];
		$this->item->type = 'auction';
		$this->item->endDateTime = $input['endDate'].' '.$input['endTime'];
		$this->item->bidManagerId = NULL;
		// $this->item->amount=NULL;
		$this->item->sellerId = Auth::user()->id;
		// $this->item->id = $input['id'];
		
		if (!$this->item->fill($input)->isValid()) {
			return Redirect::back()->withInput()->withErrors($this->item->errors);
		}
		// echo "<pre>";
		// print_r($path);
		// echo "</pre>";

		// return View::make('emptypage');
		$this->item->save();

		return Redirect::action('SellAuctionItemController@sellAuctionItem')->with('notice','ระบบเพิ่มสินค้าของคุณเรียบร้อยแล้วค่ะ'.$this->item->id);
	}
}
