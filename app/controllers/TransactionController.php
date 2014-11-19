<?php
class TransactionController extends BaseController {

	protected function get_title(){
		if(Auth::user()->role == 'Buyer')
			return 'ประวัติการสั่งซื้อ';
		else
			return 'ประวัติการขาย';
	}

	public function showList(){
		if(Auth::user()->role == 'Buyer'){
			$data['transactions'] = Transaction::where('buyerId', '=', Auth::user()->id)->get();
		}
		else{
			$data['transactions'] = Transaction::where('sellerId', '=', Auth::user()->id)->get();
		}
		$data['title'] = $this->get_title();
		return View::make('transaction.transactionList', $data);
	}

	public function show($id){
		$data['transaction'] = Transaction::find($id);
		$data['title'] = $this->get_title();
		if(!$this->hasPermission($data['transaction']))
			return Redirect::to('/');
		return View::make('transaction.transaction', $data);
	}

	public function setStatus(){
		$input = Input::all();
		$transaction = Transaction::find($input['id']);

		if(!$this->hasPermission($transaction))
			return Redirect::to('/');

		$transaction->status = $input['status'];
		$transaction->save();

		if($input['status'] == 'received'){
			//send email to remind buyer/seller to post feedback
		}

		return Redirect::to('/transaction/'.$input['id'])->with('notice', 'ปรับปรุงสถานะของสินค้าเรียบร้อยแล้ว');
	}

	// The user must be an item buyer or item seller
	protected function hasPermission($transaction){
		if($transaction->buyer->id != Auth::user()->id && 
		   $transaction->item->seller->id != Auth::user()->id)
			return false;
		return true;
	}

}
