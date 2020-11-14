<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class NewsController extends Controller
{
    public function reditect_news($slug = null)
    {
        if($slug) {
            $slug = 'news/' . $slug;
            $new = Post::with('category')->where('slug', $slug)->active()->firstOrFail();
            $new->increment('view_count');
            $other_news = Post::active()->where('slug', 'like', 'news/%')->where('slug', '!=', $slug)->get();
            return view('front.site.news.details', compact('new', 'other_news'));
        } else {
            $news = Post::active()->where('slug', 'like', 'news/%')->get();
            return view('front.site.news.index', compact('news'));
        }
    }
}
