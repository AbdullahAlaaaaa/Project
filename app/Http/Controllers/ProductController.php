<?php

namespace App\Http\Controllers;
use Item;
use DB;
use Illuminate\Http\Request;
use App;
use Validator;
use Category;
use Order;

//using the (ProductController) as the Api controller
//same as the getAll function as in the other controllers but now values are returned as a json object

class ProductController extends Controller
{
    public function getAll() 
    {
       $items = DB::table('items')->get();
        $categories =App\Category::get();

        $data=[$items,$categories];

        return $data;


    }



     public function findItem(Request $req)
    {


        $validator = Validator::make($req->all(),[
                'title'=>'required|exists:items',
            
            
        ]);

        if($validator->fails())
            return back()->withErrors($validator->errors())->withInput();

        $title = $req->input('title');
        $items=DB::table('items')->where('title',$title)->get();
        $categories =App\Category::get();

        $data=[$title,$items,$categories];
        return $data;

    }


    public function buyItem($id,$user)
    {
        $items=DB::table('items')->where('item_id', '=', $id)->get();

        $data= array("user_id"=>$user,"item_id"=>$id,"items"=>$items);
     
        return $data;

    }


    public function getAllcat()
    {
       $categories =App\Category::get();
       
        return $categories;
       
    }


    public function getAllorder()
    {
       $users = DB::table('users')->get();
       $orders = DB::table('orders')->get();
       $data=[$users,$orders];



        

        return $data;


    }



}
