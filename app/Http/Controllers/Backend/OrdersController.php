<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;


class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(5); // Adjust the number of items per page as needed

        //   echo '<a href="logout">logout</a>';
        return view('backend.orders', compact('orders'));

    }

}
