<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_Product extends Model
{
    public function products(){
      return $this->hasMany(Product::class);
    }
}
