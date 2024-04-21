<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'content',
        'product_photo_name',
        'product_photo_path',
        'regular_price',
        'sale_price',
        'discount',
        'publisher',
        'author',
        'code',
        'publishing_year',
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
        return $this->belongsTo(Publisher::class,'publisher');
    }
   
    public function productGallery()
    {
        return $this->hasMany(ProductGallery::class,'product_id');
        
    }
}
