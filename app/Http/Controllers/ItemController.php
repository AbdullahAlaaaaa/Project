<?php

namespace App\Http\Controllers;
use Item;
use DB;
use Illuminate\Http\Request;
use App;
use Validator;


class ItemController extends Controller
{
    



    public function getAll() //get All available items
    {
       $items = DB::table('items')->get();
        $categories =App\Category::get();
        return view('pages.items')->with(['items'=>$items,'categories'=>$categories]);
    }





    public function addItem(Request $req) //Add one item after validation *requires Admin privileges*
    {


        //validates the input
        $validator = Validator::make($req->all(),[
                'title'=>'required|unique:items',
            'price'=>'required',
            'category'=>'required',
            'content'=>'required',
            
        ]);

        if($validator->fails())
            return back()->withErrors($validator->errors())->withInput();
    	$title = $req->input('title');
        $content = $req->input('content');
        $category = $req->get('category');
        $price = $req->get('price');


    	$data= array("title"=>$title,"content"=>$content,"category_id"=>$category,"price"=>$price);
    	DB::table('items')->insert($data);
    	  return back();
        

    }


    public function deleteItem($id)  //Deletes a cetain item *requires Admin privileges*
    {
        DB::table('items')->where('item_id', '=', $id)->delete();

        return back();
    }




    public function editItemPage($id) //redirects to item edit page *requires Admin privileges*
    {

    $categories = DB::table('categories')->get();
    $item = DB::table('items')->where('item_id', $id)->first();
    return view('pages.itemedit')->with(['categories'=>$categories,'item'=>$item]);

    }


   

    public function editItem(Request $req)
    {


    $validator = Validator::make($req->all(),[
        'title'=>'required|unique:items',
        'price'=>'required',
         'category'=>'required',
         'content'=>'required',
            
        ]);

    if($validator->fails())
         return back()->withErrors($validator->errors())->withInput();


        $item_id = $req->input('item_id');
        $title = $req->input('title');
        $content = $req->input('content');
        $category = $req->input('category');
        $price = $req->input('price');


        //places all the inputs in an array to be inserted to the DB
        $data= array("title"=>$title,"content"=>$content,"category_id"=>$category,"item_id"=>$item_id,"price"=>$price);
     

        DB::table('items')->where('item_id','=', $item_id)->update($data);

        return view('home');
    }


    public function sortasc() //sorts the items by price - ascending
    {   $items = DB::table('items')->orderBy('price', 'asc')->get();
        $categories =App\Category::get();   
        return view('pages.items')->with(['items'=>$items,'categories'=>$categories]);
    }

     public function sortdesc()//sorts the items by price-descending
    {

        $items = DB::table('items')->orderBy('price', 'desc')->get();
        $categories =App\Category::get();
        return view('pages.items')->with(['items'=>$items,'categories'=>$categories]);
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

        return view('pages.items')->with(['items'=>$items,'categories'=>$categories]);

    }

     public function buyItem($id,$user)
    {
        $items=DB::table('items')->where('item_id', '=', $id)->get();
        $data= array("user_id"=>$user,"item_id"=>$id,"items"=>$items);
        DB::table('orders')->insert($data);
          return back();

    }


}
