<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    // Relasi Polymorphic Many to Many ke Image Model
    public function images(){
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    // Relasi Polymorphic Many to Many ke Tag Model
    public function tags(){
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}

