<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// 1-They are related to carts and adding, Removing a product or all products in a given cart, and also to add new cart.
Route::get('carts','cart_controller@showallcarts');
Route::get('addnewcart','cart_controller@addnewcart');
Route::post('savecart','cart_controller@savecart');
Route::get('carts/{idofcart}','cart_controller@cart_control');

/*This route to get id of a product and the id of the cart in which the product will be added then calling add_product_to_cart function
in the Controller to add in the database.*/
Route::get('carts/addtocart/{id_product}/{id_cart}','cart_controller@add_product_to_cart');
Route::get('carts/delete_product/{product}/{id_cart}','cart_controller@remove_product_from_cart');
Route::get('carts/delete_products/{id_cart}','cart_controller@remove_all_products_from_cart');
Route::get('addnewtypeofcart','cart_controller@add_type');
Route::post('carts/save_new_type_cart','cart_controller@save_new_type');


//Route::get('edit_product/{product}/{id_cart}','cart_controller@edit_product');




//2-They are related to product adding,deleting and editing.
Route::get('product','product_controller@showallproducts');
Route::get('product/add_new_type','product_controller@add_type');
Route::post('product/save_new_type_product','product_controller@save_new_type');
Route::get('product/add_new_product','product_controller@add_product');
Route::post('product/insert_new_product','product_controller@save_product');
Route::get('product/delete/{id_product}','product_controller@delete_product');
Route::get('edit/{id_product}','product_controller@edit_form');
Route::post('edit/saveedit','product_controller@save_edited_product');
