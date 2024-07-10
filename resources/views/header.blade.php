@php
    $data = \App\Models\Business::get()->toArray();
    $currentRoute = Route::currentRouteName();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>विद्यार्थी उत्कर्ष मंडळ</title>
	<!-- favicons Icons -->
	<link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png" />
	<link rel="manifest" href="assets/images/favicons/site.webmanifest" />
	<meta name="description" content="" />

	<!-- fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">

	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

	<link
		href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Fredoka+One&display=swap"
		rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/animate/custom-animate.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/jarallax/jarallax.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.pips.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/odometer/odometer.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/swiper/swiper.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/pifoxen-icons/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/tiny-slider/tiny-slider.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/reey-font/stylesheet.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/bxslider/jquery.bxslider.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/vegas/vegas.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/timepicker/timePicker.css') }}" />

	<!-- template styles -->
	<link rel="stylesheet" href="{{ asset('assets/css/pifoxen.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/pifoxen-responsive.css') }}" />

    <style>
    .main-menu.main-menu-two {
        background-color: #333; /* Dark background color */
        color: #fff; /* White text color */
    }

    .main-menu.main-menu-two a {
        color: #fff; /* White text color for links */
    }
</style>
</head>

<body>

	<!-- /.preloader -->
	<div class="page-wrapper">
		<header class="main-header-two clearfix">
			<div class="main-header-two__top">
				<div class="container">
					<div class="main-header-two__top-inner">
						<div class="main-header-two__logo">
							<a href="index.php"><img src="{{ asset('assets/images/resources/logo.jpeg') }}" style="width: 200px;"></a>
						</div>
						<div class="main-header-two__right">

							<div class="main-header-two__search-cart-donate-btn">

								<a href="#" class="donate-btn main-header-two__btn"> <i
								class="fa fa-language"></i> मराठी </a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<nav class="main-menu main-menu-two clearfix">
				<div class="main-menu-two-wrapper clearfix">
					<div class="container clearfix">
						<div class="main-menu-two-wrapper-inner clearfix">
							<div class="main-menu-two-wrapper__main-menu">
								<a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
								<ul class="main-menu__list one-page-scroll-menu">
									<li class="{{ $currentRoute == 'home' ? 'current' : '' }}" data-scroll-offset="0">
										<a href="/">Home</a>
									</li>
									<li class="{{ $currentRoute == 'about' ? 'current' : '' }}" data-scroll-offset="60">
										<a href="{{ route('about') }}">About Us</a>
									</li>

									<li class="dropdown">
										<a href="javascirpt:void(0);">Our Activities</a>
										<ul>
											<li class="{{ $currentRoute == 'social-page' ? 'current' : '' }}"><a href="{{ route('social-page', 1) }}">Social Activities</a></li>
											<li class="{{ $currentRoute == 'educational-page' ? 'current' : '' }}"><a href="{{ route('educational-page', 2) }}">Educational Activities</a></li>
											<li class="{{ $currentRoute == 'arts-page' ? 'current' : '' }}"><a href="{{ route('arts-page', 3) }}">Arts and Sports Activities</a></li>
											<li class="{{ $currentRoute == 'other-page' ? 'current' : '' }}"><a href="{{ route('other-page', 4) }}">Other Activities</a></li>
										</ul>
									</li>
									<li class="{{ $currentRoute == 'events' ? 'current' : '' }}" data-scroll-offset="60">
										<a href="{{ route('events') }}">Upcoming Events</a>
									</li>
									<li class="{{ $currentRoute == 'news' ? 'current' : '' }}" data-scroll-offset="60">
										<a href="{{ route('news') }}">Newsroom</a>
									</li>
									<li class="{{ $currentRoute == 'contact' ? 'current' : '' }}" data-scroll-offset="60">
										<a href="{{ route('contact') }}">Contact</a>
									</li>
								</ul>
							</div>
							<div class="main-menu-two-wrapper__right">
								<div class="main-menu-two__top-social">
									<a href="{{ $data[0]['youtube'] }}"><i class="fab fa-youtube"></i></a>
									<a href="{{ $data[0]['facebook'] }}"><i class="fab fa-facebook"></i></a>
									<a href="{{ $data[0]['instagram'] }}"><i class="fab fa-instagram"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</header>

		<div class="stricky-header stricked-menu main-menu main-menu-two">
			<div class="sticky-header__content"></div><!-- /.sticky-header__content -->
		</div><!-- /.stricky-header -->
