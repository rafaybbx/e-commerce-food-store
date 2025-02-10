<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart; // Adjust the namespace as per your folder structure
use App\Models\Product;
use Illuminate\Support\Facades\Session;



class CartController extends Controller
{
    public function index()
    {

        // $users = User::all();
        // $orders = Order::all();
        // $orders = Product::all();
        // $orders = Product::all();


        return view('frontend.cart');
        // return view('frontend.cart', compact('studentss'));

    }
    public function placeorder(Request $request)
    {

        // $users = User::all();
        // $orders = Order::all();
        // $orders = Product::all();
        // $orders = Product::all();

        // $cart = Cart::findOrFail($request->id);
        return view('frontend.test');
        // return view('frontend.cart', compact('studentss'));

    }



    // public function updatecart(Request $request)

    // public function updateCart(Request $request)
    // {
    //     $updates = json_decode($request->input('updates'), true);


    //     if (!is_array($updates)) {
    //         return response()->json(['error' => 'Invalid updates format'], 400);
    //     }

    //     $cartItems = json_decode($_COOKIE['cart'], true);


    //     foreach ($updates as $update) {
    //         $itemId = $update['itemId'];
    //         $quantity = $update['quantity'];

    //         foreach ($cartItems as $index => $item) {

    //             if (isset($item['id']) && $item['id'] == $itemId) {

    //                 // Decrease the quantity or remove the item if the new quantity is zero or less
    //                 $newQuantity = max(0, $item['quantity'] - $quantity);

    //                 $cartItems[$index]['quantity'] = $newQuantity;

    //                 // If the quantity becomes zero or negative, remove the item
    //                 if ($newQuantity <= 0) {
    //                     unset($cartItems[$index]);
    //                 }
    //             }
    //         }
    //     }
    //     // return ($cartItems);
    //     // Update the cookie with the modified cart items
    //     $this->setCookie(array_values($cartItems));

    //     // Return a response if needed
    //     return response()->json(['message' => 'Cart updated successfully']);
    // }

    // public function updateCart(Request $request)
    // {
    //     $updates = json_decode($request->input('updates'), true);

    //     if (!is_array($updates)) {
    //         return response()->json(['error' => 'Invalid updates format'], 400);
    //     }

    //     $cartItems = json_decode($_COOKIE['cart'], true);

    //     foreach ($updates as $update) {
    //         $itemId = $update['itemId'];
    //         $newQuantity = $update['quantity'];

    //         foreach ($cartItems as $index => $item) {
    //             if (isset($item['id']) && $item['id'] == $itemId) {
    //                 $currentQuantity = $item['quantity'];

    //                 // Check and handle different cases
    //                 if ($newQuantity > $currentQuantity) {
    //                     // Case: Incoming quantity is greater, increase it
    //                     $cartItems[$index]['quantity'] = $newQuantity;
    //                 } elseif ($newQuantity < $currentQuantity) {
    //                     // Case: Incoming quantity is less, decrease it or remove if zero
    //                     $cartItems[$index]['quantity'] = max(0, $currentQuantity - $newQuantity);

    //                     // If the quantity becomes zero, remove the item
    //                     if ($cartItems[$index]['quantity'] <= 0) {
    //                         unset($cartItems[$index]);
    //                     }

    //                 }

    //                 else {
    //                     // Case: Incoming quantity is the same, do nothing
    //                 }
    //             }

    //         }

    //     }






    //     // return $cartItems;
    //     // Update the cookie with the modified cart items
    //     $cart = new Cart();
    //     $cart->setCookie($cartItems);

    //     // Return a response if needed
    //     // return redirect()->route('cart');

    //     return response()->json(['message' => 'Cart updated successfully']);
    // }



    public function updateCart(Request $request)
    {
        $updates = json_decode($request->input('updates'), true);

        if (!is_array($updates)) {
            return response()->json(['error' => 'Invalid updates format'], 400);
        }

        $cartItems = json_decode($_COOKIE['cart'], true);

        foreach ($updates as $update) {
            $itemId = $update['itemId'];
            $newQuantity = $update['quantity'];

            foreach ($cartItems as $index => $item) {
                if (isset($item['id']) && $item['id'] == $itemId) {
                    // Always set the new quantity
                    $cartItems[$index]['quantity'] = $newQuantity;

                    // If the quantity is 0 or less, remove the item
                    if ($newQuantity <= 0) {
                        unset($cartItems[$index]);
                    }
                }
            }
        }

        // Update the cookie with the modified cart items
        $cart = new Cart();
            $cart->setCookie($cartItems);

        // Return a response if needed
        return response()->json(['message' => 'Cart updated successfully']);
    }





    // {

    //     //  return $request->input('itemId');
    //     // return $request->input('itemId');
    //     return $request->input('quantity');
    //     // updateItemQuantity
    //     // $quantity = $request->input('quantity');

    //     // $cart = new Cart();
    //     // $cart->updateItemQuantity($id, $quantity);

    //     // $cart = new Cart();
    //     // $cart->removeItemById($id);

    //     // return redirect()->route('cart');




    //     // return redirect()->route('cart');


    // }
    public function removeFromCart($id)
    {

        $cart = new Cart();
        $cart->removeItemById($id);

        return redirect()->route('cart');
    }




    public function addToCart(Request $request, $product_id)
    {


        $quantity = $request->input('quantity');

        if ($quantity <= 0) {
            // Always set the new quantity
            // Session::flash('noitem', 'Please select a quantity');
            return redirect()->route('singleproduct', ['pid' => $product_id])
                ->with('noitem', 'Please select a quantity');


        }

        // Retrieve existing cart items from cookies or create an empty array
        $cart = new Cart();
        $product = Product::find($product_id);


        $Totalprice = $product->price_per_kg * $quantity;


        // Add item to the cart
        $item = [
            'id' => $product_id,
            'name' => $product->name,
            'price' => $Totalprice,
            'quantity' => $quantity,
            'image' => $product->img,
        ];

        // dd($item);

        $cart->addItem($item);




        // $cartItems = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

        // dd($cartItems);





        Session::flash('success', 'Item successfully added to the cart!');



        return redirect()->route('singleproduct', ['pid' => $product_id])
            ->with('success', 'Item successfully added to the cart!');


    }




    private function findCartItemIndex($cartItems, $productId)
    {
        foreach ($cartItems as $index => $item) {
            if ($item['product_id'] == $productId) {
                return $index;
            }
        }

        return -1;
    }





    public function showCart(Request $request)
    {
        $cartItems = json_decode($request->cookie('cartItems'), true) ?? [];

        return view('frontend.cart', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }
}
