<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Pembuatan const agar function tidak hard code
    public const DRAFT = 0;
    public const ACTIVE = 1;
    public const INACTIVE = 2;

    public const POST = 'Post';
    public const PAGE = 'Page';

    public const STATUSES = [
        self::DRAFT => 'draft',
        self::ACTIVE => 'active',
        self::INACTIVE => 'inactive'
    ];

    // Pengaturan Output date time seperti apa
    public $casts = [
        'published_at' => 'datetime:d, M Y H:i',
    ];

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

    // Cek apakah kolom status bernilai 1
    // Menggunakan isi variabel dari const diatas
    public function scopeActivePost($query){
        return $query->where('status',self::ACTIVE)
                    ->where('post_type', self::POST)
                    ->where('published_at', '<=', Carbon::now());
    }

    // untuk mendapatkan post dengan 'published at' yang lebih baru waktunya
    public function getNextPostAttribute(){
        $nextPost = self::activePost()
                ->where('published_at', '>', $this->published_at)
                ->orderBy('published_at', 'asc')
                ->first();

        return $nextPost;
    }

    // untuk mendapatkan post dengan 'published at' yang lebih lama waktunya
    public function getPrevPostAttribute(){
        $prevPost = self::activePost()
                ->where('published_at', '<', $this->published_at)
                ->orderBy('published_at', 'desc')
                ->first();

        return $prevPost;
    }
}
