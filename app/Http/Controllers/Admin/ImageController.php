<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Slider;
use App\Partner;
use App\Page;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function deleteExistingImage($obj, $type)
    {
        $folder = "category";
        $column = "breadcrumb_bg_image";
        if($type == 'page') {
            $folder = "page";
            $column = "image";
        } elseif($type == "post") {
            $folder = "post";
            $column = "image";
        } elseif($type == "slider") {
            $folder = "slider";
            $column = "image";
        } elseif($type == "partner") {
            $folder = "partner";
            $column = "image";
        }

        $deleted = false;
        if (!is_null($obj->$column)) {
            unlink(storage_path("app/public/uploads/" . $folder . "/large/"  . $obj->$column));
            unlink(storage_path("app/public/uploads/" . $folder . "/medium/" . $obj->$column));
            unlink(storage_path("app/public/uploads/" . $folder . "/small/"  . $obj->$column));
            $deleted = true;
            $obj->update([
                $column => null
            ]);
        }
        return response()->json(['deleted' => $deleted]);
    }

    public function remove(Request $request)
    {
        $slug = $request->slug;
        $type = $request->type;

        $obj = Category::where('slug', $slug)->first();
        if($type == 'page') {
            $obj = Page::where('slug', $slug)->first();
        } elseif($type == "post") {
            $obj = Post::where('slug', $slug)->first();
        } elseif($type == "slider") {
            $obj = Slider::where('slug', $slug)->first();
        } elseif($type == "partner") {
            $obj = Partner::where('slug', $slug)->first();
        }
        $res = $this->deleteExistingImage($obj, $type);
        return $res;
    }
}
