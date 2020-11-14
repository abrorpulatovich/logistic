@php
    use App\Http\Controllers\Controller;
    $settings = Controller::settings();
@endphp
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <nav class="mainnav">
                    <div class="logoMobile hidden-lg hidden-sm hidden-md">
                        <a href="/">
                            <img alt="Logo" src="/themes/site/images/logo2.png">
                        </a>
                    </div>
                    <div class="mobileMenu hidden-lg hidden-sm hidden-md">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    @include('layouts.includes.categories')
                </nav>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="socialmedia">
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
                <!-- <div class="searchHeader">
                    <a href="#" class="headerSeacBtn"><i class="fa fa-search"></i></a>
                    <div class="searchMe">
                        <form method="post" action="#">
                            <input type="search" placeholder="Search...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                            <a href="#" class="cluseSearch"><i class="fa fa-close"></i></a>
                        </form>
                    </div>
                </div> -->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</header>