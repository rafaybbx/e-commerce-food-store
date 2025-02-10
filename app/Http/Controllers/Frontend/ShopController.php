<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6); // Assuming 5 products per page

        return view('frontend.shop', compact('products'));
    }

    public function show($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Pass the product to the view
        return view('frontend.product.show', compact('product'));
    }
}
