<?php

class PaymentGateway extends Controller {
	public static function pay($cardType,$cardId,$cvv,$endMonth,$endYear)
	{
		return "true";
	}

}
