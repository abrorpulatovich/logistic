@extends('admin.layouts.base')

@section('title', $post->title_by_lang())

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $post->title_by_lang() }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{ route('home_page') }}"><i class="fa fa-dashboard"></i> {{ __('messages.Main') }}</a></li>
        <li><a href="{{ route('post.index') }}"><i class="fa fa-list"></i> {{ __('messages.Posts') }}</a></li>
        <li class="active">{{ $post->title_by_lang() }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $post->title_by_lang() }}</h3>
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
                        <a href="{{ route('post.index') }}" class="btn btn-primary"><i class="fa fa-list"></i></a>
                        <a href="{{ route('post.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                        <a href="{{ route('post.edit', ['post' => $post]) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('post.destroy', ['post' => $post]) }}" method="POST" id="delete-form" onsubmit="return confirm('Вы уверен? Вы действительно хотите удалить этот элемент?')">
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
                        <th><b>{{ __('messages.Category') }}</b></th>
                        <td>{{ $post->category->name_by_lang() }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Title uz') }}</b></th>
                        <td>{{ $post->title_uz }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Title ar') }}</b></th>
                        <td>{{ $post->title_ar }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Title ko') }}</b></th>
                        <td>{{ $post->title_ko }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Title en') }}</b></th>
                        <td>{{ $post->title_en }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Title ru') }}</b></th>
                        <td>{{ $post->title_ru }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Short description uz') }}</b></th>
                        <td>{!! $post->short_desc_uz !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Short description ar') }}</b></th>
                        <td>{!! $post->short_desc_ar !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Short description ko') }}</b></th>
                        <td>{!! $post->short_desc_ko !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Short description en') }}</b></th>
                        <td>{!! $post->short_desc_en !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Short description ru') }}</b></th>
                        <td>{!! $post->short_desc_ru !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Description uz') }}</b></th>
                        <td>{!! $post->desc_uz !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Description ar') }}</b></th>
                        <td>{!! $post->desc_ar !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Description ko') }}</b></th>
                        <td>{!! $post->desc_ko !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Description en') }}</b></th>
                        <td>{!! $post->desc_en !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Description ru') }}</b></th>
                        <td>{!! $post->desc_ru !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Slug') }}</b></th>
                        <td>{{ $post->slug }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Status') }}</b></th>
                        <td>{{ $post->get_status()[$post->status] }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Publish date') }}</b></th>
                        <td>{{ $post->publish_date }}</td>
                    </tr>
                    @if($post->image)
                        <tr>
                            <th><b>{{ __('messages.Image') }}</b></th>
                            <td><img src="/storage/uploads/post/medium/{{ $post->image }}" width="800" alt="{{ $post->title_by_lang() }}"></td>
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