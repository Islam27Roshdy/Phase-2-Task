<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Cart;
use App\Store;
use App\myclasses\cart_class;
use App\myclasses\product_class;

class product_controller extends Controller
{

    public function showallproducts(){
    $all_products=product_class::showallproducts();
    /*this function is defined in the abstract class which product_class
    is extending so we use it directly no need to define it again ; the same thing in cart_class and i defined
    it in the abstract class as static so without any instance of product_class,
     because showallproducts do a common function in both classes(product_class,cart_class); this function is
     we can with the name of the class call it This
     showing all products so that class (cart_class) can add new products to any cart or remove one product or
    more or all product with one-click.
    class (product_class) can manage them (products) to delete or edit any product.I made it static
    because it make a common job and it do not use any variable from any of the two classes and ; so no need of
    instantiation an object and create
    many attribute in memory this will be resource consuming, but calling it with the name of
    the two classes is simple and effective.8*/

    return view('products.products',compact('all_products'));
    }

    public function add_type(){
         return view('products.add_new_type_product');
    }

    public function save_new_type(Request $re){
    //an instance of the product class then we use the implemented function from the interface
       //called adding_new_type as well as the cart_class class use it but the the difference is in the implementation
       $this->validate($re,[
     'newtype' => 'required|min:3'
       ]);
      product_class::add_new_type($re);
        return back();
    }


    public function add_product(){
      $all_types_products=DB::table('types_products')->get();
         return view('products.addnewproduct',compact('all_types_products'));
    }


    public function save_product(Request $re){
      $this->validate($re,[
        'name' => 'required|min:2|max:15',
        'id_type' => 'required|min:1', 'amount' => 'required|min:1'
      ]);
      $product_instance=new product_class($re->name,$re->id_type,$re->amount);
      $product_instance->insert_new_product();
      return back();
    }

    public function delete_product($id_product){
      product_class::delete($id_product);
      return back();
    }
    public function edit_form($id_product){
     //here we need to fetch all the types of of produts and pass it to the view so that the user can change the type of the
     // product which is needed to to be edited.
     //here the most important thing in updating the data of the product is to send the id of the product to hide
     // it in the edit_form view then we can receive it when the form is submitted then we use the id to edit only
     //the product having this hidden id. this all is implemented in edit_form.
          $all_types_products=DB::table('types_products')->get();
      return view('products.edit_form',compact('id_product','all_types_products'));
  }

  public function save_edited_product(Request $re){
    $this->validate($re,[
     'name' => 'required|min:2|max:15',
     'id_type' => 'required', 'amount' => 'required|min:1'
    ]);

    //$re->hidden_product_id this is the id of the product needed to be edited we received it from edit_form's form
    //and then we send it edit_product function so we only edit this product.
      $product_instance=new product_class($re->name,$re->id_type,$re->amount);
      $product_instance->edit_product($re->hidden_product_id);
      return back();
  }
}
