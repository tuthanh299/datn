<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImportOrder extends Model
{
    use SoftDeletes;

    protected $fillable = ['order_code', 'import_date', 'total_price'];
    public function importinvoicedetail()
    {
        return $this->hasMany(ImportOrderDetail::class, 'import_order_id');
    }
}
