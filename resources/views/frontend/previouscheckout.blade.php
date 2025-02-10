@extends('frontend.layouts.main')

@section('main-container')
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

                            {{-- <form method="post" action="{{ url("/updatecart") }}">
                                @csrf
                                <label>Name:</label>
                                <input type="text" name="Name" ><br>

                                <label>CNIC:</label>
                                <input type="text" name="CNIC" ><br>

                                <label>Phone:</label>
                                <input type="text" name="Ph_Number"><br>

                                <button type="submit">Update</button>
                            </form> --}}

                            {{-- <form method="post" action="{{ url('/updatecart/placeorder') }}"> --}}


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

                                            <p><input type="text" placeholder="Name"></p>
                                            <p><input type="email" placeholder="Email"></p>
                                            <p><input type="text" placeholder="Address"></p>
                                            <p><input type="tel" placeholder="Phone"></p>
                                            <p>
                                                <textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <button type="submit">Place order</button> --}}

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
                                            <form action="">
                                                <p><input type="text" placeholder="Shipping adress"></p>
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
                                            <form action="">
                                                <p><input type="text" placeholder="card details"></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- </form> --}}
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
                                    {{-- <tr>
                                        <td>Berry</td>
                                        <td>$70.00</td>
                                    </tr>
                                    <tr>
                                        <td>Lemon</td>
                                        <td>$35.00</td>
                                    </tr> --}}
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
                        <a href="#" class="boxed-btn">Place Order</a>

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
@endsection
