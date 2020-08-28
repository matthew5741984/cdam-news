<?php

namespace App\Http\Controllers;

use App\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(9);

        return view('article.index', compact('posts'));
    }
}
