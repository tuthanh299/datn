<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportInvoice extends Model
{
    protected $fillable = ['invoice_code', 'import_date', 'total_price'];
    public function importinvoicedetail()
    {
        return $this->hasMany(ImportInvoiceDetail::class, 'import_invoice_id');
    }
}
