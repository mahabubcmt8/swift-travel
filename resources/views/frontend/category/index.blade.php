@extends('layouts.frontend')
@section('content-frontend')
	@if($categoryShow->slug == 'about')
		@php
			$abouts = App\Models\About::where('status', 1)->latest()->get();
		@endphp
		<!-- About -->
		<section class="about cover section-padding">
			<div class="container">
				@foreach($abouts as $about)
					<div class="row">
						<div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">
							<div class="section-subtitle">{{ $about->title }}</div>
							<div class="section-title"><span>{{ $about->title }}</span></div>
							<p>{!! $about->description !!}</p>
							<ul class="list-unstyled about-list mb-30">
								<li>
									<div class="about-list-icon"> <span class="ti-check"></span> </div>
									<div class="about-list-text">
									<p>{{ $about->experience_no }} {{ $about->experience_title }}</p>
									</div>
								</li>
							</ul>
							<!-- Info -->
							<div class="phone-call mb-30">
								<div class="icon"><span class="flaticon-phone-call"></span></div>
								<div class="text">
									<p>For information</p>
									<a href="tel:{{ get_setting('phone')->value ?? 'null' }}">{{ get_setting('phone')->value ?? 'null' }}</a>
								</div>
							</div>
						</div>
						<div class="col-md-5 offset-md-1 animate-box" data-animate-effect="fadeInUp">
							<div class="img-exp">
								<div class="about-img">
									<div class="img"> <img src="{{ asset($about->image) }}" class="img-fluid" alt=""> </div>
								</div>
								<div id="circle">
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
									<defs>
										<path id="circlePath" d=" M 150, 150 m -60, 0 a 60,60 0 0,1 120,0 a 60,60 0 0,1 -120,0 " />
									</defs>
									<circle cx="150" cy="100" r="75" fill="none" />
									<g>
										<use xlink:href="#circlePath" fill="none" />
										<text fill="#fff">
											<textPath xlink:href="#circlePath"> . SWIFT Corporation . SWIFT Corporation </textPath>
										</text>
									</g>
									</svg>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</section>
	@endif

	@if($categoryShow->slug == 'services')
	@php
		$services = App\Models\Service::where('status', 1)->latest()->get();
	@endphp
	<!-- Sub banner start -->
	<div class="sub-banner">
	    <div class="overlay">
	        <div class="container">
	            <div class="breadcrumb-area">
	                <h1>{{ $categoryShow->name ?? 'Null'}}</h1>
	                <ul class="breadcrumbs">
	                    <li><a href="{{ route('home')}}">Home</a></li>
	                    <li class="active">{{ $categoryShow->name ?? 'Null'}}</li>
	                </ul>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- Sub Banner end -->
	<!-- Services start -->
	<div class="services content-area">
	    <div class="container">
	        <!-- Main title -->
	        <div class="main-title">
	            <h1>Property Services</h1>
	            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
	        </div>
	        <div class="row">
	        	@foreach($services as $service)
	            <div class="col-lg-4 col-md-6 col-sm-12">
	                <div class="service-info-1">
	                    <i class="{{ $service->icon ?? 'Null'}}"></i>
	                    <h3>{{ $service->title ?? 'Null'}}</h3>
	                    <p><?php $des =  strip_tags(html_entity_decode($service->description))?>
                          {{ Str::limit($des, $limit = 300, $end = '. . .') }}</p>
	                    <a href="#" class="read-more">
	                        Read More
	                    </a>
	                </div>
	            </div>
	            @endforeach
	        </div>
	    </div>
	</div>
	<!-- Services end -->
	@endif
	@if($categoryShow->slug == 'blog')
	<!--Page Header Start-->
    <!--Page Header End-->
	@php
		$blogs = App\Models\Blog::where('status', 1)->latest()->get();
	@endphp
	<section class="blog section-padding bg-navy">
		<div class="container">
		<div class="row">
			@php
				$sections = App\Models\Section::orderBy('created_at','asc')->skip(5)->take(1)->get();
			@endphp
			<div class="col-md-12">
				@foreach($sections as $section)
				<div class="section-subtitle"><span>{{ $section->name ?? 'Null'}}</span></div>
				<div class="section-title"><span>{{ $section->title ?? 'Null'}}</span></div>
				@endforeach
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="owl-carousel owl-theme">
				@foreach($blogs as $blog)
					<div class="item">
					<div class="position-re o-hidden">
						<img src="{{ asset($blog->blog_image) }}" alt="">
						<div class="date">
							<a href="{{ route('tour.single.blog',$blog->slug)}}"> <span>{{ $blog->created_at->format('l jS \\of F Y h:i:s A') }}</span> <i></i> </a>
							<span>
							<a href="{{ route('tour.single.blog',$blog->slug)}}">
								
								<i class="flaticon-placeholder"></i>
							</a>
							{{ $blog->view ?? '0'}} Views</span>
						</div>
					</div>
					<div class="con">
						<span class="category">
							<a href="{{ route('tour.single.blog',$blog->slug)}}">{{ $blog->title ?? 'Null'}}</a>
						</span>
						<h5><a href="{{ route('tour.single.blog',$blog->slug)}}"> <?php $des =  strip_tags(html_entity_decode($blog->description))?>
							{{ Str::limit($des, $limit = 120, $end = '. . .') }}</a></h5>
					</div>
					</div>
				@endforeach
				</div>
			</div>
		</div>
		</div>
	</section>
	@endif
	@if($categoryShow->slug == 'tours')
	@php
	   $tours = App\Models\Tour::where('status', 1)->latest()->get();
	@endphp
	<style>
		.tour_single_image{
			width: 100%;
			height: 433px;
		}
	</style>
	<!-- property section start -->
	 <!-- Tours 1 -->
	 <section class="tours1 section-padding bg-lightnav" data-scroll-index="1">
		<div class="container">
		   <div class="row">
			  <div class="col-md-12">
				<div class="section-title"><span>All Tours</span></div>
			  </div>
		   </div>
		   <div class="row">
			 @foreach($tours as $tour)
			  <div class="col-md-4">
				 <div class="item">
					<div class="position-re o-hidden">
					  <img class="tour_single_image" src="{{ asset($tour->image) }}" alt="">
				   </div>
				   @php
						 if($tour->discount_type == 1){
							$price_after_discount = $tour->regular_price - $tour->discount_price;
						 }elseif($tour->discount_type == 2){
							$price_after_discount = $tour->regular_price - ($tour->regular_price * $tour->discount_price / 100);
						 }
				   @endphp
				   @if ($tour->discount_price > 0)
					<span class="category">
						<a href="#0">
							৳{{ number_format($price_after_discount, 2) }}
							<del>৳ {{ number_format($tour->regular_price, 2) }}</del>
						</a>
					</span>
					@else
					<span class="category">
						<a href="#0">
							৳{{ number_format($tour->regular_price, 2) }}
						</a>
					</span>
					@endif
					<div class="con">
					   <h5><a href="{{ route('tour.details',$tour->slug) }}">{{ $tour->tour_country }}</a> </h5>
					   <div class="line"></div>
					   <div class="row facilities">
						  <div class="col col-md-12">
							 <ul>
								<li><i class="ti-time"></i> {{ $tour->tour_day }} Days</li>
								<li><i class="ti-user"></i> {{ $tour->views ?? '0' }}+</li>
								<li><i class="ti-location-pin"></i> {{ $tour->tour_country }}</li>
							 </ul>
						  </div>
					   </div>
					</div>
				 </div>
			  </div>
			 @endforeach
		   </div>
		</div>
	 </section>
	<!-- property section end -->
	@endif

	<!-- start contact us section -->
	@if($categoryShow->slug == 'contact-us')
	<!-- Contact 1 start -->
	 <!-- Contact -->
	 <section class="contact section-padding">
        <div class="container">
            <div class="row mb-90">
                <div class="col-md-6 mb-60">
                    <h3>Our Contact Us</h3>
                    <div class="phone-call mb-30">
                        <div class="icon"><span class="flaticon-phone-call"></span></div>
                        <div class="text">
                            <p>Phone</p> <a href="tel:{{ get_setting('phone')->value ?? 'null'}}">{{ get_setting('phone')->value ?? 'null'}}</a>
                        </div>
                    </div>
                    <div class="phone-call mb-30">
                        <div class="icon"><span class="flaticon-message"></span></div>
                        <div class="text">
                            <p>e-Mail Address</p> <a href="mailto:{{ get_setting('email')->value ?? 'null' }}">{{ get_setting('email')->value ?? 'null' }}</a>
                        </div>
                    </div>
                    <div class="phone-call">
                        <div class="icon"><span class="flaticon-placeholder"></span></div>
                        <div class="text">
                            <p>Location</p> {{ get_setting('business_address')->value ?? 'null'}}
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mb-30 offset-md-1">
                    <div class="sidebar">
                        <div class="right-sidebar">
                            <div class="right-sidebar item">
                                <h2>Get in touch</h2>
                                <form method="post" class="right-sidebar item-form contact__form" action="#">
                                    <!-- form message -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="alert alert-success contact__msg" style="display: none" role="alert"> Your message was sent successfully. </div>
                                        </div>
                                    </div>
                                    <!-- form elements -->
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input name="name" type="text" placeholder="Your Name *" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input name="email" type="email" placeholder="Your Email *" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input name="phone" type="text" placeholder="Your Number *" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input name="subject" type="text" placeholder="Subject *" required>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <textarea name="message" id="message" cols="30" rows="4" placeholder="Message *" required></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="butn-dark" type="submit"><a href="#"><span>Send Message</span></a></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Map Section -->
            <div class="row">
                <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1573147.7480448114!2d-74.84628175962355!3d41.04009641088412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25856139b3d33%3A0xb2739f33610a08ee!2s1616%20Broadway%2C%20New%20York%2C%20NY%2010019%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1646760525018!5m2!1str!2str" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
	<!-- Contact 1 end -->
	@endif
	<!-- end contact us section -->
@endsection
