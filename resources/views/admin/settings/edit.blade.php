@extends('admin.layouts.base')

@section('title', __('messages.Edit') . ' ' . $setting->site_name)

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ __('messages.Site settings') }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home_page') }}"><i class="fa fa-dashboard"></i> {{ __('messages.Main') }}</a></li>
        <li><a href="{{ route('setting.index') }}"><i class="fa fa-list"></i> {{ __('messages.Site settings') }}</a></li>
        <li class="active">{{ __('messages.Edit') . ' ' . $setting->site_name }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">{{ __('messages.Edit') . ' ' . $setting->site_name }}</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
              @include('admin.includes.errors')
              <form action="{{ route('setting.update', ['setting' => $setting]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                  <div class="col-md-3">
                    <label for="site_name">{{ __('messages.Site name') }}</label>
                    <input type="text" name="site_name" class="form-control" id="site_name" value="{{ $setting->site_name }}">
                  </div>
                  <div class="col-md-3">
                    <label for="site_name">{{ __('messages.Site company name') }}</label>
                    <input type="text" name="site_company_name" class="form-control" id="site_name" value="{{ $setting->site_name }}">
                  </div>
                  <div class="col-md-3">
                    <label for="site_company_keywords">{{ __('messages.Site keywords') }}</label>
                    <input type="text" name="site_company_keywords" class="form-control" id="site_name" value="{{ $setting->site_company_keywords }}">
                  </div>
                  <div class="col-md-3">
                    <label for="site_desc">{{ __('messages.Site desc') }}</label>
                    <input type="text" name="site_desc" class="form-control" id="site_desc" value="{{ $setting->site_desc }}">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label for="site_company_definition_uz">{{ __('messages.Description uz') }}</label>
                    <input type="text" name="site_company_definition_uz" class="form-control" id="site_company_definition_uz" value="{{ $setting->site_company_definition_uz }}">
                  </div>
                  <div class="col-md-3">
                    <label for="site_company_definition_ar">{{ __('messages.Description ar') }}</label>
                    <input type="text" name="site_company_definition_ar" class="form-control" id="site_company_definition_ar" value="{{ $setting->site_company_definition_ar }}">
                  </div>
                  <div class="col-md-3">
                    <label for="site_company_definition_ko">{{ __('messages.Description ko') }}</label>
                    <input type="text" name="site_company_definition_ko" class="form-control" id="site_company_definition_ko" value="{{ $setting->site_company_definition_ko }}">
                  </div>
                  <div class="col-md-3">
                    <label for="site_company_definition_en">{{ __('messages.Description en') }}</label>
                    <input type="text" name="site_company_definition_en" class="form-control" id="site_company_definition_en" value="{{ $setting->site_company_definition_en }}">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label for="site_company_definition_ru">{{ __('messages.Description ru') }}</label>
                    <input type="text" name="site_company_definition_ru" class="form-control" id="site_company_definition_ru" value="{{ $setting->site_company_definition_ru }}">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label for="site_phone">{{ __('messages.Site phone') }}</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" class="form-control" name="site_phone" id="site_phone" data-inputmask="&quot;mask&quot;: &quot;(99) 999-99-99&quot;" data-mask="" value="{{ $setting->site_phone }}">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="site_phone1">{{ __('messages.Site phone1') }}</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" class="form-control" name="site_phone1" id="site_phone1" data-inputmask="&quot;mask&quot;: &quot;(99) 999-99-99&quot;" data-mask="" value="{{ $setting->site_phone1 }}">
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label for="address_uz">{{ __('messages.Address uz') }}</label>
                    <input type="text" name="address_uz" class="form-control" id="address_uz" value="{{ $setting->address_uz }}">
                  </div>
                  <div class="col-md-3">
                    <label for="address_ar">{{ __('messages.Address ar') }}</label>
                    <input type="text" name="address_ar" class="form-control" id="address_ar" value="{{ $setting->address_ar }}">
                  </div>
                  <div class="col-md-3">
                    <label for="address_en">{{ __('messages.Address en') }}</label>
                    <input type="text" name="address_en" class="form-control" id="address_en" value="{{ $setting->address_en }}">
                  </div>
                  <div class="col-md-3">
                    <label for="address_ru">{{ __('messages.Address ru') }}</label>
                    <input type="text" name="address_ru" class="form-control" id="address_ru" value="{{ $setting->address_ru }}">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label for="address_ko">{{ __('messages.Address ko') }}</label>
                    <input type="text" name="address_ko" class="form-control" id="address_ko" value="{{ $setting->address_ko }}">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label for="site_email">{{ __('messages.Site email') }}</label>
                    <input type="text" name="site_email" class="form-control" id="site_email" value="{{ $setting->site_email }}">
                  </div>
                  <div class="col-md-3">
                    <label for="site_twitter_address">{{ __('messages.Site twitter address') }}</label>
                    <input type="text" name="site_twitter_address" class="form-control" id="site_twitter_address" value="{{ $setting->site_twitter_address }}">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label for="site_facebook_address">{{ __('messages.Site facebook address') }}</label>
                    <input type="text" name="site_facebook_address" class="form-control" id="site_facebook_address" value="{{ $setting->site_facebook_address }}">
                  </div>
                  <div class="col-md-3">
                    <label for="site_gmail_address">{{ __('messages.Site instagram address') }}</label>
                    <input type="text" name="site_gmail_address" class="form-control" id="site_gmail_address" value="{{ $setting->site_gmail_address }}">
                  </div>
                  <div class="col-md-3">
                    <label for="site_likedln_address">{{ __('messages.Site likedln address') }}</label>
                    <input type="text" name="site_likedln_address" class="form-control" id="site_likedln_address" value="{{ $setting->site_likedln_address }}">
                  </div>
                  <div class="col-md-3">
                    <label for="site_pinterest_address">{{ __('messages.Site pinterest address') }}</label>
                    <input type="text" name="site_pinterest_address" class="form-control" id="site_pinterest_address" value="{{ $setting->site_pinterest_address }}">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label for="site_telegram_bot">{{ __('messages.Site telegram bot') }}</label>
                    <input type="text" name="site_telegram_bot" class="form-control" id="site_telegram_bot" value="{{ $setting->site_telegram_bot }}">
                  </div>
                  <div class="col-md-3">
                    <label for="site_telegram_profile">{{ __('messages.Site telegram profile') }}</label>
                    <input type="text" name="site_telegram_profile" class="form-control" id="site_telegram_profile" value="{{ $setting->site_telegram_profile }}">
                  </div>
                  <div class="col-md-3">
                    <label for="site_telegram_channel">{{ __('messages.Site telegram channel') }}</label>
                    <input type="text" name="site_telegram_channel" class="form-control" id="site_telegram_channel" value="{{ $setting->site_telegram_channel }}">
                  </div>
                  <div class="col-md-3">
                    <label for="site_created">{{ __('messages.Site created') }}</label>
                    <input type="text" name="site_created" class="form-control" id="site_created" value="{{ $setting->site_created }}">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label for="working_hours">{{ __('messages.Working Hours') }}</label>
                    <input type="text" name="working_hours" class="form-control" id="working_hours" value="{{ $setting->working_hours }}">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <label for="site_map_address">{{ __('messages.Site map address') }}</label>
                    <textarea name="site_map_address" id="site_map_address" cols="30" rows="10">{{ $setting->site_map_address }}</textarea>
                  </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{ __('messages.Save') }}</button>
              </form>
            </div>
            <br>
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
<script src="/ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'site_map_address', {
    filebrowserUploadUrl: "{{route('ckeditor_image_upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form',
    allowedContent: true,
    toolbar: [
      { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', '-' ] },
      { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
      { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ], items: [ '-', '-', 'Scayt' ] },
      { name: 'forms', groups: [ 'forms' ], items: [ '' ] },
      { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'Language' ] },
      { name: 'links', groups: [ 'links' ], items: [ 'Link', 'Unlink', 'Anchor' ] },
      { name: 'insert', groups: [ 'insert' ], items: [ 'Image', 'Table', 'SpecialChar' ] },
      { name: 'styles', groups: [ 'styles' ], items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
      { name: 'colors', groups: [ 'colors' ], items: [ 'TextColor', 'BGColor' ] },
      { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-' ] },
      { name: 'tools', groups: [ 'tools' ], items: [ 'Maximize' ] },
      { name: 'others', groups: [ 'others' ], items: [ '-' ] },
      { name: 'about', groups: [ 'about' ], items: [ 'About' ] }
    ],
    toolbarGroups: [
      { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
      { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
      { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
      { name: 'forms', groups: [ 'forms' ] },
      { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
      { name: 'links', groups: [ 'links' ] },
      { name: 'insert', groups: [ 'insert' ] },
      { name: 'styles', groups: [ 'styles' ] },
      { name: 'colors', groups: [ 'colors' ] },
      { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
      { name: 'tools', groups: [ 'tools' ] },
      { name: 'others', groups: [ 'others' ] },
      { name: 'about', groups: [ 'about' ] }
    ]
});

</script>
@endsection