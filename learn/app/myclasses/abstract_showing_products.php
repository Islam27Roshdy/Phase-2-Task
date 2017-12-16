<?php
namespace App\myclasses;
use DB;

/*showing all products is a common function in cart handling page (in adding new product to a cart) and also in product handling

page  when showing all available products on the system to delete or edit one so i will use this function two times
so i made abstract class which will be extended with the two classes(cart_class,product_class).
*/

abstract class abstract_showing_products{
  static $allproducts;
  public static function showallproducts(){
      return self::$allproducts=$allproducts=DB::table('products')->get();
  }
}

?>
