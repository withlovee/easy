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
		$item = Item::find($id);

		if($item->sellerId == Auth::user()->id){
			$questions = ItemQuestion::where('itemId', '=', $id)->orderBy('id', 'ASC')->get();
		}
		else{
			$questions = ItemQuestion::where('itemId', '=', $id)->where('answer','!=','')->orderBy('id', 'ASC')->get();
		}
		if($item->type == 'direct')
			return View::make('item.directItem', compact('item','questions'));	
		elseif ($item->type == 'auction') 
			return View::make('item.auctionItem', compact('item','questions'));
			
	}


	public function sellDirectItem(){
		return View::make('item.sellDirectItem');		
	}
	public function createDirectItem(){
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
		$this->item->type = 'direct';
		$this->item->endDateTime = NULL;
		$this->item->bidManagerId = NULL;
		$this->item->amount=NULL;
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

		return Redirect::action('ItemController@sellDirectItem')->with('notice','ระบบเพิ่มสินค้าของคุณเรียบร้อยแล้วค่ะ');		
	}



}