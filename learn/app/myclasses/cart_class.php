<?php
namespace App\myclasses;

use DB;
use App\Store;
use App\myclasses\adding_new_type;
use App\myclasses\abstract_showing_products;// this is the abstract class which will do common function in all classes in the project


class cart_class extends abstract_showing_products implements adding_new_type{

  private $idofcart;
  public function __construct($id){
    $this->idofcart=$id;
  }
  //this function is to fetch all added products in a given cart

  public function get_saved_products_in_cart(){

    $id=$this->idofcart;
   return $all_saved_products = DB::table('stores')->join('products',function($join) use($id){
      $join->on('products.id_product','=','stores.id_product')->where('stores.id_cart','=',$id);
    })->get();

}

public function remove_product($product){
   DB::delete('delete from stores where id_product=? and id_cart=?',[$product,$this->idofcart]);
}

public function remove_all_products(){
  DB::delete('delete from stores where id_cart=?',[$this->idofcart]);
}

public function add_product_to_given_cart($id_product){
  $store=new Store();
  $store->id_product=$id_product;
  $store->id_cart=$this->idofcart;
  $store->save();
  return;
}

public static function add_new_type($re){

    DB::insert('insert into types_carts(cart_type) values(?)',[$re->newtype]);
}
}
?>
