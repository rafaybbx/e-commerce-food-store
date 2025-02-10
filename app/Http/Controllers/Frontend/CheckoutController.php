<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;



class CheckoutController extends Controller
{
    public function index()
    {


        return view('frontend.checkout');

    }

    public function placeOrder(Request $request)
    {
        $formData = $request->all();
        $cart = new Cart();

        $total = 0;


        $allItems = $cart->getAllItems();

        foreach ($allItems as $item) {
            // Calculate the sum for each item
            $sum = $item['price'] * $item['quantity'];

            // Add the sum to the total
            $total += $sum;

            // Optionally, associate items with the order
            // $order->items()->create([
            //     'name' => $item['name'],
            //     'price' => $item['price'],
            //     'quantity' => $item['quantity'],
            //     // Add any other fields from your item model
            // ]);

        }

        $bill = $formData['bill'] ?? null;
        $cardholdername = $formData['cardholdername'] ?? null;
        $cardnumber = $formData['cardnumber'] ?? null;
        $cvv = $formData['cardcvv'] ?? null;

        // return 1;
        // return $cvv;
        $email = $formData['email'] ?? null;
        $name = $formData['name'] ?? null;
        $address = $formData['address'] ?? null;
        $phone = $formData['phone'] ?? null;
        $ship = $formData['ship'] ?? null;



        $order = Order::create([
            'price' => $total,
            'cardholdername' => $cardholdername,
            'cardnumber' => $cardnumber,
            'cvv' => $cvv,
            'email' => $email,
            'username' => $name,
            'address' => $address,
            'phnumber' => $phone,
            'shippingaddress' => $ship,
            'billingaddress' => $bill,
            // Add other fields as needed
        ]);

        // Associate order items with the order
        // foreach ($allItems as $item) {
        //     $order->items()->attach($item['id'], [
        //         'name' => $item['name'],
        //         'price' => $item['price'],
        //         'quantity' => $item['quantity'],
        //         'image' => $item['image']
        //         // Add other fields from your item model
        //     ]);
        // }

        // Update the order's total
        // $order->total = $total;
        // $order->save();





        $orderItems = [];

        // Populate the array with order items
        foreach ($allItems as $item) {
            $orderItems[] = new OrderItem([
                'product_id' => $item['id'],
                'name' => $item['name'],
                'price_per_kg' => $item['price'],
                'quantity' => $item['quantity'],
                'img' => $item['image']
                // Add other fields from your item model
            ]);
        }
        $order->items()->saveMany($orderItems);
        $order->save();

        // return true;

        return response()->json(['redirect_url' => route('home')]);

    }
}
