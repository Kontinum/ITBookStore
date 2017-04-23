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

    public function add($item)
    {
        $singleItemGroup = ['qty' => 0, 'price' => 0, 'item' => $item];
        
        if($this->items){
            if(array_key_exists($item->id,$this->items)){
                $singleItemGroup = $this->items[$item->id];
            }
        }


        $singleItemGroup['qty']++;
        $singleItemGroup['price'] += $item->price;
        $this->items[$item->id] = $singleItemGroup;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }
}