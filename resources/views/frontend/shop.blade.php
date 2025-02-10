@extends('frontend.layouts.main')

@section('main-container')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Shop</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".strawberry">Fresh Fruit</li>
                            <li data-filter=".berry">Dry Fruit</li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">

                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center {{ $product->name }}">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ url("/single-product/$product->pid") }}">
                                    {{-- <p>{{ $product->pid }}</p> --}}
                                    <img src="{{ asset($product->img) }}" alt="{{ $product->name }}">
                                </a>
                            </div>
                            <h3>{{ $product->name }}</h3>
                            <p class="product-price"><span>Per Kg</span> ${{ $product->price_per_kg }}</p>
                            {{-- {{ route('cart.add', $product->id) }} --}}
                            <a href="#" class="cart-btn">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>



            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($products->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">Prev</span></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $products->previousPageUrl() }}">Prev</a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($products as $page => $url)
                                @if ($page == $products->currentPage())
                                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($products->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled"><span class="page-link">Next</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- end products -->

    <!-- logo carousel -->

    <!-- end logo carousel -->
@endsection
