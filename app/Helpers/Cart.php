<?php

namespace App\Helpers;

use App\Product;

class Cart
{
    public function __construct()
    {
        if ($this->get() === null) {
            $this->set($this->empty());
		}
	}
	
	private function set($cart)
	{
		return request()->session()->put('cart', $cart);
	}

	public function get()
    {
        return request()->session()->get('cart');
    }

    public function add($product)
    {
        $cart = $this->get();
        array_push($cart['products'], $product);
        $this->set($cart);
    }

    public function remove(int $productId)
    {
        $cart = $this->get();
        array_splice($cart['products'], array_search($productId, array_column($cart['products'], 'id')), 1);
        $this->set($cart);
    }

    public function incrementQuantity(int $productId)
    {
        $cart = $this->get();

        $key = array_search($productId, array_column($cart['products'], 'id'));
        $cart['products'][$key]['quantity']++;

        $this->set($cart);
    }

    public function decrementQuantity(int $productId)
    {
        $cart = $this->get();

        $key = array_search($productId, array_column($cart['products'], 'id'));
        $cart['products'][$key]['quantity']--;

        $this->set($cart);
    }

    public function cartTotal()
    {
        $cart = $this->get();
        
        $total = collect($cart['products'])->map(function ($product, $key) {
            return $product['quantity'] * $product['price'];
        })->sum();

        $cart['total'] = $total;
        $this->set($cart);

        return request()->session()->get('cart')['total'];
    }

    public function addDiscount($discountAmount)
    {
        $cart = $this->get();
        $cart['discountAmount'] = $discountAmount;
        $this->set($cart);
    }

    public function getDiscount()
    {
        $cart = $this->get();
        return $cart['discountAmount'] ?? 0;
    }

    public function removeDiscount()
    {
        $cart = $this->get();
        $cart['discountAmount'] = 0;
        $this->set($cart);
    }

    public function netTotal()
    {
        $cart = $this->get();
        
        $discount = $this->getDiscount() ?? 0;
        $netTotal = $this->cartTotal() - $discount;

        $cart['nettotal'] = $netTotal;
        $this->set($cart);

        return $this->get()['nettotal'] ?? 0;
    }

    public function clear(): void
    {
        $this->set($this->empty());
    }

    public function empty(): array
    {
        return [
            'products' => [],
            'total' => 0,
            'discountAmount' => 0,
            'nettotal' => 0
        ];
    }
}