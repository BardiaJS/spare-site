<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'customer_id' , 
        'product_id' , 
        'value'
    ];
}
