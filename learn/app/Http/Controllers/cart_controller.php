<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Cart;
use App\Store;
use App\myclasses\cart_class;

class cart_controller extends Controller
{
    public function showallcarts(){
    $allcarts=DB::table('carts')->get();
      return view('carts.carts',compact('allcarts'));
    }


    public function addnewcart(){
     $all_types_carts=DB::table('types_carts')->get();
     return view('carts.addnewcart',compact('all_types_carts'));
    }


    //this function is to save the data of the newly added cart.
    public function savecart(Request $re)
    {
       $newcart=new Cart();
       $this->validate($re,[
       'name' => 'required'
     ]);
       $newcart->name=$re->name;
       $newcart->id_type=$re->id_type;
       $newcart->save();
       return back();
    }


    //this function is to get the products stored in a specified cart and to get views that enable us from
    // deleting or aupdating product or even deleting all product in a cart.
    // delete and update.
    /**
     *
     */


public function cart_control($idofcart){
//firstly it gets all products to enable the user to add a product to the current cart specified with $idofcart.
$cart_object=new cart_class($idofcart);
//this join statement to get the products stored in a given cart
$saved_products_in_given_cart=$cart_object->get_saved_products_in_cart();
$allproducts=cart_class::showallproducts();
//$saved_products_given_cart=DB::select('select *from products where id_product=(select id_product from stores where id_cart=?)',[$idofcart]);
return view('carts.cart_control',compact('allproducts','idofcart','saved_products_in_given_cart'));
}


   public function add_product_to_cart($id_product,$id_cart){
// here an existing product will be added to a specified cart in the many-to-many table (stores).
//firstly we make an instance of Store model class then we insert the ids of product and cart.
//firstly check if the product is already added to the cart.
                       $cart_object=new cart_class($id_cart);
                       $cart_object->add_product_to_given_cart($id_product);
                       return back();
              }


public function remove_product_from_cart($product,$id_cart){
  //here i need the two ids of the product needed to be removed and the id of the cart holding that product.
  //here i'm calling the overloading function remove_product() with $product as an argument to remove only this passed product
  //below with no argument to remove all products in the passed cart which is passed in the instantiation of the cart_class.
  $cart_object=new cart_class($id_cart);
  $cart_object->remove_product($product);
    //$product->delete();
    //  DB::table('stores')->where('id_product','id_cart','=',[$product,$id_cart])->delete();
    return back();
}

public function add_type(){
  //this is the view to add show the form of inserting new type of cart.
return view('carts.addtype');
}


public function remove_all_products_from_cart($id_cart){
    $cart_object=new cart_class($id_cart);
    $cart_object->remove_all_products();
    return back();
}


 public function save_new_type(Request $re){
//firstly we validate the form to no insert type leass than 5 character validation of the form
   $this->validate($re,[
     'newtype' => 'required|min:5'
   ]);
  cart_class::add_new_type($re); //calling the static method add_new_type which is
  //implemented from adding_new_type classe in cart_class class, calling it with the name of the class as no instance of
  //the class is needed.
  return back();
 }

}
