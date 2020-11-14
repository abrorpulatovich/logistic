@extends('admin.layouts.base')
@section('title', $partner->name)
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $partner->name }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{ route('home_page') }}"><i class="fa fa-dashboard"></i> {{ __('messages.Main') }}</a></li>
        <li><a href="{{ route('partner.index') }}"><i class="fa fa-list"></i> {{ __('messages.Partners') }}</a></li>
        <li class="active">{{ $partner->name }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $partner->name }}</h3>
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
                        <a href="{{ route('partner.index') }}" class="btn btn-primary"><i class="fa fa-list"></i></a>
                        <a href="{{ route('partner.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                        <a href="{{ route('partner.edit', ['partner' => $partner]) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('partner.destroy', ['partner' => $partner]) }}" method="POST" id="delete-form" onsubmit="return confirm('Вы уверен? Вы действительно хотите удалить этот элемент?')">
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
                        <th><b>{{ __('messages.Name') }}</b></th>
                        <td>{{ $partner->name }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Opinion') }}</b></th>
                        <td>{!! $partner->opinion !!}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Official site') }}</b></th>
                        <td><a href="{{ $partner->official_site }}" target="_blank">{{ $partner->official_site }}</a></td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Slug') }}</b></th>
                        <td>{{ $partner->slug }}</td>
                    </tr>
                    <tr>
                        <th><b>{{ __('messages.Status') }}</b></th>
                        <td>{{ $partner->get_status()[$partner->status] }}</td>
                    </tr>
                    @if($partner->image)
                        <tr>
                            <th><b>{{ __('messages.Image') }}</b></th>
                            <td><img src="/storage/uploads/partner/medium/{{ $partner->image }}" alt="{{ $partner->name }}"></td>
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