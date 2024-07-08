@include('header')
@php
    $data = \App\Models\Business::get()->toArray();
    $testimonials = \App\Models\testimonial::get();
@endphp
<div class="preloader">
        <img class="preloader__image" width="60" src="{{ asset('images/ngo.png') }}" alt="" />
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        <!--Page Header Start-->
        <section class="page-header" style="margin-top: 10rem;">
            <div class="page-header-bg" style="background-image: url({{ asset('images/about-bg.png') }}">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>About</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">About</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--About Page Start-->
        <section class="about-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-page__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <div class="about-page__img">
                                <img src="{{ asset('images/logo.png') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-page__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">get to know us</span>
                                <h2 class="section-title__title">We Make Difference in their Life</h2>
                            </div>
                            <p class="about-page__text">{!! $data[0]['about_info'] !!}</p>
                            <ul class="about-one__points list-unstyled">
                                <li>
                                    <div class="icon">
                                        <span class="icon-confirmation"></span>
                                    </div>
                                    <div class="text">
                                        <p>Join our Team</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-confirmation"></span>
                                    </div>
                                    <div class="text">
                                        <p>Quick Fundraising</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About Page End-->

        <!--Brand One Start-->
        <section class="brand-one">
            <div class="container">
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                    "0": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "375": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "575": {
                        "spaceBetween": 30,
                        "slidesPerView": 3
                    },
                    "767": {
                        "spaceBetween": 50,
                        "slidesPerView": 4
                    },
                    "991": {
                        "spaceBetween": 50,
                        "slidesPerView": 5
                    },
                    "1199": {
                        "spaceBetween": 100,
                        "slidesPerView": 5
                    }
                }}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-2.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-3.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-4.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-5.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-2.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-3.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-4.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-5.png" alt="">
                        </div><!-- /.swiper-slide -->
                    </div>
                </div>
            </div>
        </section>
        <!--Brand One End-->

        <!--Fundraising Start-->
        <section class="fundraishing">
            <div class="fundraishing-bg-box">
                <div class="fundraishing-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                    style="background-image: url(assets/images/backgrounds/fundraishing-bg.jpg);"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="fundraishing__inner">
                            <p class="fundraishing__sub-title">We’re Here to Support Them</p>
                            <h2 class="fundraishing__title">Fundraising for the <span>People</span> and <br> Causes you
                                Care About</h2>
                            <div class="fundraishing__btn-box">
                                <a href="{{ route('contact') }}" class="thm-btn fundraishing__btn">Start Donating now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Fundraising End-->

        <!--Testimonial Three Start-->
        <section class="testimonial-two testimonial-three">
            <div class="testimonial-two-bg"
                style="background-image: url(assets/images/backgrounds/testimonial-two-bg.png);"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="testimonial-two__left">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">our testimonials</span>
                                <h2 class="section-title__title">What They’re Talking About Company?</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="testimonial-two__right">
                            <div class="testimonial-two__carousel owl-carousel owl-theme">
                                <!--Testimonial Two Single-->
                                @foreach ($testimonials as $testimonial)
                                   <div class="testimonial-two__single">
                                    <div class="testimonial-two__content">
                                        <div class="testimonial-two__quote">
                                            <span class="icon-quote"></span>
                                        </div>
                                        <p class="testimonial-two__text">{{ $testimonial->testimonial_text }}</p>
                                    </div>
                                    <div class="testimonial-two__client-info">
                                        <div class="testimonial-two__client-img">
                                            <img src="assets/images/testimonial/testimonials-2-1.jpg" alt="">
                                        </div>
                                        <div class="testimonial-two__client-details">
                                            <h5 class="testimonial-two__client-name">{{ $testimonial->client_name }}</h5>
                                            <p class="testimonial-two__client-title">{{ $testimonial->client_designation }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonial Three End-->

        <!--Volunteers One Start-->
        <section class="volunteers-one">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Ready to help you</span>
                    <h2 class="section-title__title">Happy Volunteers</h2>
                </div>
                <div class="row">
                    @foreach ($testimonials as $testimonial)
                       <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                        <!--Volunteers One Single-->
                            <div class="volunteers-one__single">
                                <div class="volunteers-one__img">
                                    <img src="{{ asset('images/testimonials/' . $testimonial->client_image) }}">
                                    {{-- <div class="volunteers-one__social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div> --}}
                                </div>
                                <div class="volunteers-one__content">
                                    <h4 class="volunteers-one__name">{{ $testimonial->client_name }}</h4>
                                    <p class="volunteers-one__title">Volunteers</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--Volunteers One End-->

        <!--CTA One Start-->
        <section class="cta-one">
            <div class="cta-one-shape" style="background-image: url(assets/images/shapes/cta-one-shape.png);"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cta-one__inner">
                            <div class="cta-one__left">
                                <div class="cta-one__icon">
                                    <span class="icon-support"></span>
                                </div>
                                <h2 class="cta-one__title">Let’s Make a Difference in <br> the Lives of Others</h2>
                            </div>
                            <div class="cta-one__right">
                                <a href="{{ route('contact') }}" class="thm-btn cta-one__btn">become a volunteer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--CTA One End-->
    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="assets/images/resources/logo-2.png" alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">needhelp@pifoxen.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>
@include('footer')
