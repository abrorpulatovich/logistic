@extends('admin.layouts.base')

@section('title', __('messages.Posts'))

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ __('messages.Posts') }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home_page') }}"><i class="fa fa-dashboard"></i> {{ __('messages.Main') }}</a></li>
        <li class="active"><i class="fa fa-list"></i> {{ __('messages.Posts') }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('messages.Posts') }}</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            <div class="box-body">
              <p><a href="{{ route('post.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a></p>
              @if(session()->has('deleted_successfully'))
              <p class="alert alert-success">{{ session()->get('deleted_successfully') }}</p>
              @endif
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th><b>№</b></th>
                    <th></th>
                    <th><b>{{ __('messages.Category') }}</b></th>
                    <th><b>{{ __('messages.Title') }}</b></th>
                    <th><b>{{ __('messages.Slug') }}</b></th>
                    <th><b>{{ __('messages.Status') }}</b></th>
                    <th></th>
                  </tr>
                  <form method="GET" id="filter_form">
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                          <select name="category_id" id="filter_category_id" class="form-control">
                            <option value="">---</option>
                            @foreach($categories as $key => $category)
                              <option value="{{ $key }}" @if($key == request()->get('category_id')) selected @endif>{{ $category }}</option>
                            @endforeach
                          </select>
                      </td>
                      <td><input type="text" name="title" id="filter_title" class="form-control" value="{{ request()->get('title') }}"></td>
                      <td><input type="text" name="slug" id="filter_slug" class="form-control" value="{{ request()->get('slug') }}"></td>
                      <td>
                      <select name="status" id="filter_status" class="form-control">
                        <option value="">---</option>
                        <option value="2" @if(request()->get('status') == 2) selected @endif>{{ __('messages.Active') }}</option>
                        <option value="1" @if(request()->get('status') == 1 and request()->get('status') != null) selected @endif>{{ __('messages.Inactive') }}</option>
                      </select>
                      </td>
                    </tr>
                    <input type="submit" class='hidden'>
                  </form>
                </thead>
                <tbody>
                  @forelse($posts as $post)
                    <tr>
                      <td>{{ ++$loop->index }}</td>
                        @if($post->image)
                          <td><img src="/storage/uploads/post/small/{{ $post->image }}" width="150" alt="{{ $post->title_by_lang() }}"></td>
                        @endif
                      <td>{{ $post->category->name_by_lang() }}</td>
                      <td>{{ $post->title_by_lang() }}</td>
                      <td>{{ $post->slug }}</td>
                      <td>{{ $post->get_status()[$post->status] }}</td>
                      <td>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="btn-group">
                              <a href="{{ route('post.show', ['post' => $post]) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                              <a href="{{ route('post.edit', ['post' => $post]) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                            </div>
                          </div>
                          <!-- <div class="col-md-6">
                            <form action="{{ route('post.destroy', ['post' => $post]) }}" method="POST" id="delete-form" onsubmit="return confirm('Вы уверен? Вы действительно хотите удалить этот элемент?')">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button>
                            </form>
                          </div> -->
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td align="center" colspan="6"><span class="text-danger">{{ __('messages.No data') }}</span></td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
              {{ $posts->appends(request()->query())->links() }}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            <br>
            <br>
            <br>
            <br>
            <br>
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
    $('#filter_status, #filter_category_id').on('change', function() {
        trig_form();
    });

    $('#filter_title, #filter_slug').on('blur', function() {
      trig_form();
    });

    function trig_form() {
        $('#filter_form').submit();
    }
</script>
@endsection
