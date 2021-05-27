<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'type',
        'name',
        'desc',
        'weight',
        'price',
        'src'
    ];
}
