@extends('master')

@section('content')

<form action='savecart' method='post'>
  {{csrf_field()}}

<span>Insert the name of a new cart: </span><input type='text' value='' name='name' class='textfield'><br><br>
<span>Select a type of the new cart: </span>
  <select name='id_type' class='drop'>
    @foreach($all_types_carts as $cart_type)
      <option value={{$cart_type->id_type}}>  {{$cart_type->cart_type}} </option>

  @endforeach
</select><br>
  <input type="submit" value="Add new cart" id="butcarttype">
</from>

@stop
