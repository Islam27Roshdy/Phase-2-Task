  @extends('master')

  @section('content')
<div id='leftdistance'>
<h1 class='text2'>Add Aditional types and new carts</h1>
<ol >
<li><a href="addnewcart" class='text1'>Add New cart</a></li><br><br>
<li><a href='addnewtypeofcart' class='text1'>Add New Type</a><br></ki></ol>
</div>

<div id='style_existing_carts'>
<h3 class='text2'>Control Existing Carts</h3>
<ul>
@foreach($allcarts as $cart)
<li ><a href='carts/{{$cart->id_cart}}'><span class='text3'>{{$cart->name}}</span></a></li><br>
@endforeach
</ul>
</div>
@stop
