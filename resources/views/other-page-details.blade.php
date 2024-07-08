@include('header')

<div class="preloader">
        <img class="preloader__image" width="60" src="{{ asset('images/ngo.png') }}"/>
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        <!--Page Header Start-->
        <section class="page-header" style="margin-top: 10rem;">
            <div class="page-header-bg" style="background-image: url({{ asset('images/pages/' . $other->banner_image) }}">

            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Other Activity</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">other activity</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--About Page Start-->
        <section class="about-page">
            <div class="container">
                <div class="row">

                    <div class="col-xl-12">
                        <div class="about-page__right">
                            <div class="section-title text-left">
                                <h2 class="section-title__title">{{ $other->page_title }}</h2>
                            </div>
                            <p class="about-page__text">{!! $other->page_desc !!}</p>
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

    </div><!-- /.page-wrapper -->
@include('footer')
