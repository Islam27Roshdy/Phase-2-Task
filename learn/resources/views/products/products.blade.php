@extends('master')

@section('content')
<h1 class='text1'>Add Aditional types or new produts</h1>
<ol>
<li><h3><a href='product/add_new_product'>Add New Product</a></h3></li>
<li><h3><a href='product/add_new_type'>Add New Type</a></h3></li>
</ol>
<div id='table_existing_products'>
<h1 >Manage all products</h1>
<table border='3' class='tables'>
<tr><td class='clear'>Product Name</td><td class='clear'>Amount</td><td class='clear'>Delete product</td><td class='clear'>Edit product</td></tr>

@foreach($all_products as $product)
<tr>
   <td class='clear'>{{$product->name}}</td>
   <td class='clear'>{{$product->amount}}</td>
   <td class='clear'><a href='product/delete/{{$product->id_product}}'>Delete</a></td>
   <td class='clear'><a href='edit/{{$product->id_product}}'>Edit</a></td>
</tr>
@endforeach
</table>
</div>
@stop
