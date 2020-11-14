<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pipeline\Pipeline;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use App;

class SliderController extends Controller
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
        $sliders = app(Pipeline::class)
            ->send(Slider::query())
            ->through([
                \App\QueryFilters\Slider\Title::class,
                \App\QueryFilters\Slider\Slug::class,
                \App\QueryFilters\Slider\Status::class
            ])
            ->thenReturn()
            ->paginate(7);

        return view('admin.slider.index', [
            'sliders' => $sliders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = Slider::create($this->validateData($request));
        $this->storeImage($slider);
        return redirect()->route('slider.show', ['slider' => $slider]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('admin.slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $slider->update($this->validateData($request));
        $this->storeImage($slider);
        return redirect()->route('slider.show', ['slider' => $slider]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $this->deleteExistingImage($slider);
        $slider->delete();
        return redirect()->route('slider.index')->with('deleted_successfully', __('messages.Deleted successfully'));
    }

    public function deleteExistingImage(Slider $slider)
    {
        $deleted = false;
        if (!is_null($slider->image)) {
            unlink(storage_path("app/public/uploads/slider/large/"  . $slider->image));
            unlink(storage_path("app/public/uploads/slider/medium/" . $slider->image));
            unlink(storage_path("app/public/uploads/slider/small/"  . $slider->image));
            $deleted = true;
        }
        return response()->json(['deleted' => $deleted]);
    }

    private function storeImage($slider)
    {
        $today = now()->format('d.m.Y');

        if (request()->hasFile('image')) {

            $this->deleteExistingImage($slider);
            $image = request()->file('image');
            $file_name = $image->getClientOriginalName() . '.' . time() . '.' . $image->extension();
        
            $img = Image::make($image->path());

            $path_large = storage_path() . '/app/public/uploads/slider/large/' . $today;
            File::makeDirectory($path_large, $mode = 0777, true, true);

            $path_medium = storage_path() . '/app/public/uploads/slider/medium/' . $today;
            File::makeDirectory($path_medium, $mode = 0777, true, true);

            $path_small = storage_path() . '/app/public/uploads/slider/small/' . $today;
            File::makeDirectory($path_small, $mode = 0777, true, true);

            $img->resize(1920, 707, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/slider/large') . '/' . $today . '/' . $file_name);

            $img->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/slider/medium') . '/' . $today . '/' . $file_name);

            $img->resize(450, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/slider/small') . '/' . $today . '/' . $file_name);

            $slider->update([
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
            'status'        => 'required',
            'slug'          => 'required'
        ]), function() {
            if (request()->hasFile('image')) {
                request()->validate([
                    'image' => 'file|image|max:10000'
                ]);
            }
        });
    }
}
