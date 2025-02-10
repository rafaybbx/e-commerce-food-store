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
            margin-right: 5px;
        }

        button.cart-btn:hover {
            background-color: #051922;
            color: #F28123;
        }

        .single-product-form button.cart-btn {
            margin-bottom: 15px;
        }
    </style>



    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>See more Details</p>
                        <h1>Single Product</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- single product -->
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ asset($product->img) }}" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>
                        <p class="single-product-pricing"><span>Per Kg</span> ${{ $product->price_per_kg }}</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi
                            cum
                            voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi
                            perferendis
                            eos eum modi! Tempora, earum.</p>
                        <div class="single-product-form">


                            {{-- <form action="{{ route('cart.add', ['product_id' => $product->id]) }}" method="POST" @csrf
                                <input type="hidden" name="quantity" placeholder="0" id="quantityInput" value="0">

                                <button type="submit" class="cart-btn"
                                    style="background: none; border: none; padding: 0; color: blue; text-decoration: underline; cursor: pointer;">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>

                            </form> --}}

                            <form action="{{ route('cart.add', ['product_id' => $product->pid]) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" id="quantityInput" value="0">
                                <!-- Default value, you can adjust this as needed -->
                                <button type="submit" class="cart-btn">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>

                                {{-- <a type="submit" class="cart-btn">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </a> --}}
                            </form>


                            {{-- <a href="#" document.getElementById('quantityInput').value)" class="cart-btn">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </a> --}}

                            {{-- <form id="addToCartForm"
                                action="{{ route('cart.add', ['product_id' => $product->pid, 'quantity' => 0]) }}"
                                method="POST">
                                @csrf
                                <input type="number" placeholder="0" name="quantity" id="quantityInput">
                                <button type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add
                                    Cart</button>
                            </form> --}}


                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('noitem'))
                                <div class="alert alert-warning">
                                    {{ session('noitem') }}
                                </div>
                            @endif



                            <p><strong>Categories: </strong>Fruits, Organic</p>
                        </div>
                        <h4>Share:</h4>
                        <ul class="product-share">
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single product -->

    <!-- more products -->
    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Related</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @php $count = 0; @endphp
                @foreach ($allproducts as $relatedProduct)
                    @if ($relatedProduct->pid !== $product->pid && $count < 3)
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="{{ url("/single-product/$relatedProduct->pid") }}">
                                        <img src="{{ asset($relatedProduct->img) }}" alt="{{ $relatedProduct->name }}">
                                    </a>
                                </div>
                                <h3>{{ $relatedProduct->name }}</h3>
                                <p class="product-price"><span>Per Kg</span> {{ $relatedProduct->price_per_kg }}$ </p>
                                <a href="{{ url('/cart') }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        @php $count++; @endphp
                    @endif
                @endforeach
            </div>
        </div>
    </div>


    <!-- end more products -->

    <!-- logo carousel -->
    {{-- <div class="logo-carousel-section">
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
    </div> --}}
    <!-- end logo carousel -->
@endsection
