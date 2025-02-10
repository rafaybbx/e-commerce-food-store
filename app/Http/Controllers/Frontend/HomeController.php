<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class HomeController extends Controller
{
    //
        public function index(){
        $allproducts = Product::all();


        return view('frontend.index',compact('allproducts'));

    }
        public function test(){


        return view('frontend.test');

    }

}
