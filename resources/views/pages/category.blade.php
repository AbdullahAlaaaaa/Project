@extends('layouts.app')


@section('title')
    Categories
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


<form action="/category/addcategory">
  Title<br>
  <input required="" type="text" name="title" value="">
  <br><br>
 

  <input type="submit" value="Submit">
</form> 








<br><br><br>


<!-- a table to show the categories with their content 
some TD are accessed by admins (edit/delete) and (Buy) is accessed buy the user -->
<table class="table table-bordered table-hover">
                    <thead>
                    <th class="text-center">Category</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Items</th>
                   
                   @if (Auth::user()->admin==1)
 <th class="text-center">Delete</th> 

 <th class="text-center">Edit</th> @endif
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->title}}</td>





                            <td>
							@foreach ($category->item as $item)
							{{$item->title}}
							<br>
							@endforeach
							<br>
							 </td>





                            @if (Auth::user()->admin==1)
<td><a href="/items/delete/" class="button">Delete</a></td>
<td><a href="/items/edititem/" class="button">edit</a></td>@endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>




@endsection