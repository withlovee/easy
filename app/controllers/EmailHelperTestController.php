<?php

class EmailHelperTestController extends BaseController {

  public function __construct() {
    $this->emailHelper = new EmailHelper();
  }

  public function sendUserValidationEmail($email) {
    $this->emailHelper->sendUserValidationEmail($email, "nuttt", "Nuttapon Pattanavijit", "http://www.facebook.com")
  }

  public function sendPreviousAuctionWinnerEmail($email) {

  }

}
