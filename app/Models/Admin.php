<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Model
{
    protected $fillable = [
        'user_id' ,
        'national_code',
        'information' , 
        'age'
    ];


    public function user():BelongsTo{
        return $this->belongsTo(User::class , 'user_id');
    }
}
