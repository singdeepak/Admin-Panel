		<!--Main Slider Two Start-->
		<section class="main-slider main-slider-two" id="home">
			<div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
					"effect": "fade",
					"pagination": {
						"el": "#main-slider-pagination",
						"type": "bullets",
						"clickable": true
					},
					"navigation": {
						"nextEl": "#main-slider__swiper-button-next",
						"prevEl": "#main-slider__swiper-button-prev"
					},
					"autoplay": {
						"delay": 5000
					}}'>
				<div class="swiper-wrapper">
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide">
                            <div class="image-layer"
                                style="background-image: url({{ asset('images/sliders/' . $slider->slider_image) }});">
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="main-slider__content">
                                            <h2>{{ $slider->slider_heading }}</h2>
                                            <p>{{ $slider->slider_sub_heading }}</p>
                                            <a href="{{ $slider->slider_link }}" class="thm-btn">Discover More</a>
                                            <div class="main-slider-two-map">
                                                <img src="{{ asset('images/sliders/' . $slider->slider_image) }}"
                                                alt="{{ $slider->slider_heading }}" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
					    </div>
                    @endforeach
				</div>
				<!-- If we need navigation buttons -->
				<div class="swiper-pagination" id="main-slider-pagination"></div>
				<div class="main-slider__nav-two">
					<div class="swiper-button-prev" id="main-slider__swiper-button-next">
						<i class="fa fa-angle-right angle-left"></i>
					</div>
					<div class="swiper-button-next" id="main-slider__swiper-button-prev">
						<i class="fa fa-angle-right"></i>
					</div>
				</div>
			</div>
		</section>
		<!--Main Slider Two End-->

		<!--Feature Two Start-->
		<section class="feature-two mt-5">
			<div class="container">
				<div class="feature-two__inner">
					<div class="row">
						<div class="col-xl-3 col-lg-3">
							<!--Feature Two Single-->
							<div class="feature-two__single wow fadeInUp" data-wow-delay="100ms">
								<div class="feature-two__img">
									<img src="{{ asset('images/service-bg.png') }}" alt="">
									<div class="feature-two__content">
										<h3 class="feature-two__title"><a href="{{ route('social-page', 1) }}">Our <br> Social <br>
											Activity</a></h3>
										<a href="about.html" class="feature-two__arrow"><span
												class="icon-right-arrow"></span></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3">
							<!--Feature Two Single-->
							<div class="feature-two__single wow fadeInUp" data-wow-delay="200ms">
								<div class="feature-two__img feature-two__img-2">
									<img src="{{ asset('images/service-bg.png') }}" alt="">
									<div class="feature-two__content">
										<h3 class="feature-two__title"><a href="{{ route('educational-page', 2) }}">Our <br> Educational <br>
											Activity</a></h3>
										<a href="become-volunteer.html" class="feature-two__arrow"><span class="icon-right-arrow"></span></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3">
							<!--Feature Two Single-->
							<div class="feature-two__single wow fadeInUp" data-wow-delay="300ms">
								<div class="feature-two__img feature-two__img-3">
									<img src="{{ asset('images/service-bg.png') }}" alt="">
									<div class="feature-two__content">
										<h3 class="feature-two__title"><a href="{{ route('arts-page', 3) }}">Our <br> Arts and Sports <br>
											Activity</a></h3>
										<a href="about.html" class="feature-two__arrow"><span
												class="icon-right-arrow"></span></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3">
							<!--Feature Two Single-->
							<div class="feature-two__single wow fadeInUp" data-wow-delay="100ms">
								<div class="feature-two__img">
									<img src="{{ asset('images/service-bg.png') }}" alt="">
									<div class="feature-two__content">
										<h3 class="feature-two__title"><a href="{{ route('other-page', 4) }}">Our <br> others <br>
											Activity</a></h3>
										<a href="about.html" class="feature-two__arrow"><span
												class="icon-right-arrow"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!--Feature Two End-->

		<!--About One Start-->
		<section class="about-one" id="about">
			<div class="container">
				<div class="row">
					<div class="col-xl-6">
						<div class="about-one__left">
							<div class="about-one__img wow slideInLeft" data-wow-delay="100ms"
								data-wow-duration="2500ms">
								<img src="{{ asset('images/about-us.png') }}">
								<div class="about-one__badge">
									<img src="assets/images/resources/about-one-badge.png" alt="">
								</div>
							</div>
						</div>
					</div>
					@foreach ($business as $item)
                        <div class="col-xl-6">
						<div class="about-one__right">
							{{-- <div class="about-one-shape float-bob-y"><img src="#"></div> --}}
							<div class="section-title text-left">
								<h2 class="section-title__title">{{ $item->business_name }}</h2>
							</div>
							<p class="about-one__text">{!! $item->about_info !!}</p>
						</div>
					</div>
                    @endforeach
				</div>
			</div>
		</section>
		<!--About One End-->

		<!--Volunteers And Donating Start-->
        <section class="volunteers-and-donating">
            <div class="volunteers-and-donating__wrap">
                <div class="volunteers-and-donating__left wow slideInLeft" data-wow-delay="100ms"
                    data-wow-duration="2500ms"
                    style="background-image: url({{ asset('images/volunteer.png') }};">
                    <div class="volunteers-and-donating__content">
                        <h3 class="volunteers-and-donating__title"><a href="become-volunteer.php">Become Volunteer</a>
                        </h3>
                        <p class="volunteers-and-donating__text">There are many variations of passages of lore available
                            but the majority have suffered alteration.</p>
                        <a href="{{ route('contact') }}" class="thm-btn volunteers-and-donating__btn">Join our team</a>
                    </div>
                </div>
                <div class="volunteers-and-donating__right wow slideInRight" data-wow-delay="100ms"
                    data-wow-duration="2500ms"
                    style="background-image: url({{ asset('images/donation.png') }});">
                    <div class="volunteers-and-donating__content">
                        <h3 class="volunteers-and-donating__title"><a href="donate-now.php">Start Donating</a></h3>
                        <p class="volunteers-and-donating__text">There are many variations of passages of lore available
                            but the majority have suffered alteration.</p>
                        <a href="{{ route('contact') }}" class="thm-btn volunteers-and-donating__btn">donate now</a>
                    </div>
                </div>
            </div>
        </section>
        <!--Volunteers And Donating End-->


		<!--Cause Two End-->
		<section class="causes-one causes-two" id="causes">
			<div class="container">
				<div class="section-title text-left">
					<h2 class="section-title__title">Upcoming Events</h2>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="causes-one__carousel owl-theme owl-carousel">
							@foreach ($events as $event)
                                <div class="causes-one__single">
								<div class="causes-one__img">
									<img src="{{ asset('images/events/' . $event->event_image) }}">
									<div class="causes-one__category">
										<span>{{ $event->event_title }}</span>
									</div>
								</div>
								<div class="causes-one__content-box">
									<div class="causes-one__content">
										<h3 class="causes-one__title">
                                            <a href="{{ route('event.details', $event->id) }}">Read More</a>

										</h3>
										<p class="causes-one__text">{{ $event->event_short_desc }}</p>
									</div>
								</div>
							</div>
                            @endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--Cause Two End-->

		<!--Testimonial Two Start-->
		<section class="testimonial-two" id="testimonials">
			<div class="testimonial-two-bg" style="background-image: url({{ asset('images/testi-bg.png') }});"></div>
			<div class="container">
				<div class="row">
					<div class="col-xl-4">
						<div class="testimonial-two__left">
							<div class="section-title text-left">
								<span class="section-title__tagline">Opinions of Dignitaries</span>
								<h2 class="section-title__title"> What are they saying about us?</h2>
							</div>
						</div>
					</div>
					<div class="col-xl-8">
						<div class="testimonial-two__right">
							<div class="testimonial-two__carousel owl-carousel owl-theme">
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
											<img src="{{ asset('images/testimonials/' . $testimonial->client_image) }}">
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
		<!--Testimonial Two End-->


		<!--Gallery Page Start-->
		<section class="gallery-page gallery--carousel" id="gallery">
			<div class="container">
				<h2 class="section-title__title text-center">Newsroom</h2> <br><br>
				<div class="thm-owl__carousel gallery__carousel owl-carousel" data-owl-options='{
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
						<div class="two-section__gallery-single">
							<div class="two-section__gallery-img-inner">
								<img src="{{ asset('images/news/' . $news->news_image) }}">
							</div>
							<div class="two-section__gallery-img-overly">
								<div class="two-section__gallery-icon-bg">
								</div>
								<a class="img-popup" href="{{ route('news.details', $news->id) }}">
									<span class="icon-right-arrow"></span>
								</a>
							</div>
						</div>
					</div>
                @endforeach
			</div>
		</section>
		<!--Gallery Page End-->

