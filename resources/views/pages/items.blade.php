@extends('layouts.app')

@section('title')
    Items
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





<!-- Displays the errors -if any- in page -->
@if($errors->count() >0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif

<!-- this portion can onyl be accessed by admin -->
@if (Auth::user()->admin==1)
<form action="/items/additem">
  Title<br>
  <input type="text" name="title" value="">
  <br>
  Content:<br>
  <input type="text" name="content" value="">
  <br><br>

  Price:<br>
  <input type="text" name="price" value="">
  <br><br>



  <br><br>


<!-- the admin can go through and choose any of the existing categories -->
  <select name="category">

  @foreach ($categories as $category)

  <option  value="{{$category->id}}">{{$category->title}}</option>
 @endforeach

</select>



<br>

  <input type="submit" value="Submit">
</form> 
<br><br><br>



@endif








<!-- @if ($items)
   @foreach($items as $item)
      {{ $item->title }} <br>
      {{ $item->content }}
      <br>
      <br>


   @endforeach
@endif
<br><br><br> -->







<!-- two forms with the sole purpose to act as a button and sort the content -->
<form action="/items/sortasc">
  
  <input type="submit" name="Ascending" value="Sort by Price: Ascending">
<br><br>
</form>


<form action="/items/sortdesc">
  
  <input type="submit" name="Descending" value="Sort by Price: Descending">
<br><br>
</form>


<!-- a form used to find the item title in the data base and display it - returning errors if not found -->
<form action="/items/find/{{$item->item_id}}">
  
  <input type="text" name="title" >
    <input type="submit" name="" value="Find Item by Title">
    <br><br>

</form>




<!-- the items table .. the 'Buy' action can only be accessed by users, 'Delete' and 'Edit can only be accesed by admins' -->
<table class="table table-bordered table-hover">
                    <thead>
                    <th class="text-center">ID</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Content</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Category</th>

                   @if (Auth::user()->admin==0)                    
                    <th class="text-center">Action</th>
                    @endif

                   @if (Auth::user()->admin==1)
 <th class="text-center">Delete</th> 

 <th class="text-center">Edit</th> @endif
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->item_id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->content}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->category_id}}</td>

                            @if (Auth::user()->admin==0)

<td><a href="/items/buy/{{$item->item_id}}/{{Auth::user()->id}}" class="button">Buy</a></td>
@endif


                            @if (Auth::user()->admin==1)
<td><a href="/items/delete/{{$item->item_id}}" class="button">Delete</a></td>
<td><a href="/items/edititem/{{$item->item_id}}" class="button">edit</a></td>@endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>







@endsection








 