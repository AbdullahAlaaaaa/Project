<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Item;
use DB;
use App;
use Validator;
use Order;


class OrderController extends Controller
{
     public function getAll() //shows all orders
    {
       $users = DB::table('users')->get();
       $orders = DB::table('orders')->get();
        return view('pages.orders')->with(['users'=>$users,'orders'=>$orders]);


    }
}
