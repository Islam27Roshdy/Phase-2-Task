<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function type_products(){
      return $this->belongsTo(Type_Product::class);
    }
}
