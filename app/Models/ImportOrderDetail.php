<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportOrderDetail extends Model
{
    protected $fillable = ['import_order_id', 'product_id', 'import_price', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
