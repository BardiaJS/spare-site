<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Avatar extends Model
{
    protected $fillable = [
        'user_id' , 
        'path'
    ] ;

    public function user():BelongsTo{
        return $this->belongsTo(User::class , 'user_id');
    }


}
