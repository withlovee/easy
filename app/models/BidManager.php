<?php

class BidManager extends Eloquent {
    protected $fillable = array('currentBid', 'maxBid', 'increment', 'bidderId', 'shipping', 'shippingCost', 'service');
    public $timestamps = false;

    public static function createBidManager($price) {
        $bidManager = new BidManager;
        $bidManager->currentBid = $price;
        $bidManager->maxBid = $price;
        $bidManager->increment = 0;
        $bidManager->bidderId = null;
        $bidManager->shipping = null;
        $bidManager->shippingCost = null;
        $bidManager->service = 0;
        $bidManager->save();

        return $bidManager;
    }

    private function setShippingService($shipping, $shippingCost, $service) {
        $this->shipping = $shipping;
        $this->shippingCost = $shippingCost;
        $this->service = $service;
    }

    public function updateManualBidWinner($newMaxBid, $newUserId, $shipping, $shippingCost, $service, $item) {
        if ($newMaxBid <= $this->currentBid) return $this->currentBid;

        if ($this->bidderId == $newUserId) {
            $this->currentBid = $this->maxBid = $newMaxBid;
            $this->increment = 0;

            $this->setShippingService($shipping, $shippingCost, $service);
        }
        else {
            if ($this->maxBid > $newMaxBid) {
                if ($newMaxBid + $this->increment < $this->maxBid) $this->currentBid = $newMaxBid + $this->increment;
                else $this->currentBid = $this->maxBid;
            }
            else if ($this->maxBid == $newMaxBid) {     // bidder who bids first wins
                $this->currentBid = $this->maxBid;
            }
            else {                                      // outbid
                $this->currentBid = $this->maxBid = $newMaxBid;
                $this->increment = 0;

                if($this->bidderId) {
                EmailHelper::sendPreviousAuctionWinnerEmail(User::find($this->bidderId), $item,
                    [
                        'currentBid'           => $this->currentBid, 
                        'currentBidTimestamp'  => (new DateTime('now'))->format('Y-m-d H:i:s'),
                        'endAuctionTimestamp'  => (new DateTime($item->endDateTime))->format('Y-m-d H:i:s'), 
                        'itemLink'             => $item->getUrl()
                    ]
                );

                }
                $this->bidderId = $newUserId;

                $this->setShippingService($shipping, $shippingCost, $service);

            }
        }
        $this->save();
        return $this->currentBid;
    }

    public function updateAutoBidWinner($newMaxBid, $newIncrement, $newUserId, $shipping, $shippingCost, $service, $item) {
        if ($newMaxBid <= $this->currentBid) return $this->currentBid;
        
        if ($this->bidderId == $newUserId) {
            $this->maxBid = $newMaxBid;
            $this->increment = $newIncrement;

            $this->setShippingService($shipping, $shippingCost, $service);
        }
        else {
            if ($this->maxBid > $newMaxBid) {        // old winner
                $multiple = (int) ( ($newMaxBid - $this->currentBid) / ($newIncrement + $this->increment));
                $tmp = $this->currentBid + ($multiple)*($this->increment+$newIncrement);
                if ($tmp < $newMaxBid) {
                    if ($tmp + $newIncrement < $newMaxBid) $tmp += $newIncrement;
                    else $tmp = $newMaxBid;

                    if ($tmp + $this->increment < $this->maxBid) $this->currentBid = $tmp + $this->increment;
                    else $this->currentBid = $this->maxBid;
                }
                else {  // $tmp == $newMaxBid
                    $this->currentBid = $tmp;
                }
            }
            else if ($this->maxBid == $newMaxBid) {     // bidder who bids first wins
                $this->currentBid = $this->maxBid;
            }
            else {                             // out bid - new winner
                $multiple = (int) ( ($this->maxBid - $this->currentBid) / ($newIncrement + $this->increment));
                $tmp = $this->currentBid + $multiple*($this->increment+$newIncrement);
                if ($tmp < $this->maxBid) {
                    if ($tmp + $this->increment < $this->maxBid) $tmp += $this->increment;
                    else $tmp = $this->maxBid;
                }

                if ($tmp + $newIncrement < $newMaxBid) $this->currentBid = $tmp + $newIncrement;
                else $this->currentBid = $newMaxBid;

                $this->maxBid = $newMaxBid;
                $this->increment = $newIncrement;

                if($this->bidderId) {

                    EmailHelper::sendPreviousAuctionWinnerEmail(User::find($this->bidderId), $item,
                        [
                            'currentBid'           => $this->currentBid, 
                            'currentBidTimestamp'  => (new DateTime('now'))->format('Y-m-d H:i:s'), 
                            'endAuctionTimestamp'  => (new DateTime($item->endDateTime))->format('Y-m-d H:i:s'), 
                            'itemLink'             => $item->getUrl()
                        ]
                    );

                }
                $this->bidderId = $newUserId;

                $this->setShippingService($shipping, $shippingCost, $service);

            }
        }
        $this->save();
        return $this->currentBid;
    }
}
?>