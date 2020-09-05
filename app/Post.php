<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }

    public static function findByCategory($category)
    {
        return static::where('category_id', $category)->where('status', 'PUBLISHED')->orderBy('created_at', 'DESC')->paginate(9);
    }
}
