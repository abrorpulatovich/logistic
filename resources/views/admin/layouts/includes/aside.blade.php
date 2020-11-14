@php
$lang = LaravelLocalization::getCurrentLocale();
@endphp
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/themes/admin/img/user1.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->username }}</p>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="@if(request()->segment(3) == null) active @endif">
          <a href="{{ route('home_page') }}">
            <i class="fa fa-dashboard"></i> <span>{{ __('messages.Main') }}</span>
            <span class="pull-right-container">
              <i class="fa pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview @if(request()->segment(3) == 'category') active @endif">
          <a href="#">
            <i class="fa fa-list"></i> <span>{{ __('messages.Categories') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if(request()->segment(4) == 'create') active @endif"><a href="{{ route('category.create') }}"><i class="fa fa-plus"></i> {{ __('messages.Add') }}</a></li>
            <li class="@if(request()->segment(4) == '') active @endif"><a href="{{ route('category.index') }}"><i class="fa fa-list"></i> {{ __('messages.List') }}</a></li>
          </ul>
        </li>
        <li class="treeview @if(request()->segment(3) == 'slider') active @endif">
          <a href="#">
            <i class="fa fa-image"></i> <span>{{ __('messages.Sliders') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if(request()->segment(4) == 'create') active @endif"><a href="{{ route('slider.create') }}"><i class="fa fa-plus"></i> {{ __('messages.Add') }}</a></li>
            <li class="@if(request()->segment(4) == '') active @endif"><a href="{{ route('slider.index') }}"><i class="fa fa-list"></i> {{ __('messages.List') }}</a></li>
          </ul>
        </li>
        <li class="treeview @if(request()->segment(3) == 'page') active @endif">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>{{ __('messages.Pages') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if(request()->segment(4) == 'create') active @endif"><a href="{{ route('page.create') }}"><i class="fa fa-plus"></i> {{ __('messages.Add') }}</a></li>
            <li class="@if(request()->segment(4) == '') active @endif"><a href="{{ route('page.index') }}"><i class="fa fa-list"></i> {{ __('messages.List') }}</a></li>
          </ul>
        </li>
        <li class="treeview @if(request()->segment(3) == 'post') active @endif">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>{{ __('messages.Posts') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if(request()->segment(4) == 'create') active @endif"><a href="{{ route('post.create') }}"><i class="fa fa-plus"></i> {{ __('messages.Add') }}</a></li>
            <li class="@if(request()->segment(4) == '') active @endif"><a href="{{ route('post.index') }}"><i class="fa fa-list"></i> {{ __('messages.List') }}</a></li>
          </ul>
        </li>
        <li class="treeview @if(request()->segment(3) == 'partner') active @endif">
          <a href="#">
            <i class="fa fa-users"></i> <span>{{ __('messages.Partners') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if(request()->segment(4) == 'create') active @endif"><a href="{{ route('partner.create') }}"><i class="fa fa-plus"></i> {{ __('messages.Add') }}</a></li>
            <li class="@if(request()->segment(4) == '') active @endif"><a href="{{ route('partner.index') }}"><i class="fa fa-list"></i> {{ __('messages.List') }}</a></li>
          </ul>
        </li>
        <li class="treeview @if(request()->segment(3) == 'setting') active @endif">
          <a href="#">
            <i class="fa fa-gears"></i> <span>{{ __('messages.Site settings') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if(request()->segment(4) == 'edit') active @endif"><a href="{{ route('setting.edit', ['setting' => 1]) }}"><i class="fa fa-pencil"></i> {{ __('messages.Edit') }}</a></li>
            <li class="@if(request()->segment(4) == 'show') active @endif"><a href="{{ route('setting.show', ['setting' => 1]) }}"><i class="fa fa-list"></i> {{ __('messages.Details') }}</a></li>
          </ul>
        </li>
        <li class="header">{{ __('messages.Changing language') }}</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-flag"></i> <span>{{ LaravelLocalization::getSupportedLocales()[App::getLocale()]['native'] }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="menu-item @if($localeCode == $lang) hidden @endif">
                  <a class="item-link" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                      {{ $properties['native'] }}
                  </a>
                </li>
            @endforeach
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>