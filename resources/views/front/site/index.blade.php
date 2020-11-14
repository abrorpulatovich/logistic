@extends('layouts.app')

@section('title', __('messages.Home'))

@php
    use App\Http\Controllers\Controller;
    $settings = Controller::settings();
@endphp

@section('content')
<!--Slider Start-->
@include('layouts.includes.slider')
<!--Slider End-->

@if($about_us)
    <!--About us start-->
    <section class="compAboutSecAbPage">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 aboutConWrap noPaddingRight">
                    <div class="commonSectionTitleIn">
                        <h2>{{ $about_us->title_by_lang() }}</h2>
                    </div>
                    <div class="abCont">
                        <div class="peragroup">
                            {!! $about_us->short_desc_by_lang() !!}
                            <br>
                            <a href="/o-nas" class="pifourBtn">{{ __('messages.View details') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="abgroupImg">
                        <div class="compaabImg">
                            <img src="/storage/uploads/page/large/{{ $about_us->image }}" alt="{{ $about_us->title_by_lang() }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About us End-->
@endif

<!--our services start-->
<section class="serviceSec1 bggray">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 noPadding text-center">
                <div class="commonSectionTitle">
                    <h2>{{ __('messages.Services') }}</h2>
                    <p>
                        {{ $settings->definition }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row" id="sercarosel">
            @foreach($services as $service)
                <div class="col-lg-12 text-center">
                    <div class="singleSer">
                        <img alt="" src="/storage/uploads/post/small/{{ $service->image }}" class="img img-bordered" style="height: 160px;">
                        <br>
                        <h2><a href="/{{ $service->slug }}">{{ $service->title_by_lang() }}</a></h2>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--our services End-->

<!--news start-->
<section class="blogSection">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="news3Title">{{ __('messages.News') }}</h2>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            @forelse($news as $new)
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="single3news">
                        <div class="news3Img">
                            <img alt="" src="/storage/uploads/post/medium/{{ $new->image }}" style="height: 300px;">
                        </div>
                        <h2 class="news3Title"><a href="/{{ $new->slug }}">{{ $new->title_by_lang() }}</a></h2>
                        <div class="news3meta">
                            <i class="fa fa-calendar"></i> {{ date('d.m.Y', strtotime($new->publish_date)) }}  <i class="fa fa-eye"></i> {{ $new->view_count }}
                        </div>
                        <div class="news3Dec">
                            {!! $new->short_desc_by_lang() !!}
                        </div>
                        <a class="news3moreBtn fmlato" href="/{{ $new->slug }}">{{ __('messages.View details') }}...</a>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center">{{ __('messages.No data') }}</div>
            @endforelse
        </div>
    </div>
</section>
<!--news End-->
@include('layouts.includes.partners')
@endsection
