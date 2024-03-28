<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
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

    public function category(): HasOne 
    {
        return $this->hasOne(Category::class,"id","category_id");
    }

    use HasFactory;
}
