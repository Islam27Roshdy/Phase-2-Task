<?php
namespace App\myclasses;

use DB;
use App\Store;
use App\myclasses\adding_new_type;
use App\myclasses\abstract_showing_products;/*
abstract_showing_products is the abstract class which will do common function in all classes in the project , this function is to show all products
saved in the system so the two parts of the project can use the products. the first part of the project related with
handling cart can use these products to add new product to the cart, the second part realted to 
handling the products can use these products to delete or edit any product,
*/
/*this class will have the extended function from the abstract class adding_new_type and no need to rebuild it again 
and it imlements an interface class adding_new_type and it must imlement the function declared only in adding_new_type
this because adding new type will hold by the two classes but the code will differ from class to another, one will add new type
of cart and the other will add type of product Adding is common as a task but different in implementation so i defined it as 
interface.
*/
class cart_class extends abstract_showing_products implements adding_new_type{

  private $idofcart;
  public function __construct($id){
    $this->idofcart=$id;
  }
  
  //this function is to fetch the data of all stored products in a given cart using join to combine stores and products 
 //and get the data of the stored products in the cart from products table. 

  public function get_saved_products_in_cart(){

    $id=$this->idofcart;
   return $all_saved_products = DB::table('stores')->join('products',function($join) use($id){
      $join->on('products.id_product','=','stores.id_product')->where('stores.id_cart','=',$id);
    })->get();

}
//this is to empty the cart from one product.
public function remove_product($product){
   DB::delete('delete from stores where id_product=? and id_cart=?',[$product,$this->idofcart]);
}
  
//this is to empty the cart from all the products.
public function remove_all_products(){
  DB::delete('delete from stores where id_cart=?',[$this->idofcart]);
}
  
/*add product to a specified cart; the inserting will be in the many-to-many table (stores) which its primay kies are the 
 primary key of products table and the primary key of carts table.*/
  
public function add_product_to_given_cart($id_product){
  $store=new Store();
  $store->id_product=$id_product;
  $store->id_cart=$this->idofcart;
  $store->save();
  return;
}
// add new type 
public static function add_new_type($re){

    // inserting new type in the types_carts table by making
    $type_cart=new Type_Product();
    $type_cart->cart_type=$re->newtype;
    $type_cart->save();
   /*or we can insert by this method    DB::insert('insert into types_carts(cart_type) values(?)',[$re->newtype]);
     DB::insert('insert into types_carts(cart_type) values(?)',[$re->newtype]);
     
   */
}
}
?>
