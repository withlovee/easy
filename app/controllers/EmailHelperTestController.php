<?php

class EmailHelperTestController extends BaseController {

  public function __construct() {
    $this->emailHelper = new EmailHelper();
  }

  public function sendUserValidationEmail($email, $username, $fullName) {
    $this->emailHelper->sendUserValidationEmail($email, $username, $fullName, "http://www.facebook.com");
    return "true";
  }

  public function sendPreviousAuctionWinnerEmail($email, $username, $fullName) {
    $args = array(
        'itemId'              => 'RILAK7677427',
        'itemName'            => 'Rilakkuma ตุ๊กตาหมอนข้าง - สีน้ำตาล ขนาด 76 ซ.ม.',
        'currentBid'          => 350.0,
        'currentBidTimestamp' => time(),
        'endAuctionTimestamp' => time() + (7 * 24 * 60 * 60),
        'itemLink'            => 'http://www.lazada.co.th/rilakkuma-76-77427.html'
      );

    

    $this->emailHelper->sendPreviousAuctionWinnerEmail($email, $username, $fullName, $args);

    return "true";
  }

  public function sendAuctionResultEmail($email, $username, $fullName) {
    $args = array(
        'itemId'              => 'RILAK7677427',
        'itemName'            => 'Rilakkuma ตุ๊กตาหมอนข้าง - สีน้ำตาล ขนาด 76 ซ.ม.',
      );

    

    $this->emailHelper->sendAuctionResultEmail($email, $username, $fullName, $args);

    return "true";
  }

}
