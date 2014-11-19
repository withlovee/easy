<?php

class EmailHelperTestController extends BaseController {

  public function __construct() {
    $this->emailHelper = new EmailHelper();
    $this->user = User::findOrFail(6);
    $this->item = Item::findOrFail(1);
    $this->transaction = Transaction::findOrFail(1);
  }

  public function sendPreviousAuctionWinnerEmail() {


    

    // var_dump($user->getFullName());

    $args = array(
        'currentBid'          => 350.0,
        'currentBidTimestamp' => time(),
        'endAuctionTimestamp' => time() + (7 * 24 * 60 * 60),
      );

    

    $this->emailHelper->sendPreviousAuctionWinnerEmail($this->user, $this->item, $args);

    return "true";
  }

  public function sendAuctionResultEmail() {

    $this->emailHelper->sendAuctionResultEmail($this->user, $this->item);

    return "true";
  }

  public function setInvoiceEmail() {
    $this->emailHelper->sendInvoiceEmail($this->transaction);
  }

  public function sendConfirmPaymentEmail() {
    $this->emailHelper->sendConfirmPaymentEmail($this->transaction);
  }

  public function sendFeedbackRequestEmail() {
    $this->emailHelper->sendFeedbackRequestEmail($this->transaction, $this->user);
  }

}
