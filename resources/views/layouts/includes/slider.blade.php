@php
    use App\Http\Controllers\Controller;
    $sliders = Controller::sliders();
@endphp

<section class="sliderSection">
    <div class="container-fluid">
        <div class="row">
            <div class="tp-banner">
                <ul>
                    @foreach($sliders as $slider)
                        <li data-transition="boxfade" data-slotamount="7" data-masterspeed="1000" >
                            <img src="/storage/uploads/slider/large/{{ $slider->image }}"  alt="">
                            <div class="tp-caption sfb"
                                    data-x="left"
                                    data-y="center"
                                    data-hoffset="65"
                                    data-voffset="-97"
                                    data-speed="1600"
                                    data-start="1500"
                                    data-easing="Power4.easeOut">
                                <div class="revCont">
                                    <h1>{{ $slider->title_by_lang() }}</h1>
                                </div>
                            </div>
                            <div class="tp-caption sfb"
                                    data-x="left"
                                    data-y="center"
                                    data-hoffset="65"
                                    data-voffset="30"
                                    data-speed="2000"
                                    data-start="2500"
                                    data-easing="Power4.easeOut">
                                <div class="revCont">
                                    {!! $slider->short_desc_by_lang() !!}
                                </div>
                            </div>
                            <div class="tp-caption sfb text-left"
                                    data-x="left"
                                    data-y="center"
                                    data-hoffset="65"
                                    data-voffset="130"
                                    data-speed="2000"
                                    data-start="3000"
                                    data-easing="Power4.easeOut">
                                <div class="revBtn">
                                    <a href="/{{ $slider->slug }}" class="pifourBtn">{{ __('messages.View details') }}</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>