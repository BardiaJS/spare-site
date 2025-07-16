<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = [
        'user_id' , 
        'phone' , 
        'address' ,
        'postal_code'
    ] ;


    public function user(): BelongsTo{
        return $this->belongsTo(User::class , 'user_id');
    }
}
