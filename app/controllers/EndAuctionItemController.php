<?php

class EndAuctionItemController extends Controller
{

  public function endAuction($job,$args){

    $itemId = $args["itemId"];

    $item = Item::find(intval($itemId));

    if($item) {

      $bidManager = BidManager::find($item->bidManagerId);
      
      if($bidManager->bidderId != null){


        $transaction = Transaction::createAuctionTransaction($item, $bidManager);

        $user = User::find($bidManager->bidderId);

        EmailHelper::sendAuctionResultEmail($user, $item);
        EmailHelper::sendInvoiceEmail($transaction);
        
      }

    }

    $job->delete();
    
  }
}
