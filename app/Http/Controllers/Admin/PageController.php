<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pipeline\Pipeline;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use App\Services\Slug;
use App;

class PageController extends Controller
{
    private $title;
    public function __construct()
    {
        $lang = App::getLocale();
        if ($lang == 'uz-Latn') {
            $title = 'title_uz';
        } else {
            $title = 'title_' . $lang;
        }
        $this->title = $title;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $pages = app(Pipeline::class)
            ->send(Page::query())
            ->through([
                \App\QueryFilters\Page\Title::class,
                \App\QueryFilters\Page\Slug::class,
                \App\QueryFilters\Page\Status::class
            ])
            ->thenReturn()
            ->paginate(7);

        return view('admin.page.index', [
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = Page::create($this->validateData($request));
        $this->storeImage($page);
        return redirect()->route('page.show', ['page' => $page]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('admin.page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $date = explode('.', $page->publish_date);
        $form_publish_date = $date[1] . '/' . $date[0] . '/' . $date[2];

        return view('admin.page.edit', compact('page', 'form_publish_date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $page->update($this->validateData($request));
        $this->storeImage($page);
        return redirect()->route('page.show', ['page' => $page]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $this->deleteExistingImage($page);
        $page->delete();
        return redirect()->route('page.index')->with('deleted_successfully', __('messages.Deleted successfully'));
    }

    public function deleteExistingImage(Page $page)
    {
        $deleted = false;
        if (!is_null($page->image)) {
            unlink(storage_path("app/public/uploads/page/large/"  . $page->image));
            unlink(storage_path("app/public/uploads/page/medium/" . $page->image));
            unlink(storage_path("app/public/uploads/page/small/"  . $page->image));
            $deleted = true;
        }
        return response()->json(['deleted' => $deleted]);
    }

    private function storeImage($page)
    {
        $today = now()->format('d.m.Y');

        if (request()->hasFile('image')) {

            $this->deleteExistingImage($page);
            $image = request()->file('image');
            $file_name = $image->getClientOriginalName() . '.' . time() . '.' . $image->extension();

            $img = Image::make($image->path());

            $path_large = storage_path() . '/app/public/uploads/page/large/' . $today;
            File::makeDirectory($path_large, $mode = 0777, true, true);

            $path_medium = storage_path() . '/app/public/uploads/page/medium/' . $today;
            File::makeDirectory($path_medium, $mode = 0777, true, true);

            $path_small = storage_path() . '/app/public/uploads/page/small/' . $today;
            File::makeDirectory($path_small, $mode = 0777, true, true);

            $img->resize(1920, 450, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/page/large') . '/' . $today . '/' . $file_name);

            $img->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/page/medium') . '/' . $today . '/' . $file_name);

            $img->resize(450, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/page/small') . '/' . $today . '/' . $file_name);

            $page->update([
                'image' => $today . '/' . $file_name
            ]);
        }
    }

    private function validateData()
    {
        return tap(request()->validate([
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
