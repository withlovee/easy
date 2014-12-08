<?php

class EmailHelper{

  /**
   * Send email to tell user that he is outbidded.
   * @param User $user 
   * @param Item $item 
   * @param Array $args Array of parameters required. currentBid, currentBidTimestamp, endAuctionTimestamp, and itemLink are required as a key-value of array.
   * @return type
   */
  public static function sendPreviousAuctionWinnerEmail($user, $item, $args) {

    $data = $args;
    $data['userEmail'] = $user->email;
    $data['userFullName'] = $user->getFullName();
    $data['itemId'] = $item->id;
    $data['itemName'] = $item->name;
    $data['itemUrl'] = $item->getUrl();

    Mail::send('emails.PreviousAuctionWinner', $data, function($message) use ($data) {
      $message->to($data['userEmail'], $data['userFullName'])
              ->subject('คุณถูกประมูลแซง! - '.$data['itemName']);
    });

  }


/**
 * Send email to user that auction is done
 * @param User $user 
 * @param Item $item 
 */
  public static function sendAuctionResultEmail($user, $item) {
    $data = array();
    $data['userEmail'] = $user->email;
    $data['userFullName'] = $user->getFullName();
    $data['itemId'] = $item->id;
    $data['itemName'] = $item->name;


    Mail::send('emails.AuctionResult', $data, function($message) use ($data) {
      $message->to($data['userEmail'], $data['userFullName'])
              ->subject('ยินดีด้วย! คุณชนะการประมูล - '.$data['itemName']);
    });

  }

  public static function sendInvoiceEmail($transaction) {

    $data = array();

    $item = Item::find($transaction->itemId);
    $user = User::find($transaction->buyerId);

    $data = array(
        "email"             => $user->email,
        "itemType"          => $item->type,
        "fullName"          => $user->getFullName(),
        "invoiceId"         => $transaction->id,
        "purchaseTimestamp" => $transaction->created_at->toDateTimeString(),
        "itemId"            => $item->id,
        "itemName"          => $item->name,
        "amount"            => $transaction->amount,
        "price"             => $transaction->price,
        "shippingCost"      => $transaction->shippingCost,
        "total"             => $transaction->getTotalCost(),
        "shippingAddress"   => $user->address,
        "billingAddress"    => $user->address

      );

    $subject = "";

    if($item->type == "auction") {
      $subject = "ขอบคุณที่ประมูลสินค้ากับเรา - ".$item->name;
    } else if($item->type == "direct") {
      $subject = "ขอบคุณที่สั่งซื้อสินค้ากับเรา - ".$item->name;
    }
    
    Mail::send('emails.Invoice', $data, function($message) use ($data, $subject) {
      $message->to($data['email'], $data['fullName'])
              ->subject($subject);
    });

  }

  public static function sendConfirmPaymentEmail ($transaction) {
    $data = array();

    $item = Item::find($transaction->itemId);
    $user = User::find($transaction->buyerId);

    $data = array(
        "email"             => $user->email,
        "itemType"          => $item->type,
        "fullName"          => $user->getFullName(),
        "invoiceId"         => $transaction->id,
        "purchaseTimestamp" => $transaction->created_at->toDateTimeString(),
        "itemId"            => $item->id,
        "itemName"          => $item->name,
        "amount"            => $transaction->amount,
        "price"             => $transaction->price,
        "shippingCost"      => $transaction->shippingCost,
        "total"             => $transaction->getTotalCost(),
        "shippingAddress"   => $user->address,
        "billingAddress"    => $user->address

      );

    $subject = "ยืนยันการชำระเงิน - ".$item->name;
    
    Mail::send('emails.ConfirmPayment', $data, function($message) use ($data, $subject) {
      $message->to($data['email'], $data['fullName'])
              ->subject($subject);
    });
  }

  public static function sendSellerConfirmPaymentEmail ($transaction) {
    $data = array();

    $item = Item::find($transaction->itemId);
    $user = User::find($transaction->sellerId);

    $data = array(
        "email"             => $user->email,
        "itemType"          => $item->type,
        "fullName"          => $user->getFullName(),
        "invoiceId"         => $transaction->id,
        "purchaseTimestamp" => $transaction->created_at->toDateTimeString(),
        "itemId"            => $item->id,
        "itemName"          => $item->name,
        "amount"            => $transaction->amount,
        "price"             => $transaction->price,
        "shippingCost"      => $transaction->shippingCost,
        "total"             => $transaction->getTotalCost(),
        "shippingAddress"   => $user->address,
        "billingAddress"    => $user->address

      );

    $subject = "ยืนยันการชำระเงิน - ".$item->name;
    
    Mail::send('emails.SellerConfirmPayment', $data, function($message) use ($data, $subject) {
      $message->to($data['email'], $data['fullName'])
              ->subject($subject);
    });
  }


  public static function sendFeedbackRequestEmail($transaction) {

    $item = Item::find($transaction->itemId);
    $users = array();
    $users[] = User::find($transaction->buyerId);
    $users[] = User::find($transaction->sellerId);

    foreach($users as $user) {
      
      $data = array(
          "email"             => $user->email,
          "fullName"          => $user->getFullName(),
          "itemId"            => $item->id,
          "feedbackUrl"       => URL::to('transaction/'.$transaction->id)
        );

      $subject = "การซื้อขายสำเร็จแล้ว โปรดให้ความคิดเห็นของคุณ - ".$item->name;

      Mail::send('emails.FeedbackRequest', $data, function($message) use ($data, $subject) {
        $message->to($data['email'], $data['fullName'])
                ->subject($subject);
      });

    }

  }


}