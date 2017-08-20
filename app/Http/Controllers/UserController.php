<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Validator;

class UserController extends Controller
{
    


    public function getAll()
    {
       $users = DB::table('users')->get();
        return view('pages.users')->with(['users'=>$users]);
    }



    public function editUserPage($id)
    {
       $users = DB::table('users')->where('id', $id)->first();
        return view('pages.userEdit')->with(['user'=>$users]);


    }



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

        $data= array("name"=>$name,"email"=>$email,"Password"=>$hashed);

        DB::table('users')->where('id','=', $id)->update($data);

        return view('home');
    }



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
