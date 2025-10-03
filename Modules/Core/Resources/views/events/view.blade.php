<x-website.master>
    <!--page-title-area start-->
    <section class="page-title-area" style="background-image: url(/assets/img/bg/08.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3">
                    <div class="page-title-wrapper text-center pt-125">
                        <div class="page-title-box">
                            <h2 class="page-title">{{ $event->title }}</h2>
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
    <!--cases-details-area start-->
    <section class="events-details-area pt-125 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="events-details-left">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="events-details-thumb mb-30">
                                    <img src="{{ asset($event->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="events-text-box mb-45">
                            <h2 class="mb-30">{{ $event->title }}</h2>
                            <p  class=" lead mb-15">{{ $event->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="events-details-right">
                        <div class="widget grey-bg2 mb-30">
                            <div class="widget-post">
                                <h3 class="cases-title mb-15">Events Information</h3>
                                <p class="mb-20">{{ $event->intro }}</p>
                                <div class="times__content mb-20">
                                    <h5><a href="#">Event Date</a></h5>
                                    <p><i class="far fa-calendar-alt"></i>{{ $event->date->format('l jS \of F Y') }}</p>
                                </div>
                                <div class="times__content mb-20">
                                    <h5><a href="#">Event Time</a></h5>
                                    <p><i class="far fa-clock"></i>{{ $event->date->format('h:i a') }}</p>
                                </div>
                                <div class="times__content mb-20">
                                    <h5><a href="#">Event Location</a></h5>
                                    <p><i class="far fa-map-marker-alt"></i>{{ $event->venue }}</p>
                                </div>
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
                        <h2>Join With Our <a href="{{ route('volunteer') }}">Volunteer</a> Team</h2>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="cta-btn">
                        <a class="theme_btn theme_btn_bg" href="{{ route('volunteer') }}">Learn more <span><i class="fas fa-heart"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--cta-area end-->
</x-website.master>
