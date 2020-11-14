@extends('admin.layouts.base')

@section('title', $category->name_by_lang())

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $category->name_by_lang() }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{ route('home_page') }}"><i class="fa fa-dashboard"></i> {{ __('messages.Main') }}</a></li>
        <li><a href="{{ route('category.index') }}"><i class="fa fa-list"></i> {{ __('messages.Categories') }}</a></li>
        <li class="active">{{ $category->name_by_lang() }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $category->name_by_lang() }}</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            <div class="box-body">

            <div class="row">
                <div class="col-md-2">
                    <div class="btn-group">
                        <a href="{{ route('category.index') }}" class="btn btn-primary"><i class="fa fa-list"></i></a>
                        <a href="{{ route('category.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                        <a href="{{ route('category.edit', ['category' => $category]) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('category.destroy', ['category' => $category]) }}" method="POST" id="delete-form" onsubmit="return confirm('Вы уверен? Вы действительно хотите удалить этот элемент?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-remove"></i></button>
                    </form>
                </div>
            </div>
            <br>
              <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th><b>{{ __('messages.Name uz') }}</b></th>
                        <td>{{ $category->name_uz }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Name ar') }}</b></th>
                        <td>{{ $category->name_ar }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Name ko') }}</b></th>
                        <td>{{ $category->name_ko }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Name en') }}</b></th>
                        <td>{{ $category->name_en }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Name ru') }}</b></th>
                        <td>{{ $category->name_ru }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Slug uz') }}</b></th>
                        <td>{{ $category->slug }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.C Order') }}</b></th>
                        <td>{{ $category->c_order }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Status') }}</b></th>
                        <td>{{ $category->get_status()[$category->status] }}</td>
                    </tr>
                    @if($category->breadcrumb_bg_image)
                        <tr>
                            <th><b>{{ __('messages.Category image') }}</b></th>
                            <td><img src="/storage/uploads/category/medium/{{ $category->breadcrumb_bg_image }}" width="800" alt="{{ $category->name_by_lang() }}"></td>
                        </tr>
                    @endif
                </tbody>
              </table>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection