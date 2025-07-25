<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class , 'user_id');
    }

    public function purchaseHistory():HasOne{
        return $this->hasOne(PurchaseHistory::class ,'customer_id');
    }

    public function comments():HasMany{
        return $this->hasMany(Comment::class ,'customer_id');
    }

    public function orders():HasMany{
        return $this->hasMany(Order::class ,'customer_id');
    }
}
