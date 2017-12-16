@extends('master')

@section('content')
<h3>please fill the following form to add new product</h3>

<form action='insert_new_product' method='post'>
  {{csrf_field()}}
<span>Insert the name:</span><br>
<input type='text' value='' name='name' class='form-control'><br><br><br>

<span>Insert the amount:</span><br>
<input type='text' value='' name='amount' class='form-control'><br><br><br>

  <select name='id_type' class='drop'>
    <option value="">select a type of the product</option>
    @foreach($all_types_products as $product_type)

      <option value={{$product_type->id_type}}>  {{$product_type->product_type}} </option>

  @endforeach
</select><br><br>
  <input type="submit" value="Add new cart" id="butcarttype">
  <br><br>
</from>

@stop
