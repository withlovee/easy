<?php

class BidManager extends Eloquent {
    protected $fillable = array('currentBid', 'maxBid', 'increment', 'bidderId', 'shipping', 'shippingCost', 'options');
    public $timestamps = false;

    private function setShipping($shipping, $shippingCost) {
        $this->shipping = $shipping;
        $this->shippingCost = $shippingCost;
    }

    public function updateManualBidWinner($newMaxBid, $newUserId, $shipping, $shippingCost) {
        if ($this->bidderId == $newUserId) {
            $this->currentBid = $this->maxBid = $newMaxBid;
            $this->increment = 0;

            $this->setShipping($shipping, $shippingCost);
        }
        else {
            if ($this->maxBid > $newMaxBid) {
                if ($newMaxBid + $this->increment < $this->maxBid) $this->currentBid = $newMaxBid + $this->increment;
                else $this->currentBid = $this->maxBid;
            }
            else if ($this->maxBid == $newMaxBid) {     // bidder who bids first wins
                $this->currentBid = $this->maxBid;
            }
            else {
                $this->currentBid = $this->maxBid = $newMaxBid;
                $this->increment = 0;
                $this->bidderId = $newUserId;

                $this->setShipping($shipping, $shippingCost);
            }
        }
        $this->save();
        return $this->currentBid;
    }

    public function updateAutoBidWinner($newMaxBid, $newIncrement, $newUserId, $shipping, $shippingCost) {
        if ($this->bidderId == $newUserId) {
            $this->maxBid = $newMaxBid;
            $this->increment = $newIncrement;

            $this->setShipping($shipping, $shippingCost);
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
            else {                             // new winner
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
                $this->bidderId = $newUserId;

                $this->setShipping($shipping, $shippingCost);
            }
        }
        $this->save();
        return $this->currentBid;
    }
}
?>