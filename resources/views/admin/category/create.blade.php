@extends('admin.layouts.base')

@section('title', __('messages.Add'))

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ __('messages.Categories') }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home_page') }}"><i class="fa fa-dashboard"></i> {{ __('messages.Main') }}</a></li>
        <li><a href="{{ route('category.index') }}"><i class="fa fa-list"></i> {{ __('messages.Categories') }}</a></li>
        <li class="active">{{ __('messages.Add') }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">{{ __('messages.Add') }}</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
              @include('admin.includes.errors')
              <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-3">
                    <label for="name_uz">{{ __('messages.Name uz') }}</label>
                    <input type="text" name="name_uz" class="form-control" id="name_uz" value="{{ old('name_uz') }}">
                  </div>
                  <div class="col-md-3">
                    <label for="name_ar">{{ __('messages.Name ar') }}</label>
                    <input type="text" name="name_ar" class="form-control" id="name_ar" value="{{ old('name_ar') }}">
                  </div>
                  <div class="col-md-3">
                    <label for="name_ko">{{ __('messages.Name ko') }}</label>
                    <input type="text" name="name_ko" class="form-control" id="name_ko" value="{{ old('name_ko') }}">
                  </div>
                  <div class="col-md-3">
                    <label for="name_en">{{ __('messages.Name en') }}</label>
                    <input type="text" name="name_en" class="form-control" id="name_en" value="{{ old('name_en') }}">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label for="name_ru">{{ __('messages.Name ru') }}</label>
                    <input type="text" name="name_ru" class="form-control" id="name_ru" value="{{ old('name_ru') }}">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label for="parent_id">{{ __('messages.Belogs to category') }}</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                      <option value="0">{{ __('messages.Not belongs to') }}</option>
                      @foreach($parent_categories as $key => $pc)
                        <option value="{{ $key }}" @if($key == old('parent_id')) selected @endif>{{ $pc }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="c_order">{{ __('messages.C Order') }}</label>
                    <input type="number" name="c_order" id="c_order" class="form-control" value="{{ old('c_order') }}">
                  </div>
                  <div class="col-md-3">
                    <label for="slug">{{ __('messages.Slug') }}</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug') }}">
                  </div>
                  <div class="col-md-3">
                    <label for="status">{{ __('messages.Status') }}</label> <br>
                    <select name="status" id="status" class="form-control">
                      <option value="">---</option>
                      <option value="2" @if(old('status') == 2) selected @endif>{{ __('messages.Active') }}</option>
                      <option value="1" @if(old('status') == 1 and old('status') != null) selected @endif>{{ __('messages.Inactive') }}</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label for="breadcrumb_bg_image">{{ __('messages.Category image') }}</label>
                    <input type="file" name="breadcrumb_bg_image" id="breadcrumb_bg_image" class="form-control">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{ __('messages.Save') }}</button>
                    <a href="{{ route('category.index') }}" class="btn btn-info"><i class="fa fa-arrow-left"></i> {{ __('messages.Return back') }}</a>
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

@section('custom_scripts')
<script type="text/javascript">

  $('#name_ru').on('blur', function() {
    $.ajax({
      type: 'GET',
      url: '/dashboard/generate_slug',
      data: {name_ru: $(this).val(), id: null, type: 'category'},
      success: function(data) {
        $('#slug').val(data.slug);
      }
    });
  });

</script>
@endsection
