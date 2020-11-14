<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Page;

class SiteController extends Controller
{
    public function index()
    {
        $news = Post::active()->orderBy('created_at', 'desc')->where('slug', 'like', 'news/%')->take(2)->get();
        $services = Post::active()->orderBy('created_at', 'desc')->where('slug', 'like', 'uslugi/%')->get();
        $about_us = Page::where('slug', 'o-nas')->first();

        return view('front.site.index', compact('news', 'services', 'about_us'));
    }
}
