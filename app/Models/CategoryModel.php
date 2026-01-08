<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    //
    protected $table = 'categories';
    public function parent(){
        return $this->belongsTo(CategoryModel::class, 'parent_id');
    }

    public function children(){
        return $this->hasMany(CategoryModel::class, 'parent_id');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
