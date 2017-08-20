<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Item;
use DB;
use App;
use Category;

class CategoryController extends Controller
{
    public function getAll()
    {
       $categories =App\Category::get();
       
        return view('pages.category')->with('categories',$categories);
       




    }


    public function addcategory(Request $req)
    {
       $title = $req->input('title');

    	$data= array("title"=>$title);
    	DB::table('categories')->insert($data);
    	  return back();


    }



    
}
