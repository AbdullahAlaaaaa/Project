@extends('layouts.app')



@section('title')
    Orders
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


<h1>You orders {{Auth::user()->name}}:</h1> 

<table class="table table-bordered table-hover">
                    <thead>
                    <th class="text-center">Title</th>
                    <th class="text-center">Content</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Category</th>

                   @if (Auth::user()->admin==0)                    
                    <th class="text-center">Action</th>
                    @endif

                   
                    </thead>
                    <tbody>

                    
                        <tr>
                        @foreach($orders as $item)

                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>{{$item->items}}</td>   
                                      


                            
                        </tr>
                        @endforeach     
                    </tbody>
                </table>




@endsection