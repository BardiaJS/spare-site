<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'customer_id' ,
        'product_id',
        'body'
    ] ;

    public function customer(): BelongsTo{
        return $this->belongsTo(Customer::class , 'customer_id');
    }

    public function product():BelongsTo{
        return $this->belongsTo(Product::class ,'product_id');
    }
}
