@extends('master')


@section('content')
<h3 class='text3'>Add a new product to your cart</h3>
<ul type=''>
@foreach($allproducts as $product)
<li class='sep'><span>{{$product->name}}</span><a href='addtocart/{{$product->id_product}}/{{$idofcart}}' class='but'>Add to cart</a></li>
@endforeach
</ul>

<div id='already_added_products'>
<h3 class='text3'>The already added products</h3>
<table border='3'>
  <tr><td class='text3'>Product-Name</td><td class='text3'>Product-Amount</td><td colspan='2' class='text3'>Remove</td></tr>
  @foreach($saved_products_in_given_cart as $row)
  <tr>
    <td>  {{$row->name}} </td>

    <td> {{$row->amount}} </td>

    <td class='text3'><a href='delete_product/{{$row->id_product}}/{{$idofcart}}'>Remove</a></td>

  </tr>
  @endforeach
</table>
<h3><a href='delete_products/{{$idofcart}}'>Free the Cart</a><h3>
</div>
@stop
