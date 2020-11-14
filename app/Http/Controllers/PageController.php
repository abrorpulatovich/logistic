<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    public function redirect_page($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        $page->increment('view_count');
        return view('front.site.pages.details', compact('page'));
    }
}
