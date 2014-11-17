<?php

class EmailHelper extends Eloquent {

  /**
   * Send Validation Link to User
   * @param String $email 
   * @param String $username 
   * @param String $fullName 
   * @param String $validationLink URL for validation
   */
  function sendUserValidationEmail($email, $username, $fullName, $validationLink) {

    $data = array(
        'email' => $email,
        'username' => $username,
        'fullName' => $fullName,
        'validationLink' => $validationLink
      );

    Mail::queue('emails.UserValidation', $data, function($message) use ($data){
      $message->to($data['email'],  $data['fullName'])
              ->subject('โปรดยืนยันการสมัครสมาชิกของคุณ');
    });


  }


  /**
   * Send email to tell user that he is outbidded.
   * @param String $email 
   * @param String $username 
   * @param String $fullname 
   * @param Array $args Array of parameters required. itemId, itemName, currentBid,
   * currentBidTimestamp, endAuctionTimestamp, and itemLink is required as a key-value of array.
   * @return type
   */
  function sendPreviousAuctionWinnerEmail($email, $username, $fullName, $args) {
    $data = $args;
    $data['email'] = $email;
    $data['username'] = $username;
    $data['fullName'] = $fullName;

    Mail::queue('emails.PreviousAuctionWinnerEmail', $data, function($message) use ($data) {
      $message->to($data['email'], $data['fullName'])
              ->subject('คุณถูกประมูลแซง! - '.$data['itemName']);
    });

  }


}