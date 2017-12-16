@extends('master')
@section('content')

<form action="product/save_new_type_product" method="post">
  {{csrf_field()}}
  <input type='text' name='newtype' value="Insert a new type" class='textfield'>
  <input type='submit' id='butcarttype'>
</form>
<br><br><br>
@if(count($errors))
<ul>
  @foreach($errors->all() as $error)

     <li>{{$error}}</li>

@endforeach

</ul>
@endif

@stop
