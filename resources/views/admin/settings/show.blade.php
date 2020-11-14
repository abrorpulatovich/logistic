@extends('admin.layouts.base')
@section('title', $setting->site_name)

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $setting->site_name }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{ route('home_page') }}"><i class="fa fa-dashboard"></i> {{ __('messages.Main') }}</a></li>
        <li><a href="{{ route('setting.index') }}"><i class="fa fa-list"></i> {{ __('messages.Site settings') }}</a></li>
        <li class="active">{{ $setting->site_name }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('messages.Edit') }}</h3>
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
                        <a href="{{ route('setting.edit', ['setting' => $setting]) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                    </div>
                </div>
            </div>
            <br>
            <table class="table table-bordered table-striped">
              <tbody>
                <tr>
                  <th><b>{{ __('messages.Site name') }}</b></th>
                  <th>{{ $setting->site_name }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site company name') }}</b></th>
                  <th>{{ $setting->site_company_name }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site keywords') }}</b></th>
                  <th>{{ $setting->site_keywords }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site desc') }}</b></th>
                  <th>{{ $setting->site_desc }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Description uz') }}</b></th>
                  <th>{{ $setting->site_company_definition_uz }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Description ar') }}</b></th>
                  <th>{{ $setting->site_company_definition_ar }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Description ko') }}</b></th>
                  <th>{{ $setting->site_company_definition_ko }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Description en') }}</b></th>
                  <th>{{ $setting->site_company_definition_en }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Description ru') }}</b></th>
                  <th>{{ $setting->site_company_definition_ru }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site phone') }}</b></th>
                  <th>{{ $setting->site_phone }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site phone1') }}</b></th>
                  <th>{{ $setting->site_phone1 }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Address uz') }}</b></th>
                  <th>{{ $setting->address_uz }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Address ar') }}</b></th>
                  <th>{{ $setting->address_ar }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Address en') }}</b></th>
                  <th>{{ $setting->address_en }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Address ru') }}</b></th>
                  <th>{{ $setting->address_ru }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Address ko') }}</b></th>
                  <th>{{ $setting->address_ko }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site email') }}</b></th>
                  <th>{{ $setting->site_email }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site twitter address') }}</b></th>
                  <th>{{ $setting->site_twitter_address }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site facebook address') }}</b></th>
                  <th>{{ $setting->site_facebook_address }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site instagram address') }}</b></th>
                  <th>{{ $setting->site_gmail_address }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site likedin address') }}</b></th>
                  <th>{{ $setting->site_likedin_address }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site pinterest address') }}</b></th>
                  <th>{{ $setting->site_pinterest_address }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site telegram bot') }}</b></th>
                  <th>{{ $setting->site_telegram_bot }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site telegram profile') }}</b></th>
                  <th>{{ $setting->site_telegram_profile }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site telegram channel') }}</b></th>
                  <th>{{ $setting->site_telegram_channel }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site created') }}</b></th>
                  <th>{{ $setting->site_created }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Working Hours') }}</b></th>
                  <th>{{ $setting->working_hours }}</th>
                </tr>
                <tr>
                  <th><b>{{ __('messages.Site map address') }}</b></th>
                  <th>{!! $setting->site_map_address !!}</th>
                </tr>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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