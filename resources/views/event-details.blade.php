@include('header')
    <div class="page-wrapper">

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!--Page Header Start-->
        <section class="page-header" style="margin-top: 10rem;">
            <div class="page-header-bg" style="background-image: url({{ asset('images/event-bg.png') }})">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Event Details</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">Event Details</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Event Details Start-->
        <section class="event-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="event-details__img">
                            <img src="assets/images/resources/event-details-img-1.jpg" alt="">
                            <div class="events__date">
                                <p>New</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="event-details__bottom">
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="event-details__bottom-left">
                                <div class="event-details__bottom-content">
                                    <h3 class="event-details__title">{{ $event['event_title'] }}</h3>
                                    <h6 class="event-details__text-1">{{ $event['event_short_desc'] }}</h6>
                                    <p class="event-details__text-2">{!! $event['event_long_desc'] !!}</p>

                                    <a href="{{ route('contact') }}" class="thm-btn event-details__btn">register now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="event-details__sidebar">
                                <ul class="event-details__sidebar-details list-unstyled">
                                    <li>
                                        <p>Date:</p>
                                        <span>{{ $event['event_date'] }}</span>
                                    </li>
                                    <li>
                                        <p>Added By:</p>
                                        <span>{{ $event['added_by'] }}</span>
                                    </li>
                                    <li>
                                        <p>Added Date:</p>
                                        <span>{{ $event['added_date'] }}</span>
                                    </li>
                                </ul>
                                <div class="event-details__map-box">
                                    <iframe
                                        src="{{ $event['event_location'] }}"
                                        class="event-details__map" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Event Details End-->

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
@include('footer')
