<?php
namespace App\myclasses;

 /**
  *
  */
 interface interface_of_cart_class
 {
   public function add_product_to_given_cart($id_product);
   public function remove_all_products();
   public function remove_product($product);
   public function get_saved_products_in_cart();
 }



?>
