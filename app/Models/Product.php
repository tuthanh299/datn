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
        'publisher_id',
        'author',
        'code',
        'status',
        'outstanding',
    ];
    protected $attributes = [
        'status' => false,
        'outstanding' => false,
    ];
    public function images(){
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');        
    }
   
    public function productGallery()
    {
        return $this->hasMany(ProductGallery::class,'product_id');
        
    }

    use HasFactory;
}
