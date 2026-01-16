<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    //
    protected $table = 'product_variants';
    protected $fillable = [
        'product_id',
        'duration',
        'type',
        'price',
        'sale_price',
    ];

    public function productVariants(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
