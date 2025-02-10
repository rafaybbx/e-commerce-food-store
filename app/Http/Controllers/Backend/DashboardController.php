<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;



class DashboardController extends Controller
{



    //just to view the page
    // public function index()
    // {

    //     return view('backend.dashboard');
    // }


    public function index()
    {

        //   echo '<a href="logout">logout</a>';


        $allorders = Order::all();
        $orderCount = $allorders->count();
        $totalOrderPrice = $allorders->sum('price');




        $usersWithRoleOne = User::where('role', 1)->get();
        $users = $usersWithRoleOne->count();


        return view('backend.dashboard', [
            'orderCount' => $orderCount,
            'totalOrderPrice' => $totalOrderPrice,
            'userCountWithRoleOne' => $users,

        ]);



    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');

    }
}
