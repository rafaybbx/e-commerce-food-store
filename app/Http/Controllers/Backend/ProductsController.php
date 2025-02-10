<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(5); // Adjust the number of items per page as needed

        return view('backend.products', compact('products'));
    }
    public function edit(Request $request, $product_id)
    {

        $product = Product::find($product_id);

        // Check if the product is found
        if (!$product) {
            // Handle the case where the product is not found, maybe redirect or show an error message
            return redirect()->route('admin.products')->with('error', 'Product not found');
        }






        return view('backend.edit', compact('product'));
    }





    public function update(Request $request, $product_id)
    {

        // dd($request->all());
        // dd($request->name);
        $product = Product::find($product_id);

        // Check if the product is found
        if (!$product) {
            // Handle the case where the product is not found, maybe redirect or show an error message
            return redirect()->route('admin.products')->with('error', 'Product not found');
        }
        $product->update($request->all());

        return redirect()->route('admin.dashboard');
    }
    public function add(Request $request)
    {


        $product = new Product;
        $product->name = $request->input('name');
        $product->img = $request->input('img');
        $product->quantity_per_kg = $request->input('quantity');
        $product->price_per_kg = $request->input('price');
        $product->save();


        return redirect()->route('admin.dashboard');
    }




    public function delete(Request $request, $product_id)
    {
        // Your delete logic here using $product_id

        Product::destroy($product_id);
        return redirect('/admin/products')->with('success', 'Record deleted successfully');

        // return view('backend.products', compact('products'));
    }

}
