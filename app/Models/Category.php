<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    // Relasi Many to Many ke Post Model
    public function posts(){
        return $this->belongsToMany('App\Models\Post');
    }
}
