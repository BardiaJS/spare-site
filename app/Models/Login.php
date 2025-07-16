<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Login extends Model
{
    protected $fillable = [
        'user_id', 
        'last_time_login'
    ] ;


    public function user():BelongsTo{
        return $this->belongsTo(User::class , 'user_id');
    }
}
