@extends('layouts.app')
@section('title', __('messages.News'))
@section('content')

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
                            <img alt="" src="/storage/uploads/post/large/{{ $new->image }}" style="height: 300px;">
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

@endsection
