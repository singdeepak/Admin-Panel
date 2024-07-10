    @include('header')
    @php
        $events = \App\Models\Event::orderBy('id', 'desc')->take(6)->get();
    @endphp
    <div class="page-wrapper">
        <!--Page Header Start-->
        <section class="page-header" style="margin-top: 10rem;">
            <div class="page-header-bg" style="background-image: url({{ asset('images/event-bg.png') }})">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Upcoming Events</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">Events</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Events Page Start-->
        <section class="events-page">
            <div class="container">
                <div class="row">
                    @foreach ($events as $event)
                       <div class="col-xl-4 col-lg-6 col-md-6">
                        <!--Events Single-->
                        <div class="events__single">
                            <div class="events__img">
                                <img src="{{ asset('images/about-us.png') }}">
                                <div class="events__date">
                                    <p>{{ $event->added_date }}</p>
                                </div>
                            </div>
                            <div class="events__content">
                                <h3 class="events__title"><a href="{{ route('event.details', $event->id) }}">{{ $event->event_title }}</a></h3>
                                <ul class="list-unstyled events__meta">
                                    <li><i class="far fa-clock"></i>{{ $event->event_date }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{ $event->added_by }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--Events Page End-->
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
