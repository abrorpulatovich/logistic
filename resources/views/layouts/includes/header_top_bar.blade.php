@php
    use App\Http\Controllers\Controller;
    $settings = Controller::settings();

    $lang = LaravelLocalization::getCurrentLocale();
    $lang_uc = ucfirst($lang);
@endphp

<section class="headerTopbar">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-xs-12">
                <p class="headTOpinfo">
                    {{ $settings->definition }}
                </p>
            </div>
            <div class="col-sm-4 col-xs-12 text-right resMobcenter">
                <div class="rightheaderlink">
                    <!-- <a href="#">Extras</a> -->
                    <!-- <a href="#">Buy Now</a> -->
                </div>
                <div class="language">
                    <a class="currentFlg" href="#">
                        <img src="/themes/site/images/icon/{{ $lang_uc }}.png" alt="" width="16" height="12">
                            {{ LaravelLocalization::getSupportedLocales()[App::getLocale()]['native'] }}
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="flagList">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="@if($localeCode == $lang) hidden @endif">
                                <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <img alt="" src="/themes/site/images/icon/{{ $localeCode }}.png" width="16" height="12"> {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>