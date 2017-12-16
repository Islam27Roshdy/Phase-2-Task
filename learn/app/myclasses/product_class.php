<?php

namespace App\myclasses;

use DB;
use App\Product;
use App\Store;
use App\myclasses\adding_new_type;
use App\myclasses\abstract_showing_products;


/*this class is to perform all operations related to product as (inserting a new product,deleting a product, editing Existing
 product,adding new type of products and showing all products).

1-there is a common function in the two classes , so i made an abstract class and made the two classes extend it
so the two classes can use the same function (showallproducts) without the need to write the same code in each class
but the two clasess must have the ability to add new type of (product and cart) so i made an interface
which the two classes will implement but each one with a different code

 */
class product_class extends abstract_showing_products implements adding_new_type{
  //any product hasthe following three attributes name,type,amount so we encapsulate these attributes so that the functions
  //inserting new product can use them privalty.
private $name;
private $type;
private $amount;
public function __construct($name,$type,$amount){
  $this->name=$name;
  $this->type=$type;
  $this->amount=$amount;
}
public static function add_new_type($re){
  // this is the implemented function from adding_new_type class which all classes must implement.
    DB::insert('insert into types_products(product_type) values(?)',[$re->newtype]);
  }

public function insert_new_product(){
  //ORM
  $product=new Product();
  $product->name=$this->name;
  $product->id_type= $this->type;
  $product->amount=$this->amount;
  $product->save();
}


public static function delete($id_product) {
   DB::delete('delete from products where id_product=?',[$id_product]);
}

public function edit_product($id_product) {
DB::update('update products set name=? and id_type=? and amount=?
where id_product=?',[$this->name,$this->type,$this->amount,$id_product]);
}

}

?>
