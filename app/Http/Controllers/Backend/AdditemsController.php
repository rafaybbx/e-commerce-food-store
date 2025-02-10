<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdditemsController extends Controller
{
    public function index()
    {

        //   echo '<a href="logout">logout</a>';
        return view('backend.additems');

    }

}
