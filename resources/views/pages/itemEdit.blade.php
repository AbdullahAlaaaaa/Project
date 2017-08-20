@extends('layouts.app')

@section('content')

<!-- finds if there is an error in the form after submitting and displays them -->
@if($errors->count() >0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
@endif








<!-- sends the editted item data and validates it -->
<form action="/items/edititem/edit/{{$item->item_id}}">
  <label>Title:</label><br>
  <input type="text" name="title" value="{{$item->title}}">
  <br>
  <label>Content:</label><br>
  <input type="text" name="content" value="{{$item->content}}">
  <br><br>

    <label>Price:</label><br>
  <input type="text" name="price" value="{{$item->price}}">
  <br><br>

   <label>Category:</label><br>


  <select name="category">
  @foreach ($categories as $category)

    <option name="category" value="{{$category->id}}">{{$category->title}}</option>
     @endforeach

  </select>


    <br><br>

  <input type="hidden" name="item_id" value="{{$item->item_id}}">

  <br><br>



  <input type="submit" value="red">
</form>



@endsection