<x-website.master>
    <!--page-title-area start-->
    <section class="page-title-area" style="background-image: url(/assets/img/bg/08.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 offset-xl-4">
                    <div class="page-title-wrapper text-center pt-125">
                        <div class="page-title-box">
                            <h2 class="page-title">Events List</h2>
                            <ul class="breadcrumb-list">
                                <li><a href="/">Home <i class="far fa-chevron-right"></i></a></li>
                                <li><a href="#">Events</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--page-title-area end-->
    <!--event-area start-->
    <section class="events-grid-area pt-125 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="events-wrapper mb-30">
                        @foreach($events as $event)
                            <div class="events grey-bg2 pos-rel d-sm-flex align-items-center2 mb-30 wow fadeInUp2 animated" data-wow-delay='.3s'>
                                <div class="events__back" style="background-image: url({{ $event->image }});"></div>
                                <div class="row align-items-center pl-50 pr-50">
                                    <div class="col-xl-8 col-lg-7 col-md-7">
                                        <div class="events__content">
                                            <span><i class="far fa-calendar-alt"></i>{{ $event->date->format('l jS \of F Y h:i a') }}</span>
                                            <h3 class="mb-15"><a href="#">{{ $event->title }}</a></h3>
                                            <p>{{ $event->intro }}</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-5 justify-content-end">
                                        <div class="events__btn text-md-center text-lg-right">
                                            <a class="theme_btn theme_btn_bg" href="{{ route('events.view', $event->code) }}">view event <span><i class="fas fa-heart"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="details-right-area">
                        <div class="widget grey-bg2 mb-30 wow fadeInUp2 animated" data-wow-delay='.1s'>
                            <div class="widget-post">
                                <h3 class="cases-title mb-30">Past Events</h3>
                                @foreach($past_events as $past)
                                <div class="post d-flex align-items-center mb-20">
                                    <div class="post__thumb mr-20">
                                        <img src="{{ asset($past->image) }}" alt="" style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                    <div class="post__content">
                                        <h5><a href="{{ route('events.view', $past->code) }}">{{ $past->title }}</a></h5>
                                        <a class="view_btn" href="{{ route('events.view', $past->code) }}">view Details</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--cases-details-area end-->
    <!--cta-area start-->
    <section class="cta-area theme-bg2 pt-50 pb-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-lg-8 col-md-8">
                    <div class="cta-wrapper pl-100">
                        <h2>Join With Our <a href="volunteer.html">Volunteer</a> Team</h2>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="cta-btn">
                        <a class="theme_btn theme_btn_bg" href="about.html">Learn more <span><i class="fas fa-heart"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--cta-area end-->
</x-website.master>
