<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Tests\Integration\Database\EloquentHasManyThroughTest\Category;

class Product extends Model
{
    //
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price',
        'sale_price',
        'quantity',
        'status',
        'quantity',
        'image'
    ];

    protected $casts = [
       'price' => 'decimal:2',
       'quantity' => 'integer',
       'created_at' => 'datetime',
       'updated_at' => 'datetime'
    ];
//    Định dạng giá sản phẩm

    public function getFormattedPriceAttribute(){
        return number_format($this->attributes['price'],0, ',', '.');
    }

//
    public function getFormattedBadgeAttribute(){
        return $this->category === 'account' ? 'Tài khoản' : 'Sản phẩm';
    }

    public function getStatusBadgeAttribute(){
        return $this->attributes['status'] == 'active' ? 'Hoạt động' : 'Ngừng bán';
    }

    public function scopeCategory($query, $category){
        if($category){
            return $query->where('category',$category);
        }
        return $query;
    }

    public function scopeStatus($query, $status){
        if($status){
            return $query->where('status',$status);
        }
        return $query;
    }

    public function scopeSearch($query, $search){
        if($search){
            return $query->where('name','like','%'.$search.'%');
        }
        return $query;
    }

    public function category_relation(){
        return $this->hasOne(CategoryModel::class, 'id', 'category_id');
    }

    public function product_variant(){
        return $this->hasMany(ProductVariants::class, 'product_id', 'id');
    }
}
