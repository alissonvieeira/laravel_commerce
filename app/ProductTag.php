<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $fillable = [
            'product_id'
    ];

    public function products()
    {
        return $this->belongsToMany('CodeCommerce\Product');
    }
}
