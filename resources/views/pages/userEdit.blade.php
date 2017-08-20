@extends('layouts.app')

@section('content')






@if($errors->count() >0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif






 <form action="/users/edituser/edit/{{$user->id}}">
  <label>User:</label><br>
  <input type="text" name="name" value="{{$user->name}}">
  <br>

<label>Email:</label><br>
  <input type="text" name="email" value="{{$user->email}}">
  <br><br>



  <label>Password:</label><br>
  <input type="text" name="Password" value="">
  <br><br>


  <label>Admin privilege:</label><br>
  <input type="text" name="password" value="{{$user->admin}}">
  <br><br>

   
  <input type="hidden" name="id" value="{{$user->id}}">


    <br><br>

  



  <input type="submit" value="red">
</form>


@endsection