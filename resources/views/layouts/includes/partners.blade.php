@php
    use App\Http\Controllers\Controller;
    $partners = Controller::partners();
@endphp
@if($partners)
    <!--Client Start-->
    <section class="ourpartners bggray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 noPadding text-center">
                    <div class="commonSectionTitle">
                        <h2>{{ __('messages.Our partners') }}</h2>
                        <p>
                            {{ __('messages.We have been working with different partners that made expensive experiences. We are glad working with them') }}.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="clientCaro">
                    @foreach($partners as $partner)
                        <div class="col-xs-12">
                            <div class="singleClient">
                                <a href="{{ ($partner->official_site)? $partner->official_site: '' }}" @if($partner->official_site) target="_blank" @endif>
                                    <img src="/storage/uploads/partner/medium/{{ $partner->image }}" alt="{{ $partner->name }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--Client End-->
@endif
