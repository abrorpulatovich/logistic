<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ServicesController extends Controller
{
    public function reditect_services($slug = null)
    {
        if($slug) {
            $slug = 'uslugi/' . $slug;
            $service = Post::with('category')->where('slug', $slug)->active()->firstOrFail();
            $other_services = Post::active()->where('slug', 'like', 'uslugi/%')->where('slug', '!=', $slug)->get();
            return view('front.site.services.details', compact('service', 'other_services'));
        } else {
            $services = Post::active()->where('slug', 'like', 'uslugi/%')->get();
            return view('front.site.services.index', compact('services'));
        }
    }
}
