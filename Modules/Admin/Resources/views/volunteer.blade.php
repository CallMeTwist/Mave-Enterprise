<x-website.master>
    <!--page-title-area start-->
    <section class="page-title-area" style="background-image: url(assets/img/bg/08.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="page-title-wrapper text-center pt-125">
                        <div class="page-title-box">
                            <h2 class="page-title">Become A Volunteer</h2>
                            <ul class="breadcrumb-list">
                                <li><a href="/">Home <i class="far fa-chevron-right"></i></a></li>
                                <li><a href="#">Become A Volunteer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--page-title-area end-->
    <!--join-team-area start-->
    <section class="join-volunteer-area pos-rel pt-130 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="donar-information donation-form grey-bg2 mb-30">
                        <div class="section-title text-left mb-50 wow fadeInUp2 animated" data-wow-delay='.1s'>
                            <h6><span><i class="fas fa-heart"></i></span> Join Us today</h6>
                            <h2>Become A Proud Volunteer</h2>
                        </div>
                        <form method="POST" action="{{ route('volunteer.send') }}">
                            @csrf
                            <div class="input-area mb-10">
                                <input type="text" class="form-control" placeholder="Your Name" name="firstname">
                            </div>
                            <div class="input-area mb-10">
                                <input type="text" class="form-control" placeholder="Email Address" name="lastname">
                            </div>
                            <div class="input-area mb-10">
                                <input type="text" class="form-control" placeholder="Your Email" name="email">
                            </div>
                            <div class="input-area mb-10">
                                <textarea name="message" id="messsage" cols="30" rows="10" placeholder="Message"></textarea>
                            </div>
                            <div class="input-btn">
                                <button class="theme_btn theme_btn_bg large_btn">Join Us</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="volunteer-box pos-rel">
                        <div class="volunteer-box__img">
                            <img src="assets/img/about/07.jpg" alt="">
                        </div>
                        <div class="volunteer-box__img-02">
                            <img src="assets/img/about/08.jpg" alt="">
                        </div>
                        <div class="volunteer-box__shape">
                            <img src="assets/img/shape/14.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--join-team-area end-->
    <!--donation-form-area start-->
    <section class="donation-form-area donation-form-area-02 pos-rel pt-130 pb-100" style="background-image: url(assets/img/bg/10.jpg);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12">
                    <div class="donation-video text-center">
                        <div class="video-area">
                            <a href="https://www.youtube.com/watch?v=3H-PmCiL0bE" class="popup-video"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--donation-form-area end-->
</x-website.master>
