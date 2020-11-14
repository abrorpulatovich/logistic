<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pipeline\Pipeline;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use App;

class PostController extends Controller
{
    private $title;
    private $name;

    public function __construct()
    {
        $lang = App::getLocale();
        if ($lang == 'uz-Latn') {
            $title = 'title_uz';
            $name = 'name_uz';
        } else {
            $title = 'title_' . $lang;
            $name = 'name_' . $lang;
        }
        $this->title = $title;
        $this->name = $name;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $posts = app(Pipeline::class)
            ->send(Post::query())
            ->through([
                \App\QueryFilters\Post\CategoryId::class,
                \App\QueryFilters\Post\Title::class,
                \App\QueryFilters\Post\Slug::class,
                \App\QueryFilters\Post\Status::class
            ])
            ->thenReturn()
            ->paginate(7);

        return view('admin.post.index', [
            'posts' => $posts,
            'categories' => $this->get_categories()
        ]);
    }

    public function get_categories()
    {
        $categories = Category::active()->get();
        $categories = $categories->pluck($this->name, 'id');
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->get_categories();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create($this->validateData($request));
        $this->storeImage($post);
        return redirect()->route('post.show', ['post' => $post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = $this->get_categories();
        $date = explode('.', $post->publish_date);
        $form_publish_date = $date[1] . '/' . $date[0] . '/' . $date[2];
        
        return view('admin.post.edit', compact('post', 'form_publish_date', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($this->validateData($request));
        $this->storeImage($post);
        return redirect()->route('post.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->deleteExistingImage($post);
        $post->delete();
        return redirect()->route('post.index')->with('deleted_successfully', __('messages.Deleted successfully'));
    }

    public function deleteExistingImage(Post $post)
    {
        $deleted = false;
        if (!is_null($post->image)) {
            unlink(storage_path("app/public/uploads/post/large/"  . $post->image));
            unlink(storage_path("app/public/uploads/post/medium/" . $post->image));
            unlink(storage_path("app/public/uploads/post/small/"  . $post->image));
            $deleted = true;
        }
        return response()->json(['deleted' => $deleted]);
    }

    private function storeImage($post)
    {
        $today = now()->format('d.m.Y');

        if (request()->hasFile('image')) {

            $this->deleteExistingImage($post);
            $image = request()->file('image');
            $file_name = $image->getClientOriginalName() . '.' . time() . '.' . $image->extension();
        
            $img = Image::make($image->path());

            $path_large = storage_path() . '/app/public/uploads/post/large/' . $today;
            File::makeDirectory($path_large, $mode = 0777, true, true);

            $path_medium = storage_path() . '/app/public/uploads/post/medium/' . $today;
            File::makeDirectory($path_medium, $mode = 0777, true, true);

            $path_small = storage_path() . '/app/public/uploads/post/small/' . $today;
            File::makeDirectory($path_small, $mode = 0777, true, true);

            $img->resize(810, 540, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/post/large') . '/' . $today . '/' . $file_name);

            $img->resize(555, 235, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/post/medium') . '/' . $today . '/' . $file_name);

            $img->resize(270, 180, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/post/small') . '/' . $today . '/' . $file_name);

            $post->update([
                'image' => $today . '/' . $file_name
            ]);
        }
    }

    private function validateData()
    {
        return tap(request()->validate([
            'category_id'   => 'required',
            'title_uz'      => 'required',
            'title_ar'      => 'required',
            'title_ko'      => 'required',
            'title_en'      => 'required',
            'title_ru'      => 'required',
            'short_desc_uz' => 'required',
            'short_desc_ar' => 'required',
            'short_desc_ko' => 'required',
            'short_desc_en' => 'required',
            'short_desc_ru' => 'required',
            'desc_uz'       => 'required',
            'desc_ar'       => 'required',
            'desc_ko'       => 'required',
            'desc_en'       => 'required',
            'desc_ru'       => 'required',
            'status'        => 'required',
            'slug'          => 'required',
            'publish_date'  => 'required'
        ]), function() {
            if (request()->hasFile('image')) {
                request()->validate([
                    'image' => 'file|image|max:10000'
                ]);
            }
        });
    }
}
