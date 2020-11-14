@php
    use App\Http\Controllers\Controller;
    $settings = Controller::settings();
@endphp
<!--Header middle start-->
<section class="headerMiddle">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-12">
                <div class="logo">
                    <a href="/">
                        <img src="/themes/site/images/logo.png" alt="">
                    </a>
                </div> 
            </div>
            <div class="col-sm-9 col-xs-12 text-right">
                <div class="headerMRightinfo">
                    <div class="singlehmib">
                        <i class="fa fa-mobile-phone"></i>
                        <h2>{{ __('messages.Phone Number') }}</h2>
                        <h4>{{ $settings->site_phone }}</h4>
                    </div>
                    <div class="singlehmib">
                        <i class="fa fa-envelope-o"></i>
                        <h2>{{ __('messages.Email') }}</h2>
                        <h4>{{ $settings->site_email }}</h4>
                    </div>
                    <div class="singlehmib">
                        <i class="fa fa-clock-o"></i>
                        <h2>{{ __('messages.Working Hours') }}</h2>
                        <h4>{{ $settings->working_hours }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Header middle End-->