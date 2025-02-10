<?php

namespace App;

class Cart
{
    private $cookieName;

    public function __construct($cookieName = 'cart')
    {
        $this->cookieName = $cookieName;

        // Initialize the cookie if not already created
        if (!isset($_COOKIE[$this->cookieName])) {
            setcookie($this->cookieName, json_encode([]), time() + (86400 * 30), '/'); // Cookie lasts for 30 days
        }
    }

    public function getCookie()
    {
        return isset($_COOKIE[$this->cookieName]) ? $_COOKIE[$this->cookieName] : [];
    }

    public function setCookie($data)
    {
        setcookie($this->cookieName, json_encode($data), time() + (86400 * 30), '/'); // Cookie lasts for 30 days
    }

    public function addItem($item)
    {
        $cartItems = json_decode($_COOKIE[$this->cookieName], true);

        $cartItems[] = $item;
        $this->setCookie($cartItems);
    }

    public function removeItem($index)
    {
        $cartItems = json_decode($_COOKIE[$this->cookieName], true);

        if (isset($cartItems[$index])) {
            unset($cartItems[$index]);
            $this->setCookie(array_values($cartItems));
        }
    }

    public function updateItemQuantity($itemId, $quantity)
    {
        $cartItems = json_decode($_COOKIE[$this->cookieName], true);

        foreach ($cartItems as $index => $item) {
            if (isset($item['id']) && $item['id'] == $itemId) {
                // Decrease the quantity or remove the item if the new quantity is zero or less
                $newQuantity = max(0, $item['quantity'] - $quantity);
                $cartItems[$index]['quantity'] = $newQuantity;

                // If the quantity becomes zero or negative, remove the item
                if ($newQuantity <= 0) {
                    unset($cartItems[$index]);
                }

                $this->setCookie(array_values($cartItems));
                return; // Stop searching once the item is found and updated
            }
        }
    }


    public function removeItemById($itemId)
    {
        $cartItems = json_decode($_COOKIE[$this->cookieName], true);

        foreach ($cartItems as $index => $item) {
            if (isset($item['id']) && $item['id'] == $itemId) {
                unset($cartItems[$index]);
                $this->setCookie(array_values($cartItems));
                return; // Stop searching once the item is found and removed
            }
        }
    }

    public function getAllItems()
    {
        return json_decode($_COOKIE[$this->cookieName], true);
    }
}

// Usage Example:

// Instantiate the Cart class
// $cart = new Cart();

// // Get all items in the cart
// $allItems = $cart->getAllItems();
// print_r($allItems);

// // Add an item to the cart
// $item = array(
//     'id' => $product[0]->id,
//     'name' => $product[0]->name,
//     'price' => $product[0]->price,
//     'quantity' => $quantity,
//     'color' => $color,
//     'size' => $size
// );
// $cart->addItem($item);

// // Remove an item from the cart based on ID
// $cart->removeItem($id);
?>
