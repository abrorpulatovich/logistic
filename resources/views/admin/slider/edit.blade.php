@extends('admin.layouts.base')

@section('title', __('messages.Edit') . ' ' . $slider->title_by_lang())

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ __('messages.Sliders') }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home_page') }}"><i class="fa fa-dashboard"></i> {{ __('messages.Main') }}</a></li>
        <li><a href="{{ route('page.index') }}"><i class="fa fa-list"></i> {{ __('messages.Sliders') }}</a></li>
        <li class="active">{{ __('messages.Edit') }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">{{ __('messages.Edit') . ' ' . $slider->title_by_lang() }}</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
              @include('admin.includes.errors')
              <form action="{{ route('slider.update', ['slider' => $slider]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                  <div class="col-md-6">
                    <label for="title_uz">{{ __('messages.Title uz') }}</label>
                    <input type="text" name="title_uz" class="form-control" id="title_uz" value="{{ $slider->title_uz }}">
                  </div>
                  <div class="col-md-6">
                    <label for="title_ar">{{ __('messages.Title ar') }}</label>
                    <input type="text" name="title_ar" class="form-control" id="title_ar" value="{{ $slider->title_ar }}">
                  </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="title_en">{{ __('messages.Title en') }}</label>
                        <input type="text" name="title_en" class="form-control" id="title_en" value="{{ $slider->title_en }}">
                    </div>
                    <div class="col-md-6">
                        <label for="title_ru">{{ __('messages.Title ru') }}</label>
                        <input type="text" name="title_ru" class="form-control" id="title_ru" value="{{ $slider->title_ru }}">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="title_ko">{{ __('messages.Title ko') }}</label>
                        <input type="text" name="title_ko" class="form-control" id="title_ko" value="{{ $slider->title_ko }}">
                    </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <label for="short_desc_uz">{{ __('messages.Short description uz') }}</label>
                    <textarea name="short_desc_uz" id="short_desc_uz" cols="30" rows="10">{{ $slider->short_desc_uz }}</textarea>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <label for="short_desc_ar">{{ __('messages.Short description ar') }}</label>
                    <textarea name="short_desc_ar" id="short_desc_ar" cols="30" rows="10">{{ $slider->short_desc_ar }}</textarea>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <label for="short_desc_en">{{ __('messages.Short description en') }}</label>
                    <textarea name="short_desc_en" id="short_desc_en" cols="30" rows="10">{{ $slider->short_desc_en }}</textarea>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <label for="short_desc_ru">{{ __('messages.Short description ru') }}</label>
                    <textarea name="short_desc_ru" id="short_desc_ru" cols="30" rows="10">{{ $slider->short_desc_ru }}</textarea>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <label for="short_desc_ko">{{ __('messages.Short description ko') }}</label>
                    <textarea name="short_desc_ko" id="short_desc_ko" cols="30" rows="10">{{ $slider->short_desc_ko }}</textarea>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label for="slug">{{ __('messages.Slug') }}</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="{{ $slider->slug }}">
                  </div>
                  <div class="col-md-3">
                    <label for="status">{{ __('messages.Status') }}</label> <br>
                    <select name="status" id="status" class="form-control">
                      <option value="">---</option>
                      <option value="2" @if($slider->status == 2) selected @endif>{{ __('messages.Active') }}</option>
                      <option value="1" @if($slider->status == 1 and $slider->status != null) selected @endif>{{ __('messages.Inactive') }}</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label for="image">{{ __('messages.Image') }}</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if($slider->image)
                        <div id="img_box">
                            <button id="remove_image_btn" style="margin-left: -10px;" class="btn btn-link"><span class="text-danger">{{ __('messages.Remove image') }}</span></button> <br>
                            <img src="/storage/uploads/slider/medium/{{ $slider->image }}" width="100" alt="{{ $slider->title_by_lang() }}">
                        </div>
                    @endif
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{ __('messages.Save') }}</button>
                    <a href="{{ route('slider.index') }}" class="btn btn-info"><i class="fa fa-arrow-left"></i> {{ __('messages.Return back') }}</a>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <br>
          <br>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
@section('custom_scripts')
<script type="text/javascript">
let short_desc_columns = ['short_desc_uz', 'short_desc_ar', 'short_desc_en', 'short_desc_ru', 'short_desc_ko'];

for(let i = 0; i < short_desc_columns.length; i++) {
    CKEDITOR.replace( short_desc_columns[i], {
        filebrowserUploadUrl: "{{route('ckeditor_image_upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        allowedContent: true,
        toolbar: [
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', '-' ] },
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ], items: [ '-', '-', 'Scayt' ] },
            { name: 'forms', groups: [ 'forms' ], items: [ '' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'Language' ] },
            { name: 'links', groups: [ 'links' ], items: [ 'Link', 'Unlink', 'Anchor' ] },
            { name: 'styles', groups: [ 'styles' ], items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
            { name: 'colors', groups: [ 'colors' ], items: [ 'TextColor', 'BGColor' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-' ] },
            { name: 'tools', groups: [ 'tools' ], items: [ 'Maximize' ] }
        ],
        toolbarGroups: [
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
            { name: 'forms', groups: [ 'forms' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { name: 'links', groups: [ 'links' ] },
            { name: 'insert', groups: [ 'insert' ] },
            { name: 'styles', groups: [ 'styles' ] },
            { name: 'colors', groups: [ 'colors' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'tools', groups: [ 'tools' ] },
            { name: 'others', groups: [ 'others' ] },
            { name: 'about', groups: [ 'about' ] }
        ]
    });
}
$('#title_ru').on('blur', function() {
    $.ajax({
    type: 'GET',
    url: '/dashboard/generate_slug',
    data: {title_ru: $(this).val(), id: {{ $slider->id }}, type: 'slider'},
    success: function(data) {
        $('#slug').val(data.slug);
    }
    });
});

$('#remove_image_btn').click(function(e) {
    e.preventDefault();
    $.ajax({
        type: 'GET',
        url: '/dashboard/remove_form_image',
        data: { slug: '{{ $slider->slug }}', type: 'slider' },
        success: function(data) {
            $('#img_box').addClass('hidden');
        }
    });
});
</script>
@endsection
