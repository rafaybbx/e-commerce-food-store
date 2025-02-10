<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- title -->
    <title>Fruitkha</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href={{ asset('assets/img/favicon.png') }}>
    <!-- google font -->
    <link href={{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700') }} rel="stylesheet">

    <link href={{ asset('https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap') }} rel="stylesheet">

    <script src={{ asset('https://code.jquery.com/jquery-3.6.4.min.js') }}></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href={{ asset('assets/css/all.min.css') }}>
    <!-- bootstrap -->
    <link rel="stylesheet" href={{ asset('assets/bootstrap/css/bootstrap.min.css') }}>
    <!-- owl carousel -->
    <link rel="stylesheet" href={{ asset('assets/css/owl.carousel.css') }}>
    <!-- magnific popup -->
    <link rel="stylesheet" href={{ asset('assets/css/magnific-popup.css') }}>
    <!-- animate css -->
    <link rel="stylesheet" href={{ asset('assets/css/animate.css') }}>
    <!-- mean menu css -->
    <link rel="stylesheet" href={{ asset('assets/css/meanmenu.min.css') }}>
    <!-- main style -->
    <link rel="stylesheet" href={{ asset('assets/css/main.css') }}>
    <!-- responsive -->
    <link rel="stylesheet" href={{ asset('assets/css/responsive.css') }}>


    <style>
        /* Add these styles to your CSS file */

        .pagination-wrap {
            margin-top: 20px;
        }

        .pagination {
            display: inline-block;
            margin: 0;
            padding: 0;
        }

        .pagination li {
            display: inline;
            margin-right: 5px;
        }

        .pagination a,
        .pagination span {
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #fff;
            color: #333;
            text-decoration: none;
        }

        .pagination .active a,
        .pagination li:hover a {
            background-color: #f28123;
            color: #fff;
            border: 50px
        }

        .pagination .disabled span {
            background-color: #eee;
            color: #aaa;
            pointer-events: none;
            cursor: not-allowed;
        }


        input[type="number"] {
            -webkit-appearance: none;
            -moz-appearance: textfield;
            appearance: textfield;
        }



        #searchlist {
            position: absolute;
            z-index: 1000;
            /* Set a high z-index to ensure it's on top */
            background-color: white;
            /* Set background color to white */
            border: 1px solid #ccc;
            /* Add border for a better visual */
            list-style-type: none;
            /* Remove default list styles */
            padding: 0;
            margin: 0;
        }

        #searchlist li {
            padding: 8px;
            border-bottom: 1px solid #eee;
            /* Add a border between items */
        }

        /* Add other styles as needed */

        /* Rest of your existing styles */
        .search {
            position: relative;
            /* Add other styles for .search as needed */
        }

        .fa-magnifying-glass {
            display: none;
            /* Hide the search icon */
        }

        /* Add styles for the magnifying glass icon as needed */
    </style>

</head>

<body>

    <!--PreLoader-->
    {{-- <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div> --}}
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="{{ url('/') }}">
                                <img src="assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>

                                {{-- <li class="current-list-item"><a href="#">Home</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.html">Static Home</a></li>
                                        <li><a href="index_2.html">Slider Home</a></li>
                                    </ul>
                                </li> --}}
                                <li><a href="{{ url('/about') }}">About</a></li>

                                {{-- <li><a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="404.html">404 page</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Check Out</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="news.html">News</a></li>
                                        <li><a href="shop.html">Shop</a></li>
                                    </ul>
                                </li> --}}

                                <li><a href="{{ url('/news') }}">News</a></li>

                                {{-- <li><a href="news.html">News</a>
                                    <ul class="sub-menu">
                                        <li><a href="news.html">News</a></li>
                                        <li><a href="single-news.html">Single News</a></li>
                                    </ul>
                                </li> --}}

                                <li><a href="{{ url('/contact') }}">Contact</a></li>

                                <li><a href="{{ url('/shop') }}">Shop</a></li>


                                {{-- <li><a href="{{url('/cart')}}">Cart</a></li>

                                <li><a href="{{url('/login')}}">Signup/login</a></li> --}}

                                {{-- <li><a href="shop.html">Shop</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="checkout.html">Check Out</a></li>
                                        <li><a href="single-product.html">Single Product</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                    </ul>
                                </li> --}}
                                <li>
                                    <div class=" header-icons">
                                        <a class="mobile-hide shopping-cart" href="{{ url('/cart') }}"><i
                                                class="fas fa-shopping-cart"></i></a>

                                        <a class="mobile-hide search-bar-icon" href="#"><i
                                                class="fas fa-search"></i></a>


                                        <a class="mobile-hide" href="{{ url('/admin/login') }}"><i
                                                class="fas fa-user"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input id="searchbar" type="text" placeholder="Keywords">
                            <ul class="fas fa-search" id="searchlist">

                            </ul>
                            {{-- <button type="submit">Search <i class="fas fa-search"></i></button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->
