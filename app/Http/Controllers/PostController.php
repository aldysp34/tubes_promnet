<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

use Inertia\Inertia;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user:id,name')
            ->with('categories:slug,nama')
            ->paginate(10);

        return Inertia::render('Posts/Index', ['posts' => $posts]);
    }

    public function create(){
        $categories = Category::orderBy('nama', 'asc')->get();
        
        return Inertia::render('Posts/Create', ['categories' => $categories]);
    }
}
