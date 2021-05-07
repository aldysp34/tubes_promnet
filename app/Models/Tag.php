<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug'
    ];

    // Relasi Invers Polymorphic Many to many ke Post Model
    public function posts(){
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }

    // Relasi Invers Polymorphic Many to many ke Gallery Model
    public function galleries(){
        return $this->morphedByMany('App\Models\Gallery', 'taggable');
    }
}


