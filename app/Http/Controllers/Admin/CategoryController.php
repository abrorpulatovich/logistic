<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Pipeline\Pipeline;
use App;

class CategoryController extends Controller
{
    private $name;
    public function __construct()
    {
        $lang = App::getLocale();
        if ($lang == 'uz-Latn') {
            $name = 'name_uz';
        } else {
            $name = 'name_' . $lang;
        }
        $this->name = $name;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = app(Pipeline::class)
            ->send(Category::query())
            ->through([
                \App\QueryFilters\Category\ParentID::class,
                \App\QueryFilters\Category\Name::class,
                \App\QueryFilters\Category\Slug::class,
                \App\QueryFilters\Category\Status::class
            ])
            ->thenReturn()
            ->paginate(7);

        return view('admin.category.index', [
            'categories' => $categories,
            'parent_categories' => $this->get_parent_categories()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_categories = $this->get_parent_categories();
        return view('admin.category.create', compact('parent_categories'));
    }

    public function get_parent_categories()
    {
        $parent_categories = Category::where('parent_id', 0)->get();
        $parent_categories = $parent_categories->pluck($this->name, 'id');
        return $parent_categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create($this->validateData($request));
        $this->storeImage($category);
        return redirect()->route('category.show', ['category' => $category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parent_categories = $this->get_parent_categories();
        return view('admin.category.edit', compact('category' ,'parent_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($this->validateData($request));
        $this->storeImage($category);
        return redirect()->route('category.show', ['category' => $category]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->deleteExistingImage($category);
        $category->delete();
        return redirect()->route('category.index')->with('deleted_successfully', __('messages.Deleted successfully'));
    }

    public function deleteExistingImage(Category $category)
    {
        $deleted = false;
        if (!is_null($category->breadcrumb_bg_image)) {
            unlink(storage_path("app/public/uploads/category/large/"  . $category->breadcrumb_bg_image));
            unlink(storage_path("app/public/uploads/category/medium/" . $category->breadcrumb_bg_image));
            unlink(storage_path("app/public/uploads/category/small/"  . $category->breadcrumb_bg_image));
            $deleted = true;
        }
        return response()->json(['deleted' => $deleted]);
    }

    private function storeImage($category)
    {
        $today = now()->format('d.m.Y');

        if (request()->hasFile('breadcrumb_bg_image')) {

            $this->deleteExistingImage($category);
            $image = request()->file('breadcrumb_bg_image');
            $file_name = $image->getClientOriginalName() . '.' . time() . '.' . $image->extension();
        
            $img = Image::make($image->path());

            $path_large = storage_path() . '/app/public/uploads/category/large/' . $today;
            File::makeDirectory($path_large, $mode = 0777, true, true);

            $path_medium = storage_path() . '/app/public/uploads/category/medium/' . $today;
            File::makeDirectory($path_medium, $mode = 0777, true, true);

            $path_small = storage_path() . '/app/public/uploads/category/small/' . $today;
            File::makeDirectory($path_small, $mode = 0777, true, true);

            $img->resize(1920, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/category/large') . '/' . $today . '/' . $file_name);

            $img->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/category/medium') . '/' . $today . '/' . $file_name);

            $img->resize(450, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/category/small') . '/' . $today . '/' . $file_name);

            $category->update([
                'breadcrumb_bg_image' => $today . '/' . $file_name
            ]);
        }
    }

    private function validateData()
    {
        return tap(request()->validate([
            'parent_id' => 'required',
            'name_uz'   => 'required',
            'name_ar'   => 'required',
            'name_ko'   => 'required',
            'name_en'   => 'required',
            'name_ru'   => 'required',
            'status'    => 'required',
            'slug'      => 'required',
            'c_order' => 'required'
        ]), function() {
            if (request()->hasFile('breadcrumb_bg_image')) {
                request()->validate([
                    'breadcrumb_bg_image' => 'file|image|max:10000'
                ]);
            }
        });
    }
}
