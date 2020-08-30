<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(9);

        return view('article.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::findBySlug($slug);
        $categories = Category::select('id', 'name')->get();

        return view('article.show', compact('post', 'categories'));
    }

    public function category($category)
    {
        $posts = Post::findByCategory($category);

        if (count($posts) > 0) {
            return view('article.index', compact('posts'));
        } else {
            return redirect()->route('home');
        }
    }
}
