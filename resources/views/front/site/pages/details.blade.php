@extends('layouts.app')
@section('title', $page->title_by_lang())
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
                                <a href="#">{{ $page->title_by_lang() }}</a>
                            </h2>
                            @if($page->image)
                                <div class="sblogImg">
                                    <img src="/storage/uploads/page/large/{{ $page->image }}" alt="{{ $page->title_by_lang() }}">
                                </div>
                            @endif
                            <i class="fa fa-calendar"></i> {{ date('d.m.Y', strtotime($page->publish_date)) }}  <i class="fa fa-eye"></i> {{ $page->view_count }}
                            {!! $page->desc_by_lang() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.includes.partners')

<style type="text/css">
    .sblogDec p {
        color: black!important;
    }
    .blogDetailsDec {
        padding-bottom: 20px!important;
    }
</style>
<!--Blog details End-->
@endsection