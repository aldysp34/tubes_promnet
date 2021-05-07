<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Relasi One to Many dari User Model(invers)
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relasi Many to Many ke Category Model
    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }

    // Relasi Polymorphic Many to Many ke Image Model
    public function images(){
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    // Relasi Polymorphic Many to Many ke Tag Model
    public function tags(){
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
