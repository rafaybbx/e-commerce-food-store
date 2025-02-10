<?php

// app/Services/CartService.php
namespace App\Services;

use App\Models\Product;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function getUserCartData($userId)
    {
        // Fetch orders for the user with their items and related products
        $orders = Order::where('user_id', $userId)->with('items.product')->get();

        // Process the data as needed
        $cartData = [];

        foreach ($orders as $order) {
            foreach ($order->items as $item) {
                $product = $item->product;

                $cartData[] = [
                    'product_id'   => $product->id,
                    'product_name' => $product->name,
                    'quantity'     => $item->quantity,
                ];
            }
        }

        return $cartData;
    }
    public function DisplayTotal($userId)
    {
        // Fetch orders for the user with their items and related products
        $orders = Order::where('user_id', $userId)->with('items.product')->get();

        // Process the data as needed
        $cartData = [];

        foreach ($orders as $order) {
            foreach ($order->items as $item) {
                $product = $item->product;

                $cartData[] = [
                    'product_id'   => $product->id,
                    'product_name' => $product->name,
                    'quantity'     => $item->quantity,
                ];
            }
        }

        return $cartData;
    }
}
