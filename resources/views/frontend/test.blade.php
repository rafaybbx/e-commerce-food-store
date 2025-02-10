{{-- @php

    $cartItems = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    $sum = 0;
@endphp

@if (count($cartItems) > 0)
    <h2>Your Cart</h2>
    <ul>
        @foreach ($cartItems as $item)
            <li>
                <strong>{{ $item['name'] }}</strong>
                <br>
                Price: ${{ $item['price'] }}
                <br>
                id: {{ $item['id'] }}
                <br>
                Quantity: {{ $item['quantity'] }}
                <br>
                img: {{ $item['image'] }}
            </li>
            @php
                $sum += $item['price'] * $item['quantity'];
            @endphp
        @endforeach
    </ul>

    <p>Total: ${{ $sum }}</p>

    <!-- Add your checkout or other cart-related functionality here -->
@else
    <p>Your cart is empty.</p>
@endif --}}
