<?php

class EmailHelper extends Eloquent {


  /**
   * Send email to tell user that he is outbidded.
   * @param User $user 
   * @param Item $item 
   * @param Array $args Array of parameters required. currentBid, currentBidTimestamp, endAuctionTimestamp, and itemLink are required as a key-value of array.
   * @return type
   */
  function sendPreviousAuctionWinnerEmail($user, $item, $args) {
    $data = $args;
    $data['userEmail'] = $user->email;
    $data['userFullName'] = $user->getFullName();
    $data['itemId'] = $item->id;
    $data['itemName'] = $item->name;
    $data['itemUrl'] = $item->getUrl();

    Mail::queue('emails.PreviousAuctionWinner', $data, function($message) use ($data) {
      $message->to($data['userEmail'], $data['userFullName'])
              ->subject('คุณถูกประมูลแซง! - '.$data['itemName']);
    });

  }


/**
 * Send email to user that auction is done
 * @param User $user 
 * @param Item $item 
 */
  function sendAuctionResultEmail($user, $item) {
    $data = array();
    $data['userEmail'] = $user->email;
    $data['userFullName'] = $user->getFullName();
    $data['itemId'] = $item->id;
    $data['itemName'] = $item->name;


    Mail::queue('emails.AuctionResult', $data, function($message) use ($data) {
      $message->to($data['userEmail'], $data['userFullName'])
              ->subject('ยินดีด้วย! คุณชนะการประมูล - '.$data['itemName']);
    });

  }

  function sendInvoiceEmail($user, $transaction) {
    
    
  }


}