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
            margin-top: 20px;
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
                        <h1>Check Out Product</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- check out section -->
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Billing Address
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">










                                            <form id="form1" action="{{ route('placeorder') }}" method="post">
                                                @csrf
                                                <p><input type="text" placeholder="Name" name="name"></p>
                                                <p><input type="email" placeholder="Email" name="email"></p>
                                                <p><input type="text" placeholder="Address" name="address"></p>
                                                <p><input type="tel" placeholder="Phone" name="phone"></p>
                                                <p>
                                                    <textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea>
                                                </p>
                                            </form>














                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Shipping Address
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shipping-address-form">

                                            <form id="form2" action="{{ route('placeorder') }}" method="post">

                                                <p>
                                                    <textarea name="ship" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea>
                                                </p>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Card Details
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="card-details">

                                            <form id="form3" action="{{ route('placeorder') }}" method="post">
                                                <p><input name="cardholdername" type="text"
                                                        placeholder="card holder's name"></p>
                                                <p><input name="cardnumber" type="number" placeholder="card number"></p>
                                                <p><input name="cardcvv" type="number" placeholder="CVV"></p>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="order-details-wrap">
                        <table class="order-details">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody class="order-details-body">

                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        @php

                                            $sum = $item['price'] * $item['quantity'];
                                        @endphp
                                        <td>${{ $sum }}</td>
                                    </tr>

                                    @php
                                        $total += $item['price'] * $item['quantity'];
                                    @endphp
                                @endforeach
                            </tbody>
                            <tbody class="checkout-details">
                                <tr>
                                    <td>Shipping</td>
                                    <td>$50</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>${{ $total }}</td>
                                </tr>
                            </tbody>

                        </table>
                        {{-- <a href="#" class="boxed-btn">Place Order</a> --}}
                        <button class="cart-btn" id="submitBtn">Place Order</button>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end check out section -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/1.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/2.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/3.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/4.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->


    <script>
        $(document).ready(function() {
            $('#submitBtn').on('click', function() {
                // Collect data from both forms
                var formData1 = $('#form1').serializeArray();
                var formData2 = $('#form2').serializeArray();
                var formData3 = $('#form3').serializeArray();

                // Combine data from both forms
                var combinedData = formData1.concat(formData2, formData3);

                // Send combined data as an AJAX request
                $.ajax({
                    type: 'POST',
                    url: '{{ route('placeorder') }}',
                    data: combinedData,

                    success: function(response) {
                        // Handle the response if needed
                        window.location.href = response.redirect_url;


                    },
                    error: function(error) {
                        // Handle errors if needed
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
