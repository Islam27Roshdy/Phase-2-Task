@extends('master')

@section('content')
<h3>please fill the following form to edit These product</h3>

<form action='saveedit' method='post'>
  {{csrf_field()}}
<span>Edit the name:</span><br>
<input type='text' value='' name='name' class='form-control'><br><br><br>

<span>Edit the amount:</span><br>
<input type='text' value='' name='amount' class='form-control'><br><br><br>

  <select name='id_type' class='drop'>
    <option value="">Edit the type</option>
    @foreach($all_types_products as $product_type)

      <option value={{$product_type->id_type}}>  {{$product_type->product_type}} </option>

  @endforeach
</select><br><br>
  <input type='hidden' value='{{$id_product}}' name='hidden_product_id'>
  <input type="submit" value="Edit the Product" id="butcarttype">
  <br><br>
</from>

@stop
