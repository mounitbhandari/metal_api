<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $hidden = [
        "inforce","created_at","updated_at"
    ];

    public function products() {
        return $this->hasMany('App\Model\Product', 'product_category_id');
    }
}
