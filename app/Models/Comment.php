<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

     protected $fillable = ['house_id', 'name', 'comment'];

      public function house()
    {
        return $this->belongsTo(House::class);
    }
}
