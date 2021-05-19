<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function __construct()
    {
        Inertia::setRootView('blog');
    }

    // untuk menampilkan halaman utama dengan list artikel
    public function index(){
        $posts = Post::activePost()
                ->with('user:id,name')
                ->with('categories:id,slug,nama')
                ->get();

        return Inertia::render('Blog/index', [
            'posts' => $posts
        ]);
    }

    // untuk menampilkan detail artikel
    public function show($slug){
        $post = Post::activePost()
                ->with('user:id,name')
                ->with('categories:slug,nama')
                ->with('tags:slug,nama')
                ->where('slug', $slug)
                ->firstOrFail();

        return Inertia::render('Blog/show', [
            'post' => $post,
            'nextPost' => $post->next_post,
            'prevPost' => $post->prev_post
        ]);
    }

    // untuk menampilkan artikel berdasarkan user
    public function user($userId){
        $posts = Post::activePost()
                ->where('user_id', $userId)
                ->with('user:id,name')
                ->with('categories:id,slug,nama')
                ->get();

        return Inertia::render('Blog/index', [
            'posts' => $posts
        ]);
    }

    // Untuk menampilkan artikel berdasarkan kategori
    public function category($slug){
        $posts = Post::activePost()
                ->whereHas('categories', function(Builder $query) use ($slug){
                    $query->where('slug', $slug);
                })
                ->with('user:id,name')
                ->with('categories:id,slug,nama')
                ->get();

        return Inertia::render('Blog/index', [
            'posts' => $posts
        ]);
    }

    // untuk menampilkan artikel yang mempunyai spesifik tag
    public function tag($slug){
        $posts = Post::activePost()
        ->whereHas('tags', function(Builder $query) use ($slug){
            $query->where('slug', $slug);
        })
        ->with('user:id,name')
        ->with('categories:id,slug,nama')
        ->get();


        return Inertia::render('Blog/index', [
            'posts' => $posts
        ]);
    }

}
