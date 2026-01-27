<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillImageModel extends Model
{
    //
    protected $table = 'bills_image';

    protected $fillable = [
        'path',
        'image',
    ];
}
