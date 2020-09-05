<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'PUBLISHED')->orderBy('created_at', 'DESC')->paginate(9);

        return view('article.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::findBySlug($slug);
        $this_category = $post->category_id;
        $recent_posts = Post::where('category_id', $this_category)->where('id', '!=', $post->id)->where('status', 'PUBLISHED')->orderBy('created_at', 'DESC')->take(3)->get();
        $categories = Category::select('id', 'name')->get();

        return view('article.show', compact('post', 'categories', 'recent_posts'));
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

    public function search(Request $request)
    {
        $str = $request->str;
        if (!$str) {
            $posts = Post::where('status', 'PUBLISHED')->orderBy('created_at', 'DESC')->paginate(9);
            return view('article.index', compact('posts'));
        } else {
            $posts = Post::where('status', 'PUBLISHED')->orderBy('created_at', 'DESC')->where('title', 'LIKE', "%{$str}%")->paginate(9);
            return view('article.index', compact('posts', 'str'));
        }
    }
}
