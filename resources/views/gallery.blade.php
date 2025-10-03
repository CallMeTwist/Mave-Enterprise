<x-website.master>
    <!--page-title-area start-->
    <section class="page-title-area" style="background-image: url(assets/img/bg/08.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3">
                    <div class="page-title-wrapper text-center pt-125">
                        <div class="page-title-box">
                            <h2 class="page-title">Gallery </h2>
                            <ul class="breadcrumb-list">
                                <li><a href="/">Home <i class="far fa-chevron-right"></i></a></li>
                                <li><a href="#">Gallery </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--page-title-area end-->
    <!--gallery-area start-->
    <section class="gallery-area pt-130 pb-100">
        <div class="container">
            <div class="row">
                @foreach($galleries as $gallery)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="gallery gallery-02 pos-rel text-center wow fadeInUp2 animated" data-wow-delay='.3s'>
                        <div class="gallery__thumb pos-rel mb-30">
                            <img src="{{ asset($gallery->link) }}" alt="">
                        </div>
                        <div class="gallery__content">
                            <h4 class=""><a href="#">Ben Nnam Foundation</a></h4>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach($videos as $video)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="ratio ratio-16x9">
                            <iframe src="{{ $video->link }}?rel=0" title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--gallery-area end-->
    <!--cta-area start-->
    <section class="cta-area theme-bg2 pt-50 pb-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-lg-8 col-md-8">
                    <div class="cta-wrapper pl-100">
                        <h2>Join With Our <a href="#">Volunteer</a> Team</h2>
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
