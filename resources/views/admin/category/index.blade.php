@extends('admin.layouts.base')

@section('title', __('messages.Categories'))

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
        <li class="active"><i class="fa fa-list"></i> {{ __('messages.Categories') }}</li>
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
              <p><a href="{{ route('category.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a></p>
              @if(session()->has('deleted_successfully'))
              <p class="alert alert-success">{{ session()->get('deleted_successfully') }}</p>
              @endif
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th><b>№</b></th>
                    <th><b>{{ __('messages.Belogs to category') }}</b></th>
                    <th><b>{{ __('messages.Name') }}</b></th>
                    <th><b>{{ __('messages.Slug') }}</b></th>
                    <th><b>{{ __('messages.Status') }}</b></th>
                    <th></th>
                  </tr>
                  <form method="GET" id="filter_form">
                    <tr>
                      <td></td>
                      <td>
                        <select name="parent_id" id="filter_parent_id" class="form-control">
                          <option value="">---</option>
                          @foreach($parent_categories as $key => $pc)
                            <option value="{{ $key }}" @if(request()->get('parent_id') == $key) selected @endif>{{ $pc }}</option>
                          @endforeach
                        </select>
                      </td>
                      <td><input type="text" name="name" id="filter_name" class="form-control" value="{{ request()->get('name') }}"></td>
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
                  @forelse($categories as $category)
                    <tr>
                      <td>{{ ++$loop->index }}</td>
                      <td>{{ ($category->parent_id)? $parent_categories[$category->parent_id]: __('messages.Not belongs to') }}</td>
                      <td>{{ $category->name_by_lang() }}</td>
                      <td>{{ $category->slug }}</td>
                      <td>{{ $category->get_status()[$category->status] }}</td>
                      <td>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="btn-group">
                              <a href="{{ route('category.show', ['category' => $category]) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                              <a href="{{ route('category.edit', ['category' => $category]) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <!-- <form action="{{ route('category.destroy', ['category' => $category]) }}" method="POST" id="delete-form" onsubmit="return confirm('Вы уверен? Вы действительно хотите удалить этот элемент?')">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button>
                            </form> -->
                          </div>
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
              {{ $categories->appends(request()->query())->links() }}
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

@section('custom_scripts')
<script type="text/javascript">

  $('#filter_parent_id, #filter_status').on('change', function() {
    trig_form();
  });

  $('#filter_name, #filter_slug').on('blur', function() {
    trig_form();
  });

  function trig_form() {
    $('#filter_form').submit();
  }

</script>
@endsection