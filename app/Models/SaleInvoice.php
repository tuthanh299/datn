<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    use HasFactory;

    protected $fillable =['id', 'fullname', 'phone', 'address','total_price','paid_status', 'shipping_status', 'member_id'];

}
