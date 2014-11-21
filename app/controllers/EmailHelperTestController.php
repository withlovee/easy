<?php

class EmailHelperTestController extends BaseController {

  public function __construct() {
    $this->user = User::findOrFail(7);
    $this->item = Item::findOrFail(3);
    $this->transaction = Transaction::findOrFail(1);
  }

  public function sendPreviousAuctionWinnerEmail() {


    

    // var_dump($user->getFullName());

    $args = array(
        'currentBid'          => 350.0,
        'currentBidTimestamp' => time(),
        'endAuctionTimestamp' => time() + (7 * 24 * 60 * 60),
      );

    var_dump($this->user);

    EmailHelper::sendPreviousAuctionWinnerEmail($this->user, $this->item, $args);

    return "true";
  }

  public function sendAuctionResultEmail() {

    EmailHelper::sendAuctionResultEmail($this->user, $this->item);

    return "true";
  }

  public function sendInvoiceEmail() {
    EmailHelper::sendInvoiceEmail($this->transaction);
    return "true";
  }

  public function sendConfirmPaymentEmail() {
    EmailHelper::sendConfirmPaymentEmail($this->transaction);
    return "true";
  }

  public function sendFeedbackRequestEmail() {
    EmailHelper::sendFeedbackRequestEmail($this->transaction, $this->user);
    return "true";
  }

  public function test() {
    var_dump(EmailHelper::test($this->transaction));
    return "true";
  }

}
