@extends('frontend.layouts.main')

@section('main-container')
    <style>
        button.cart-btn {
            font-family: 'Poppins', sans-serif;
            display: inline-block;
            background-color: #F28123;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
            margin-left: 15px;
        }

        button.cart-btn i {
            margin-right: 15px;
        }

        button.cart-btn:hover {
            background-color: #051922;
            color: #F28123;
        }

        .single-product-form button.cart-btn {
            margin-bottom: 15px;
        }
    </style>
    @php
        $cartItems = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        $sum = 0;
        $total = 0;
    @endphp

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <form action="{{ url('/updatecart') }}" method="post">
                        @csrf
                        <div class="cart-table-wrap">
                            <table class="cart-table">
                                <thead class="cart-table-head">
                                    <tr class="table-head-row">


                                        <th class="product-remove"></th>



                                        <th class="product-image">Product Image</th>
                                        <th class="product-name">Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr class="table-body-row">
                                            <!-- Product Remove Button -->

                                            <td hidden class="product-id">
                                                <input type="number" name="item[{{ $item['id'] }}]"
                                                    value="{{ $item['id'] }}" hidden />
                                            </td>


                                            <td class="product-remove">

                                                <a href="/removeFromCart/{{ $item['id'] }}" onclick="return">

                                                    <i class="far fa-window-close">

                                                    </i>

                                                </a>

                                            </td>

                                            <!-- Product Image -->
                                            <td class="product-image"><img src="{{ $item['image'] }}" alt="null"></td>

                                            <!-- Product Name -->
                                            <td class="product-name">{{ $item['name'] }}</td>

                                            <!-- Product Price -->
                                            <td class="product-price">${{ $item['price'] }}</td>


                                            <td class="product-quantity">
                                                <input type="number" name="quantities[{{ $item['id'] }}]"
                                                    value="{{ $item['quantity'] }}" placeholder="0" />
                                            </td>

                                            @php
                                                $sum = $item['price'] * $item['quantity'];

                                            @endphp

                                            <!-- Product Total -->
                                            <td class="product-total">${{ $sum }}</td>


                                        </tr>

                                        @php
                                            $total += $item['price'] * $item['quantity'];
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <button type="submit" class="boxed-btn">Update Cart</button> --}}
                        </div>
                    </form>
                </div>

                <!-- Total Section -->
                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- Total -->
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>${{ $total }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">


                            <button class="cart-btn" id="updateCartBtn">Update
                                Cart</button>


                            {{-- <a href="/removeFromCart/{{ $item['id'] }}" class="boxed-btn black">Check Out</a> --}}
                            <a href="{{ url('/checkout') }}" class="boxed-btn black">Check Out</a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listener to the single "Update Cart" button
            document.getElementById('updateCartBtn').addEventListener('click', function() {
                // Create an array to store item updates
                var updates = [];

                // Loop through all cart items to gather updates
                var cartItems = document.querySelectorAll('.table-body-row');
                cartItems.forEach(function(item) {
                    // var itemId = item.getAttribute('data-item-id');
                    var quantity = item.querySelector('.product-quantity input').value;
                    var itemId = item.querySelector('.product-id input').value;


                    // Add item update to the array
                    updates.push({
                        itemId: itemId,
                        quantity: quantity
                    });
                });

                // Make an AJAX request to update the cart with the gathered updates
                $.ajax({
                    url: '{{ url('/updatecart') }}',
                    type: 'POST',
                    data: {
                        updates: JSON.stringify(updates) // Convert updates array to JSON string
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Handle the response if needed
                        // console.log(response);
                        location.reload();
                        // You may want to update the total or perform other actions here
                    },
                    error: function(xhr, status, error) {
                        // Handle errors if needed
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
