<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Item;
use DB;
use App;
use Category;

class CategoryController extends Controller
{
    // show all available categories
    public function getAll()
    {
       $categories =App\Category::get();
       
        return view('pages.category')->with('categories',$categories);
       




    }

    // adds a category based on the input
    public function addcategory(Request $req)
    {
       $title = $req->input('title');

    	$data= array("title"=>$title);
    	DB::table('categories')->insert($data);
    	  return back();


    }



    
}
