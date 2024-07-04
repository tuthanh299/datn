<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportOrder extends Model
{
    protected $fillable = ['invoice_code', 'import_date', 'total_price'];
    public function importinvoicedetail()
    {
        return $this->hasMany(ImportOrderDetail::class, 'import_invoice_id');
    }
}
