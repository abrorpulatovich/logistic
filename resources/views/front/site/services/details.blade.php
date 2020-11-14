@extends('layouts.app')
@section('title', $service->title_by_lang())
@section('content')

@php
    use App\Http\Controllers\Controller;
    $settings = Controller::settings();
@endphp

<!--Blog details start-->
<section class="compAboutSecAbPage">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12 aboutConWrap noPaddingRight">
                <div class="commonSectionTitleIn">
                    <h2>{{ $service->title_by_lang() }}</h2>
                </div>
                <div class="abCont">
                    <div class="peragroup">
                        {!! $service->desc_by_lang() !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="abgroupImg">
                    <div class="compaabImg">
                        <img src="/storage/uploads/post/large/{{ $service->image }}" alt="{{ $service->title_by_lang() }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Blog details End-->

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
            @foreach($other_services as $service)
                <div class="col-lg-12 text-center">
                    <div class="singleSer">
                        <img alt="" src="/storage/uploads/post/small/{{ $service->image }}" class="img img-bordered" height="150">
                        <br>
                        <h2><a href="/{{ $service->slug }}">{{ $service->title_by_lang() }}</a></h2>
                        {!! $service->short_desc_by_lang() !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--our services End-->

<style type="text/css">
    .sblogDec p {
        color: black!important;
    }
    .blogDetailsDec {
        padding-bottom: 20px!important;
    }
</style>
@endsection