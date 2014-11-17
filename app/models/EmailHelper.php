<?php

class EmailHelper extends Eloquent {

  /**
   * Send Validation Link to User
   * @param User $user 
   * @param String $validationLink URL for validation
   */
  function sendUserValidationEmail($user, $validationLink) {

    $data = array(
        'user' => $user,
        'validationLink' => $validationLink
      );

    Mail::queue('emails.UserValidation', $data, function($message) use ($user){
      $message->to($user->email,  $user->name.' '.$user->surname)
              ->subject('โปรดยืนยันการสมัครสมาชิกของคุณ');
    });


  }


  /**
   * Send email to tell user that he is outbidded.
   * @param User $user 
   * @param Array $args Array of parameters required. item (Item Object), currentBid,
   * currentBidTimestamp, endAuctionTimestamp, and itemLink are required as a key-value of array.
   * @return type
   */
  function sendPreviousAuctionWinnerEmail($email, $username, $fullName, $args) {
    $data = $args;
    $data['email'] = $email;
    $data['username'] = $username;
    $data['fullName'] = $fullName;

    Mail::queue('emails.PreviousAuctionWinner', $data, function($message) use ($data) {
      $message->to($data['email'], $data['fullName'])
              ->subject('คุณถูกประมูลแซง! - '.$data['item']->name);
    });

  }


/**
 * Send email to user that auction is done
 * @param String $email 
 * @param String $username 
 * @param String $fullName 
 * @param Array $args Array of parameters required. itemId, itemName are required as a key-value of array.
 */
  function sendAuctionResultEmail($email, $username, $fullName, $args) {
    $data = $args;
    $data['email'] = $email;
    $data['username'] = $username;
    $data['fullName'] = $fullName;


    Mail::queue('emails.AuctionResult', $data, function($message) use ($data) {
      $message->to($data['email'], $data['fullName'])
              ->subject('ยินดีด้วย! คุณชนะการประมูล - '.$data['itemName']);
    });

  }

  function sendInvoiceEmail() {
    
  }


}