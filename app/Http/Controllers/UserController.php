<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Validator;

class UserController extends Controller
{
    

    // shows all registered users
    public function getAll() 
    {
       $users = DB::table('users')->get();
        return view('pages.users')->with(['users'=>$users]);
    }


    // redirects to the edit user page
    public function editUserPage($id)
    {
       $users = DB::table('users')->where('id', $id)->first();
        return view('pages.userEdit')->with(['user'=>$users]);


    }


    // takes form input data>validates it and update the corrosponding user
    public function editUser(Request $req)
    {



    	$validator = Validator::make($req->all(),[
            'name'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);

        if($validator->fails())
            return back()->withErrors($validator->errors())->withInput();

        
        $id = $req->input('id');
        $name = $req->input('name');
                $email = $req->input('email');
        $password = $req->input('password');
        $Password = $req->input('Password');

        $hashed = Hash::make($password);
        // password cant be stored as it is .. since during login laravel compares the bcrypt not the password it self

        $data= array("name"=>$name,"email"=>$email,"Password"=>$hashed);

        DB::table('users')->where('id','=', $id)->update($data);

        return view('home');
    }


    // Adds a user after validation 
    public function addUser(Request $req)
    {


    	$validator = Validator::make($req->all(),[
            'name'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);

        if($validator->fails())
            return back()->withErrors($validator->errors())->withInput();


        $id = $req->input('id');
        $name = $req->input('name');
                $email = $req->input('email');
        $password = $req->input('password');
        $Password = $req->input('Password');

        $hashed = Hash::make($password);




        $name = $req->input('name');
        $email = $req->input('email');
        $password = $req->get('password');
        $hashed = Hash::make($password);




    	$data= array("name"=>$name,"email"=>$email,"password"=>$hashed);
    	DB::table('users')->insert($data);
    	  return back();

    }
    public function deleteUser($id)
    {
    DB::table('users')->where('id', '=', $id)->delete();

        return back();
    }


    }
