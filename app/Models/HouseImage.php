<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseImage extends Model
{
    use HasFactory;

    protected $fillable= [
      'image_url'
        
    ];

    public function images()
{
    return $this->hasMany(HouseImage::class);
}
}
