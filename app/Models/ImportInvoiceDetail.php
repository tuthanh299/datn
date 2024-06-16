<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportInvoiceDetail extends Model
{
    protected $fillable = ['import_invoice_id', 'product_id', 'import_price', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
