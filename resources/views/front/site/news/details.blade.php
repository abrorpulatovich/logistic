@extends('layouts.app')
@section('title', $new->title_by_lang())
@section('content')

<!--Blog details start-->
<section class="blogDetailsDec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-7 col-xs-12">
                <div class="blogRightsidebar">
                    <div class="singleBlogDetails">
                        <div class="sblogDec">
                            <h2 class="blogTitle">
                                <a href="#">{{ $new->title_by_lang() }}</a>
                            </h2>
                            @if($new->image)
                                <div class="sblogImg">
                                    <img src="/storage/uploads/post/large/{{ $new->image }}" alt="{{ $new->title_by_lang() }}">
                                </div>
                            @endif
                            <div class="news3meta">
                                <i class="fa fa-calendar"></i> {{ date('d.m.Y', strtotime($new->publish_date)) }}  <i class="fa fa-eye"></i> {{ $new->view_count }}
                            </div>
                            {!! $new->desc_by_lang() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Blog details End-->

<!--news start-->
<section class="blogSection bggray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="news3Title">{{ __('messages.Other news') }}</h2>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            @forelse($other_news as $new)
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="single3news">
                        <div class="news3Img">
                            <img alt="" src="/storage/uploads/post/large/{{ $new->image }}">
                        </div>
                        <h2 class="news3Title"><a href="#">{{ $new->title_by_lang() }}</a></h2>
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

<style type="text/css">
    .sblogDec p {
        color: black!important;
    }
    .blogDetailsDec {
        padding-bottom: 20px!important;
    }
</style>
@endsection