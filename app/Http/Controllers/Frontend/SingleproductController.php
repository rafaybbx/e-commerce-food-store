<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SingleproductController extends Controller
{
    public function index(){
        return view('frontend.single-product');

    }

    public function show($pid)
    {
        $product = Product::find($pid);
        $allproducts= Product::all();
        return view('frontend.single-product', compact('product'),compact('allproducts'));

    }
}
