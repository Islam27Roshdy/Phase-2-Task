@extends('master')

@section('content')
<h1 class='text1'>Add Aditional types or new produts</h1>
<ol>
<li><h3><a href='product/add_new_product'>Add New Product</a></h3></li>
<li><h3><a href='product/add_new_type'>Add New Type</a></h3></li>
</ol>
<h1>Manage all products</h1>
<table border='3' id='table_existing_products'>
<tr><td>Product Name</td><td>Amount</td><td>Delete product</td></tr>

@foreach($all_products as $product)
<tr>
   <td>{{$product->name}}</td>
   <td>{{$product->amount}}</td>
   <td><a href='product/delete/{{$product->id_product}}'>Delete</a></td>
   <td><a href='edit/{{$product->id_product}}'>Edit</a></td>
</tr>
@endforeach
</table>
@stop
