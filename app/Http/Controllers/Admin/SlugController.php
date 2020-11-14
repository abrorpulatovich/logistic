<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Slug;

class SlugController extends Controller
{
    public function create(Request $request)
    {
        $id = $request->id;
        $type = $request->type;

        $column = $request->name_ru;
        if($type == 'page' OR $type == 'post' OR $type == 'slider') {
            $column = $request->title_ru;
        } elseif($type == 'partner') {
            $column = $request->name;
        }

        $slug = new Slug();
        $slug = $slug->create($column, $id, $type);

        return response()->json(['slug' => $slug]);
    }
}
