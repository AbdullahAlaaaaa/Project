@if (Auth::user()->admin==1)



@foreach ($categories as $cateogry)
    {{ $cateogry->item}}
    <br>
@endforeach



<form action="/category/addcategory">
  Title<br>
  <input type="text" name="title" value="">
  <br>
  




  <input type="submit" value="Submit">
</form> 
<br><br><br>
@endif


<!-- page used for testing -->