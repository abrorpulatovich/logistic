@php
    use App\Http\Controllers\Controller;
    $settings = Controller::settings();
    $categories = Controller::categories();
    $about_us = Controller::about_us();

    $lang = LaravelLocalization::getCurrentLocale();
    $lang_uc = ucfirst($lang);
@endphp

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="widget">
                    <h3 class="fotterTitle">{{ $about_us->title_by_lang() }}</h3>
                    <p class="fotinfo">
                        {!! $about_us->short_desc_by_lang() !!}
                    </p>
                    <div class="footerLogo">
                        <a href="index.html">
                            <img src="images/logo2.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix hidden-lg hidden-xs"></div>
            <div class="col-lg-4 col-sm-6">
                <div class="widget">
                    <h3 class="fotterTitle">{{ __('messages.Navigation') }}</h3>
                    <ul class="navigation">
                        @foreach($categories as $category)
                            @if(!$category->parent()->exists())
                                @if($category->child()->exists())
                                    <li class="has-menu-items"><a href="#">{{ $category->name_by_lang() }}</a>
                                        <ul class="sub-menu">
                                            @foreach($category->child as $child)
                                            <li>
                                                <a href="{{ url($child->slug) }}">{{ $child->name_by_lang() }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{ url($category->slug) }}">{{ $category->name_by_lang() }}</a></li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="widget">
                    <h3 class="fotterTitle">{{ __('messages.Contact us') }}</h3>
                    <p class="contactText">
                        {{ $settings->definition }}
                    </p>
                    <div class="address">
                        <div class="singleAdds">
                            <i class="fa fa-map-marker"></i>
                            <p>{{ $settings->address }}</p>
                        </div>
                        <div class="singleAdds">
                            <i class="fa fa-phone"></i>
                            <p>{{ $settings->site_phone }}</p>
                        </div>
                        <div class="singleAdds">
                            <i class="fa fa-envelope-o"></i>
                            <a href="mailto:{{ $settings->site_email }}">{{ $settings->site_email }}</a>
                        </div>
                    </div>
                    <div class="footerSocial">
                        @if($settings->site_pinterest_address)
                            <a target="_blank" href="{{ $settings->site_facebook_address }}"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if($settings->site_pinterest_address)
                            <a target="_blank" href="{{ $settings->site_twitter_address }}"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if($settings->site_pinterest_address)
                            <a target="_blank" href="{{ $settings->site_pinterest_address }}"><i class="fa fa-pinterest-p"></i></a>
                        @endif
                        @if($settings->site_gmail_address)
                            <a target="_blank" href="{{ $settings->site_gmail_address }}"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if($settings->site_likedln_address)
                            <a target="_blank" href="{{ $settings->site_likedln_address }}"><i class="fa fa-linkedin"></i></a>
                        @endif
                        @if($settings->site_email)
                            <a target="_blank" href="mailto:{{ $settings->site_email }}"><i class="fa fa-envelope-o"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--Copy Right start-->
<section class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <p>Developed by <a href="https://khantech.uz" target="_blank">abror.eshkabilov.uz</a></p>
            </div>
            <div class="col-sm-6 col-xs-12 text-right">
                <p>© {{ date('Y') }} All rights reserved.</p>
            </div>
        </div>
    </div>
</section>