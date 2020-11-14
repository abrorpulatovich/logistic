@extends('admin.layouts.base')

@section('title', __('messages.Pages'))

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ __('messages.Pages') }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home_page') }}"><i class="fa fa-dashboard"></i> {{ __('messages.Main') }}</a></li>
        <li class="active"><i class="fa fa-list"></i> {{ __('messages.Pages') }}</li>
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
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            <div class="box-body">
              <p><a href="{{ route('page.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a></p>
              @if(session()->has('deleted_successfully'))
              <p class="alert alert-success">{{ session()->get('deleted_successfully') }}</p>
              @endif
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th><b>№</b></th>
                    <th></th>
                    <th><b>{{ __('messages.Title') }}</b></th>
                    <th><b>{{ __('messages.Slug') }}</b></th>
                    <th><b>{{ __('messages.Status') }}</b></th>
                    <th></th>
                  </tr>
                  <form method="GET" id="filter_form">
                    <tr>
                      <td></td>
                      <td></td>
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
                  @forelse($pages as $page)
                    <tr>
                      <td>{{ ++$loop->index }}</td>
                      <td>
                          @if($page->image)
                              <img src="/storage/uploads/page/small/{{ $page->image }}" width="150" alt="{{ $page->title_by_lang() }}">
                          @else
                              <span class="text-danger">{{ __('messages.No data') }}</span>
                          @endif
                      </td>
                      <td>{{ $page->title_by_lang() }}</td>
                      <td>{{ $page->slug }}</td>
                      <td>{{ $page->get_status()[$page->status] }}</td>
                      <td>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="btn-group">
                              <a href="{{ route('page.show', ['page' => $page]) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                              <a href="{{ route('page.edit', ['page' => $page]) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                            </div>
                          </div>
                          <!-- @if($page->slug != 'o-nas')
                          <div class="col-md-6">
                            <form action="{{ route('page.destroy', ['page' => $page]) }}" method="POST" id="delete-form" onsubmit="return confirm('Вы уверен? Вы действительно хотите удалить этот элемент?')">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button>
                            </form>
                          </div>
                          @endif -->
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
              {{ $pages->appends(request()->query())->links() }}
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
    $('#filter_status').on('change', function() {
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
