<?php
class TransactionController extends BaseController {

	protected function get_title(){
		if(Auth::user()->role == 'Buyer')
			return 'ประวัติการสั่งซื้อ';
		else
			return 'ประวัติการขาย';
	}

	public function showList(){
		$perPage = 5;
		if(Auth::user()->role == 'Buyer'){
			$data['transactions'] = Transaction::listByBuyer(Auth::user()->id)->paginate($perPage);
		}
		else{
			$data['transactions'] = Transaction::listBySeller(Auth::user()->id)->paginate($perPage);
		}
		$data['params'] = Input::all();
		$data['title'] = $this->get_title();
		return View::make('transaction.transactionList', $data);
	}

	public function show($id){
		$data['transaction'] = Transaction::find($id);
		$data['title'] = $this->get_title();
		if(!Transaction::hasPermission($data['transaction']))
			return Redirect::to('/');
		return View::make('transaction.transaction', $data);
	}

	public function setStatus(){
		$input = Input::all();
		$transaction = Transaction::setStatus($input['id'], $input['status']);
		return Redirect::to('/transaction/'.$input['id'])
			->with('notice', 'ปรับปรุงสถานะของสินค้าเรียบร้อยแล้ว');
	}

}
