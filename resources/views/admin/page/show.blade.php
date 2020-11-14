@extends('admin.layouts.base')

@section('title', $page->title_by_lang())

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $page->title_by_lang() }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{ route('home_page') }}"><i class="fa fa-dashboard"></i> {{ __('messages.Main') }}</a></li>
        <li><a href="{{ route('page.index') }}"><i class="fa fa-list"></i> {{ __('messages.Pages') }}</a></li>
        <li class="active">{{ $page->title_by_lang() }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $page->title_by_lang() }}</h3>
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
                        <a href="{{ route('page.index') }}" class="btn btn-primary"><i class="fa fa-list"></i></a>
                        <a href="{{ route('page.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                        <a href="{{ route('page.edit', ['page' => $page]) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('page.destroy', ['page' => $page]) }}" method="POST" id="delete-form" onsubmit="return confirm('Вы уверен? Вы действительно хотите удалить этот элемент?')">
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
                        <th><b>{{ __('messages.Title uz') }}</b></th>
                        <td>{{ $page->title_uz }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Title ar') }}</b></th>
                        <td>{{ $page->title_ar }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Title ko') }}</b></th>
                        <td>{{ $page->title_ko }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Title en') }}</b></th>
                        <td>{{ $page->title_en }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Title ru') }}</b></th>
                        <td>{{ $page->title_ru }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Short description uz') }}</b></th>
                        <td>{!! $page->short_desc_uz !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Short description ar') }}</b></th>
                        <td>{!! $page->short_desc_ar !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Short description ko') }}</b></th>
                        <td>{!! $page->short_desc_ko !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Short description en') }}</b></th>
                        <td>{!! $page->short_desc_en !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Short description ru') }}</b></th>
                        <td>{!! $page->short_desc_ru !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Description uz') }}</b></th>
                        <td>{!! $page->desc_uz !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Description ar') }}</b></th>
                        <td>{!! $page->desc_ar !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Description ko') }}</b></th>
                        <td>{!! $page->desc_ko !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Description en') }}</b></th>
                        <td>{!! $page->desc_en !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Description ru') }}</b></th>
                        <td>{!! $page->desc_ru !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Slug') }}</b></th>
                        <td>{{ $page->slug }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Status') }}</b></th>
                        <td>{{ $page->get_status()[$page->status] }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Publish date') }}</b></th>
                        <td>{{ $page->publish_date }}</td>
                    </tr>
                    @if($page->image)
                        <tr>
                            <th><b>{{ __('messages.Image') }}</b></th>
                            <td><img src="/storage/uploads/page/medium/{{ $page->image }}" width="800" alt="{{ $page->title_by_lang() }}"></td>
                        </tr>
                    @endif
                </tbody>
              </table>
              
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