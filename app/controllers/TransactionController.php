<?php
class TransactionController extends BaseController {

	public function show($id){
		$transaction = Transaction::find($id);
		return View::make('transaction.transaction', $transaction);
	}

}
