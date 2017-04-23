<?php

namespace App;

class Cart
{
    public $items = null,
           $totalQty,
           $totalPrice;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
}