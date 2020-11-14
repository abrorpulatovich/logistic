<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Setting;
use App\Category;
use App\Page;
use App\Partner;
use App\Slider;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function settings()
    {
        return Setting::first();
    }

    public static function categories()
    {
        return Category::where('status', 2)->get();
    }

    public static function about_us()
    {
        return Page::where('slug', 'o-nas')->where('status', 2)->first();
    }

    public static function current_category()
    {
        // $slug = request()->segments()[1];
        // $current_category = Category::where('slug', $slug)->first();
        // return $current_category;
    }

    public static function partners()
    {
        return Partner::where('status', 2)->get();
    }

    public static function sliders()
    {
        return Slider::active()->orderBy('created_at', 'desc')->get();
    }

}
