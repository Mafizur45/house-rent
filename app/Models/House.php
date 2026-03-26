<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = [

      'title',
      'description',
      'rent',
      'bedrooms',
      'bathrooms',
      'area',
      'mobile',
      'city',
      'image_url',
      'month',
      'is_furnished',
      'is_available'

    ];

    public function comments()
{
    return $this->hasMany(Comment::class)->latest();
}
public function images()
{
    return $this->hasMany(HouseImage::class);
}

}
