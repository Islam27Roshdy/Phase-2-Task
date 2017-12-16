@extends('master')
@section('content')

<form action='carts/save_new_type_cart' method="post">
  {{csrf_field()}}
  <div id='septyecart'>
<input type="text" id='textfield' name="newtype" class='textfield'><br><br>
<input type="submit" value="Add new Type" id="butcarttype">
</form>
</div>
@if(count($errors))
<ul>
  @foreach($errors->all() as $error)

     <li>{{$error}}</li>

@endforeach

</ul>
@endif
@stop
