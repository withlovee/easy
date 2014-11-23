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
		$item        = $transaction->item;
		$totalTax    = $transaction->getTotalTax();
		$total       = $transaction->getTotal();
		return View::make('payment.payment', array(
			'transaction' => $transaction,
			'item'=>$item,
			'tax'=>$totalTax,
			'total'=>$total)
		);
	}

	public function proceedPayment($id){
		$transaction   = Transaction::pay($id);
		$cardType      = Input::get('cardType');
		$cardId        = Input::get('cardId');
		$cvv           = Input::get('cvv');
		$endMonth      = Input::get('month');
		$endYear       = Input::get('year');
		$paymentResult = PaymentGateway::pay($cardType, $cardId, $cvv, $endMonth, $endYear);
		if($paymentResult) {
			EmailHelper::sendConfirmPaymentEmail($transaction);
			EmailHelper::sendSellerConfirmPaymentEmail($transaction);
			return Redirect::to('transactions')->with('notice', 'ชำระเงินสินค้าเรียบร้อยแล้ว');
		}
		
	}

}
