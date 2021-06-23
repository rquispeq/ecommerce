<?php 

namespace App\Models;

class CartManager 
{
    private $sessionName = "shopping_cart_id";
    private $cart;

    public function __construct()
    {
        $this->cart = $this->findOrCreate($this->findSession());
    }

    private function findOrCreate($cartId = null){
        $cart = null;

        if (is_null($cartId)) {
            $cart = ShoppingCart::create();
        } else {
            $cart = ShoppingCart::find($cartId);

            if (is_null($cart)) {
                $cart = ShoppingCart::create();
            }
        }

        request()->session()->put($this->sessionName,$cart->id);
        return $cart;
    }

    private function findSession(){
        return request()->session()->get($this->sessionName);
    }

    public function getCart(){
        return $this->cart;
    }
}
