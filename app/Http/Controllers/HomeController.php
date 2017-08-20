<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Item;
use DB;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



      
        return view('home');
    }

    // dummy function used to access a dummy page - for testing 
    public function index1()
    {

       

         $items = DB::table('items')->get();
         $category = DB::table('category')->get();

    
        return view('home1')->with(['items'=>$items]);




      
    }
}
