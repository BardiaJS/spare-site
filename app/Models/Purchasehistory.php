<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchasehistory extends Model
{
    protected $fillable= [
        'customer_id' , 
        'product_id'
    ];

    public function customer(): BelongsTo{
        return $this->belongsTo(Customer::class , 'customer_id');
    }
}
