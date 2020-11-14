@extends('admin.layouts.base')

@section('title', __('messages.Change password'))

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ __('messages.Change password') }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home_page') }}"><i class="fa fa-dashboard"></i> {{ __('messages.Main') }}</a></li>
        <li class="active"><i class="fa fa-list"></i> {{ __('messages.Change password') }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            <div class="box-body">
              @include('admin.includes.errors')
              <form action="{{ route('change_pass') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="password">{{ __('messages.New password') }}</label>
                      <input type="password" id="password" class="form-control" name="password">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="password_confirmation">{{ __('messages.Confirm password') }}</label>
                      <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">{{ __('messages.Save') }}</button>
                  </div>
                </div>
              </form>
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
    $('#new_pwd').on('change', function() {
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
