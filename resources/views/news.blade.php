@include('header')
<div class="page-wrapper">

    <!--Page Header Start-->
    <section class="page-header" style="margin-top: 10rem;">
        <div class="page-header-bg" style="background-image: url({{ asset('images/news-bg.png') }})">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <h2>Latest News</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li><span>/</span></li>
                    <li class="active">News</li>
                </ul>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Blog Page Start-->
    <section class="blog-page blog--carousel">
        <div class="container">
            <div class="thm-owl__carousel blog__carousel owl-carousel carousel--have-shadow"
                data-owl-options='{
					"loop": true,
					"margin": 30,
					"items": 1,
					"nav": true,
					"dots": true,
					"smartSpeed": 700,
					"navText": ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
					"responsive": {
						"0": {
							"items": 1,
							"margin": 0
						},
						"768": {
							"items": 2,
							"margin": 30
						},
						"992": {
							"items": 3,
							"margin": 30
						}
					}
				}'>

                @foreach ($newses as $news)
                    <div class="item">
                        <!--Blog One single-->
                        <div class="blog-one__single">
                            <div class="blog-one__img">
                                <img src="{{ asset('images/news/' . $news->news_image) }}">
                                <div class="blog-one__date">
                                    <p>Latest</p>
                                </div>
                                <a href="{{ route('news.details', $news->id) }}">
                                    <span class="news-one__plus"></span>
                                </a>
                            </div>
                            <div class="blog-one__content">

                                <h3 class="blog-one__title">
                                    <a href="{{ route('news.details', $news->id) }}">{{ $news->news_title }}</a>
                                </h3>
                                {{-- <h5 class="blog-one__text">{{ $news->news_short_desc }} --}}
                                </h5>
                                <div class="blog-one__bottom">
                                    <a href="{{ route('news.details', $news->id) }}" class="blog-one__btn">Read More</a>
                                    <a href="{{ route('news.details', $news->id) }}" class="blog-one__arrow"><span
                                            class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- /.thm-owl__carousel -->
        </div>
    </section>
    <!--Blog Page End-->
</div><!-- /.page-wrapper -->


<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="index.html" aria-label="logo image"><img src="assets/images/resources/logo-2.png"
                    alt="" /></a>
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
