@extends('layouts.app')

@section('title')
    Users
@endsection

@section('bar')
<a class="navbar-brand" href="{{ url('/') }}">
                        Home
                    </a><a class="navbar-brand" href="{{ url('/items') }}">
                        Items
                    </a><a class="navbar-brand" href="{{ url('/category') }}">
                        Categories
                    </a>
                    <a class="navbar-brand" href="{{ url('/orders') }}">
                        Orders
                    </a>

                    @if (Auth::user()->admin==1)
                    <a class="navbar-brand" href="{{ url('/users') }}">
                        Users
                    </a>
                    @endif
@endsection


@section('content')




@if (Auth::user()->admin==1)

@if($errors->count() >0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif


<form action="/users/adduser">
  <label>Name:</label><br>
  <input type="text" name="name" value="">
  <br>
  <label>Email:</label><br>
  <input type="text" name="email" value="">
  <br><br>

  <label>Password</label><br>
  <input type="text" name="password" value="">
  <br><br>



  <br><br>



 




<br>

  <input type="submit" value="Submit">


</form> 
<br><br><br>
@endif



<table class="table table-bordered table-hover">
                    <thead>
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Password</th>
                   @if (Auth::user()->admin==1)
 <th class="text-center">isAdmin</th>
 <th class="text-center">Delete</th>
 <th class="text-center">Edit</th> @endif
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->password}}</td>
                            <td>{{$user->admin}}</td>
                            @if (Auth::user()->admin==1)
<td><a href="/users/delete/{{$user->id}}" class="button">Delete</a></td>
<td><a href="/users/edituser/{{$user->id}}" class="button">Edit</a></td>
@endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>




                @endsection