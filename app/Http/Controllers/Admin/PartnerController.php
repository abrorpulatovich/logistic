<?php

namespace App\Http\Controllers\Admin;

use App\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pipeline\Pipeline;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use App;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = app(Pipeline::class)
            ->send(Partner::query())
            ->through([
                \App\QueryFilters\Partner\Name::class,
                \App\QueryFilters\Partner\Status::class
            ])
            ->thenReturn()
            ->paginate(7);

        return view('admin.partner.index', [
            'partners' => $partners
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $partner = Partner::create($this->validateData($request));
        $this->storeImage($partner);
        return redirect()->route('partner.show', ['partner' => $partner]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return view('admin.partner.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('admin.partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $partner->update($this->validateData($request));
        $this->storeImage($partner);
        return redirect()->route('partner.show', ['partner' => $partner]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(partner $partner)
    {
        $this->deleteExistingImage($partner);
        $partner->delete();
        return redirect()->route('partner.index')->with('deleted_successfully', __('messages.Deleted successfully'));
    }

    public function deleteExistingImage(partner $partner)
    {
        $deleted = false;
        if (!is_null($partner->image)) {
            unlink(storage_path("app/public/uploads/partner/large/"  . $partner->image));
            unlink(storage_path("app/public/uploads/partner/medium/" . $partner->image));
            unlink(storage_path("app/public/uploads/partner/small/"  . $partner->image));
            $deleted = true;
        }
        return response()->json(['deleted' => $deleted]);
    }

    private function storeImage($partner)
    {
        $today = now()->format('d.m.Y');
        if (request()->hasFile('image')) {

            $this->deleteExistingImage($partner);
            $image = request()->file('image');
            $file_name = $image->getClientOriginalName() . '.' . time() . '.' . $image->extension();
        
            $img = Image::make($image->path());

            $path_large = storage_path() . '/app/public/uploads/partner/large/' . $today;
            File::makeDirectory($path_large, $mode = 0777, true, true);

            $path_medium = storage_path() . '/app/public/uploads/partner/medium/' . $today;
            File::makeDirectory($path_medium, $mode = 0777, true, true);

            $path_small = storage_path() . '/app/public/uploads/partner/small/' . $today;
            File::makeDirectory($path_small, $mode = 0777, true, true);

            $img->resize(340, 178, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/partner/large') . '/' . $today . '/' . $file_name);

            $img->resize(170, 89, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/partner/medium') . '/' . $today . '/' . $file_name);

            $img->resize(85, 45, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/uploads/partner/small') . '/' . $today . '/' . $file_name);

            $partner->update([
                'image' => $today . '/' . $file_name
            ]);
        }
    }

    private function validateData()
    {
        return tap(request()->validate([
            'name'              => 'required',
            'opinion'           => 'nullable',
            'status'            => 'required',
            'slug'              => 'required',
            'official_site'     => 'nullable'
        ]), function() {
            if (request()->hasFile('image')) {
                request()->validate([
                    'image' => 'file|image|max:10000'
                ]);
            }
        });
    }
}
