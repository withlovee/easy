<?php

class PaymentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$transaction = Transaction::find($id);
		$item = $transaction->item;
		$totalTax = $transaction->getTotalTax();
		$total = $totalTax+$transaction->price;
		return View::make('payment.payment', array('transaction'=>$transaction,'item'=>$item,'tax'=>$totalTax,'total'=>$total));
	}

	public function proceedPayment($id){
		$transaction = Transaction::find($id);
		$transaction->status = 'paid';
		$transaction->save();
		$cardType = Input::get('cardType');
		$cardId = Input::get('cardId');
		$cvv = Input::get('cvv');
		$endMonth = Input::get('month');
		$endYear = Input::get('year');
		$paymentResult = PaymentGateway::pay($cardType, $cardId, $cvv, $endMonth, $endYear);
		if($paymentResult) {
			EmailHelper::sendConfirmPaymentEmail($transaction);
			return Redirect::to('transactions')->with('notice', 'ซื้อสินค้าเรียบร้อย!');	
		}
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
