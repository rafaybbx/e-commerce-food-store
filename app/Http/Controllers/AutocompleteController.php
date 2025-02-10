<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class AutocompleteController extends Controller
{

    public function index()
    {

        return view('frontend.abc');

    }
    
    public function searchProducts($term)
    {
        $similarProducts = Product::where('name', 'LIKE', "%$term%")->get();
        return $similarProducts;
    }


    public function handleBothForms(Request $request)
    {
        $formData = $request->all();

        // Handle the combined data from both forms
        // Access data using $formData['input1'], $formData['input2'], etc.

        return response()->json(['message' => 'Forms submitted successfully', 'data' => $formData]);
    }
}

