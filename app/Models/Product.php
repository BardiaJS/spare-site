<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'admin_id' , 
        'brand_id' , 
        'category_id' , 
        'title',
        'value' , 
        'vehicle'
    ];

    public function brand():BelongsTo{
        return $this->belongsTo(Brand::class , 'product_id');
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class ,'category_id');
    }



    public function image():HasOne{
        return $this->hasOne(Image::class ,'product_id');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image && Storage::disk('public')->exists($this->image->path)) {
            return asset('storage/' . $this->image->path);
        }
        return asset('default-image.png');
    }
}
