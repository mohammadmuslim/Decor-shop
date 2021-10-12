<?php

namespace App\Models;
// namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public function Shop()
    {
        return $this->belongsTo(Shop::class,'shop_id', 'id');
    }
    public function invoicedetails()
    {
        return $this->hasMany(invoicedetail::class, 'invoice_no', 'id');
    }
}
