<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'category_id',
        'name',
        'desc',
        'content',
        'slug',
        'photo',
        'photo2',
        'regular_price',
        'sale_price',
        'discount',
        'publisher',
        'author',
        'code',
        'status',
        'outstanding',
    ];

    use HasFactory;
}
