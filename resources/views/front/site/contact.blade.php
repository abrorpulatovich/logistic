@extends('layouts.app')
@section('title', __('messages.Contact us'))
@section('content')

@php
    use App\Http\Controllers\Controller;
    $settings = Controller::settings();
@endphp

<!--Blog start-->
<section class="contactSec">
    <div class="container">
        @include('admin.includes.errors')
        @if(session()->has('message_sent_successfully'))
            <div class="row">
                <div class="col-md-12">
                    <span class="alert alert-success">{{ session()->get('message_sent_successfully') }}</span>
                </div>
            </div>
            <br>
            <br>
        @endif
        
        <div class="row">
            <div class="col-sm-8">
                <h2 class="commentTitle">{{ __('messages.Send a Message') }}</h2>
                <div class="commentForm">
                    <form action="{{ route('send_message') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text"  placeholder="{{ __('messages.Name') }}" name="name" id="name" class="required">
                                <input type="email" placeholder="{{ __('messages.Email') }}" name="email" id="email" class="required">
                                <input type="text"  placeholder="{{ __('messages.Phone number') }}" name="phone" id="phone" class="required">
                            </div>
                            <div class="col-lg-6">
                                <textarea placeholder="{{ __('messages.Message') }}" id="message" name="message" class="required"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="blogReadmore" id="submit">{{ __('messages.Send') }}</button>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contactInfo">
                    <h2 class="commentTitle">{{ __('messages.Contact us') }}</h2>
                    <div class="contAddress">
                        <div class="singleContadds">
                            <i class="fa fa-map-marker"></i>
                            <p>
                                {{ $settings->address }}
                            </p>
                        </div>
                        <div class="singleContadds phone">
                            <i class="fa fa-phone"></i>
                            <p>
                                {{ $settings->site_phone }}
                            </p>
                            <p>
                                {{ $settings->site_phone1 }}
                            </p>
                        </div>
                        <div class="singleContadds">
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:{{ $settings->site_email }}">{{ $settings->site_email }}</a>
                        </div>
                        <div class="contactSocial">
                            <a target="_blank" href="{{ $settings->site_facebook_address }}"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="{{ $settings->site_twitter_address }}"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="{{ $settings->site_pinterest_address }}"><i class="fa fa-pinterest-p"></i></a>
                            <a target="_blank" href="{{ $settings->site_gmail_address }}"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Blog End-->

<section class="contactMap">
    <div class="container-fluid">
        <div class="row">
            <div style="width:100%; height: 458px;">
                {!! $settings->site_map_address !!}
            </div>
        </div>
    </div>
</section>

@endsection