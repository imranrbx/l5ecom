<?php

namespace App;


class Cart
{
    private $contents;
    private $totalQty;
    private $totalPrice;

    public function __construct($oldCart){
    	if($oldCart){
    		$this->contents = $oldCart->contents;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }

    public function addProduct($product, $qty){
    	$products = ['qty' => 0, 'price' => $product->price, 'product' => $product];
    	if($this->contents){
    		if(array_key_exists($product->slug, $this->contents)){
    			$products = $this->contents[$product->slug];
    		}
    	}

    	$products['qty']+=$qty;
    	$products['price'] = $product->price * $products['qty'];
    	$this->contents[$product->slug] = $products;
    	$this->totalQty+=$qty;
    	$this->totalPrice += $product->price;

    }
    public function removeProduct($product){
        if($this->contents){
            if(array_key_exists($product->slug, $this->contents)){
                $rProduct = $this->contents[$product->slug];
                $this->totalQty -= $rProduct['qty'];
                $this->totalPrice -= $rProduct['price'];
                array_forget($this->contents, $product->slug);
            }
        }
    }

    public function updateProduct($product, $qty){
        if($this->contents){
            if(array_key_exists($product->slug, $this->contents)){
                $products = $this->contents[$product->slug];
            }
        }

        $this->totalQty -= $products['qty'];
        $this->totalPrice -= $products['price'];
        $products['qty'] = $qty;
        $products['price'] = $product->price * $qty;
        $this->totalPrice += $products['price'];
        $this->totalQty += $qty;
        $this->contents[$product->slug] = $products;
    }
  
    public function getContents(){
        return $this->contents;
    }
    public function getTotalQty(){
        return $this->totalQty;
    }
    public function getTotalPrice(){
        return $this->totalPrice;
    }
}
