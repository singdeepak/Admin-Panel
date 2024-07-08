@include('header')
@php
    $data = \App\Models\Business::get()->toArray();
@endphp
<div class="page-wrapper">
        <!--Page Header Start-->
        <section class="page-header" style="margin-top: 10rem;">
            <div class="page-header-bg" style="background-image: url({{ asset('images/contact-bg.png') }})">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Contact</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/  ">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Contact Page Start-->
        <section class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="contact-page__left">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Contact with us</span>
                                <h2 class="section-title__title">Get in Touch With us</h2>
                            </div>
                            <p class="contact-page__text">{{ $business[0]['business_name'] }}</p>
                            <div class="contact-page__social">
                                <a href="{{ $data[0]['youtube'] }}"><i class="fab fa-youtube"></i></a>
                                <a href="{{ $data[0]['facebook'] }}"><i class="fab fa-facebook"></i></a>
                                <a href="{{ $data[0]['instagram'] }}"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="contact-page__right">
                            <form action="#" class="comment-one__form contact-form-validated"
                                novalidate="novalidate" method="POST">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Your Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="email" placeholder="Email Address" name="email">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Phone Number" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <select name="subject">
                                                <option value="">Subject</option>
                                                <option value="query about donation">Query about Donation</option>
                                                <option value="want be a volunteer">Want be a volunteer</option>
                                            </select><!-- /# -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box text-message-box">
                                            <textarea name="message" placeholder="Write a Comment"></textarea>
                                        </div>
                                        <div class="comment-form__btn-box">
                                            <button type="submit" class="thm-btn comment-form__btn">Send us a
                                                message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact Page End-->

        <!--Contact Info Start-->
        <section class="contact-info mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <!--Contact Info Single-->
                        <div class="contact-info__single">
                            <h4 class="contact-info__title">About</h4>
                            <p class="contact-info__text">{!! substr($business[0]['about_info'], 3, 255); !!}</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <!--Contact Info Single-->
                        <div class="contact-info__single contact-info__single-2">
                            <h4 class="contact-info__title">Address</h4>
                            <p class="contact-info__text">{{ $business[0]['address'] }}</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <!--Contact Info Single-->
                        <div class="contact-info__single contact-info__single-3">
                            <h4 class="contact-info__title">Contact</h4>
                            <p class="contact-info__email-phone">
                                <a href="mailto:needhelp@company.com"
                                    class="contact-info__email">{{ $business[0]['email_id'] }}</a>
                                <a href="tel:{{ $business[0]['contact'] }}" class="contact-info__phone">+ (91) {{ $business[0]['contact'] }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact Info End-->

        <!--Contact page Google Map Start-->
        <section class="contact-page-google-map mt-5">
            <iframe
                src="{{ $data[0]['anchor'] }}"
                class="contact-page-google-map__one" allowfullscreen>
            </iframe>
        </section>
        <!--Google Map End-->

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
