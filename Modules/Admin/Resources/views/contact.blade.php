<x-website.master>
    <!--page-title-area start-->
    <section class="page-title-area" style="background-image: url(assets/img/bg/08.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="page-title-wrapper text-center pt-125">
                        <div class="page-title-box">
                            <h2 class="page-title">Contact Us</h2>
                            <ul class="breadcrumb-list">
                                <li><a href="/">Home <i class="far fa-chevron-right"></i></a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--page-title-area end-->
    <!--join-team-area start-->
    <section class="contacts-details-area pt-130 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-6 col-md-6">
                    <div class="get-touch-area pl-50 pr-50">
                        <div class="section-title text-left mb-30 wow fadeInUp2 animated" data-wow-delay='.1s'>
                            <h6><span><i class="fas fa-heart"></i></span> Get In Touch</h6>
                            <h2>We’re Always Here for You</h2>
                            <p>Feel free to reach out to us with any questions or for more information about our initiatives and how you can get involved.</p>
                        </div>
                        <div class="contacts d-flex align-items-center mb-30">
                            <div class="contacts__icon mr-25">
                                <i class="flaticon-phone-call"></i>
                            </div>
                            <div class="contacts__text">
                                <h4 class="semi-02-title">Phone Number</h4>
                                <h5>+880 - 12 - 34 - 45 - 99</h5>
                            </div>
                        </div>
                        <div class="contacts d-flex align-items-center mb-30">
                            <div class="contacts__icon mr-25">
                                <i class="flaticon-chat"></i>
                            </div>
                            <div class="contacts__text">
                                <h4 class="semi-02-title">Email Address</h4>
                                <h5><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="50232520203f222410373d31393c7e333f3d">[email&#160;protected]</a></h5>
                            </div>
                        </div>
                        <div class="contacts d-flex align-items-center mb-30">
                            <div class="contacts__icon mr-25">
                                <i class="flaticon-location"></i>
                            </div>
                            <div class="contacts__text">
                                <h4 class="semi-02-title">Our Location</h4>
                                <h5>55 Main Street, New York</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-6">
                    <div class="donar-information donation-form grey-bg2 mb-30 pr-50 pl-50">
                        <div class="section-title text-left mb-50 wow fadeInUp2 animated" data-wow-delay='.1s'>
                            <h6><span><i class="fas fa-heart"></i></span> Send Message</h6>
                            <h2>Write to Us Anytime.</h2>
                        </div>
                        <div class="main-contact-area">
                            <form method="POST" action="{{ route('contact.send') }}">
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
                                    <input type="text" class="form-control" placeholder="Your Subject" name="subject">
                                </div>
                                <div class="input-area mb-10">
                                    <textarea name="message" id="messsage" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <div class="input-btn">
                                    <button type="submit" class="theme_btn theme_btn_bg large_btn">Send message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--join-team-area end-->
    <!--brand-area start-->
    <section class="brand-area grey-bg2 pt-70">
        <div class="container custom-container-03">
            <div class="row brand-active pb-60">
                <div class="col-xl-2">
                    <div class="brand-slide text-center wow fadeInUp animated" data-wow-delay='.1s'>
                        <div class="brand-img">
                            <a href="#"><img src="assets/img/brand/01.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--brand-area end-->
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
