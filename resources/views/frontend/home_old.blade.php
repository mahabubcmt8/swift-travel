@extends('layouts.frontend')
@section('content-frontend')
<!-- Banner start -->
@php
	$sliders = App\Models\Slider::where('status', 1)->latest()->get();
@endphp
<div class="banner text-center" id="banner2">
 <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
       <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
       <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
       <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
    	@foreach($sliders->take(3) as $slider)
       <div class="carousel-item item-bg @if($loop->first) active @endif">
          <img class="d-block w-100 h-100" src="{{asset($slider->slider_img) }}" alt="banner-photo">
          <div class="carousel-caption banner-slider-inner d-flex h-100">
             <div class="banner-content container align-self-center text-center">
                <h1>{{ $slider->title }}</h1>
                <p>{!! $slider->description !!}</p>
                <a class="btn-2 btn-defaults" href="#">
                <span>Get Started Now</span> <i class="arrow"></i>
                </a>
                <a class="btn-1 btn-outline-1" href="#">
                <span>Learn More</span> <i class="arrow"></i>
                </a>
             </div>
          </div>
       </div>
       @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
    </button>
 </div>
</div>
@php
   $abouts = App\Models\About::where('status', 1)->latest()->get();
@endphp
<!-- About real estate start -->
<div class="about-real-estate-2">
    <div class="container">
        <div class="row">
            @foreach($abouts as $about)
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="about-img-section">
                    <div class="image-box sssa">
                        <div class="image-1">
                           <img src="{{ asset($about->image) }}" class="w-100" alt="photo">
                        </div>
                    </div>
                    <div class="about-box-Experience">
                        <img src="{{ asset('frontend/assets/img/about-shape.png ') }}" alt="image" class="img-fluid">
                        <div class="content">
                           <h3>{{ $about->experience_no }}</h3>
                           <p class="mb-0">{{ $about->experience_title }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 align-self-center">
                <div class="about-text clearfix">
                    <h1>{!! $about->title !!}</h1>
                    <p>
                        <?php $des =  strip_tags(html_entity_decode($about->description))?>
                        {{ Str::limit($des, $limit = 850, $end = '. . .') }}
                     </p>
                    <div class="bottom">
                        <div class="left">
                           <a class="btn-2 btn-defaults" href="https://ssbanglagroup.com/category/about">
                              <span>Read More</span> <i class="arrow"></i>
                          </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@php
   $propertys = App\Models\Property::where('status', 1)->latest()->get();
@endphp
<!-- About real estate end -->
      <!-- Featured properties start -->
      <div class="content-area featured-properties">
         <div class="container">
            <!-- Main title -->
            @php
               $sections = App\Models\Section::orderBy('created_at','asc')->take(1)->get();
            @endphp
            <div class="main-title-2">
               @foreach($sections as $section)
               <h1><span>{{ $section->name ?? 'Null'}}</span></h1>
               <p>{{ $section->title ?? 'Null'}}</p>
               @endforeach
               <div class="title-border">
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
               </div>
            </div>
            <div class="row wow fadeInUp delay-04s">
               @foreach($propertys->take(9) as $property)
               <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <div class="property-3">
                     <img src="{{ asset($property->thumbnail_image) }}" alt="photo" class="img-fluid w-100">
                     @if($property->property_purpose_id == 1)
                        <div class="featured-tag2">For Rent</div>
                     @elseif($property->property_purpose_id == 2)
                        <div class="sale-tag">For Sale</div>
                     @endif
                     <div class="ling-section">
                        <h3>
                           <a href="{{ route('property.single.page',$property->slug)}}">{{ $property->title }}</a>
                        </h3>
                        <ul class="facilities-list">
                           <li>{{ $property->number_of_bedroom }} Beds</li>
                           <li>{{ $property->number_of_bathroom }} Baths</li>
                           <li>{{ $property->area }} SQ FT</li>
                           <li>{{ $property->number_of_parking }} Garage</li>
                           <li><i class="fa-solid fa-eye"></i> <span>{{ $property->views ?? '0'}}</span> Views</li>
                        </ul>
                        <a href="{{ route('property.single.page',$property->slug)}}" class="read-more-btn">Read More</a>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      <!-- Featured properties end -->
      <!-- Our service start -->
      <div class="our-service">
         <div class="container">
            <!-- Main title -->
            @php
               $sections = App\Models\Section::orderBy('created_at','asc')->skip(1)->take(1)->get();
            @endphp
            <div class="main-title-2">
               @foreach($sections as $section)
               <h1><span>{{ $section->name ?? 'Null'}}</span></h1>
               <p>{{ $section->title ?? 'Null'}}</p>
               @endforeach
               <div class="title-border">
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
               </div>
            </div>
            @php
               $services = App\Models\Service::where('status', 1)->latest()->get();
            @endphp
            <div class="row">
               @foreach($services as $service )
               <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInLeft delay-04s">
                  <div class="service-info-1">
                     <i class="{{ $service->icon ?? 'Null'}}"></i>
                     <h3>{{ $service->title ?? 'Null'}}</h3>
                     <p><?php $des =  strip_tags(html_entity_decode($service->description))?>
                          {{ Str::limit($des, $limit = 70, $end = '. . .') }}</p>
                     <a  href="https://ssbanglagroup.com/category/services" class="read-more">
                        Read More
                     </a>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      <!-- Our service end -->
@php
   $property_recently = App\Models\Property::where('status', 1)->latest()->get();
@endphp
      <!-- Recently properties start -->
      <div class="content-area comon-slick recently-properties clearfix">
         <div class="container">
            <!-- Main title -->
            @php
               $sections = App\Models\Section::orderBy('created_at','asc')->skip(2)->take(1)->get();
            @endphp
            <div class="main-title">
               @foreach($sections as $section)
               <h1><span>{{ $section->name ?? 'Null'}}</span></h1>
               <p>{{ $section->title ?? 'Null'}}</p>
               @endforeach
               <div class="title-border">
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
                  <div class="title-border-inner"></div>
               </div>
            </div>
            <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
               @foreach($property_recently->take(5) as $recently)
               <div class="item slide-box wow fadeInRight delay-04s">
                  <div class="property-2">
                     <div class="property-inner">
                        <div class="property-overflow">
                           <div class="property-photo">
                              <img src="{{ asset($property->thumbnail_image) }}" alt="rp" class="img-fluid">
                              <div class="listing-badges">
                                 @if($property->property_purpose_id == 1)
                                    <span class="featured">For Rent</span>
                                 @elseif($property->property_purpose_id == 2)
                                    <span class="featured active">For Sale</span>
                                 @endif
                              </div>
                              <div class="price-ratings">
                                 <div class="price">${{ $property->price }}</div>
                              </div>
                           </div>
                        </div>


                        <!-- content -->
                        <div class="content" >
                           <!-- title -->
                           <h4 class="title">
                              <a href="{{ route('property.single.page',$recently->slug)}}">{{ $recently->title }}</a>
                           </h4>
                           <!-- Property address -->
                           <h3 class="property-address">
                              <a href="#">
                              <i class="fa fa-map-marker"></i>
                              {{ $recently->city->name  ?? 'Null' }},
                              {{ $recently->city->countryState->name  ?? 'Null' }},
                              {{ $recently->city->countryState->country->name  ?? 'Null' }}
                              </a>
                           </h3>
                        </div>
                        <!-- Facilities List -->
                        <ul class="facilities-list clearfix">
                           <li>
                              <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                              <span>{{ $recently->area }} sq ft</span>
                           </li>
                           <li>
                              <i class="flaticon-bed"></i>
                              <span>{{ $recently->number_of_bedroom }} Bed</span>
                           </li>
                           <li>
                              <i class="flaticon-holidays"></i>
                              <span>{{ $recently->number_of_bathroom }}  Bath</span>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      <!-- Recently Partners block end -->
      @php
         $counters = App\Models\Counter::where('status', 1)->latest()->get();
      @endphp
      <!-- Counters 2 strat -->
      <div class="counters-2">
         <div class="container">
            <div class="row g-0">
               @foreach($counters as $counter)
               <div class="col-lg-3 col-md-6 col-sm-6 border-r border-l">
                  <div class="counter-box-2">
                     <i class="{{ $counter->icon }}"></i>
                     <h1 class="counter">{{ $counter->counter_no }}</h1>
                     <p>{{ $counter->title }}</p>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      <!-- Counters 2 end -->
      <!-- Agent section start -->
      @php
         $agents = App\Models\Agent::where('status', 1)->latest()->get();
      @endphp
      <div class="agent-section content-area-17 comon-slick mt-5">
          <div class="container">
              <!-- Main title -->
            @php
               $sections = App\Models\Section::orderBy('created_at','asc')->skip(3)->take(1)->get();
            @endphp
              <div class="main-title">
               @foreach($sections as $section)
                  <h1><span>{{ $section->name ?? 'Null'}}</span></h1>
                  <p>{{ $section->title ?? 'Null'}}</p>
               @endforeach
              </div>
              <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                  @foreach($agents as $agent)
                  <div class="item slide-box wow fadeInRight delay-04s">
                      <div class="agent-1">
                          <div class="member-thumb">
                              <img src="{{asset($agent->image) }}" alt="agent-1" class="img-fluid w-100">
                          </div>
                          <div class="member-content-wrap">
                              <div class="member-name-designation">
                                  <h4 class="member-name">
                                      <a href="#">{{ $agent->name ?? 'Null'}}</a>
                                  </h4>
                                  <p class="member-designation">{{ $agent->designation ?? 'Null'}}</p>
                                  <div class="social-list clearfix">
                                     <a target="_blank" href="{{ $agent->facebook_url ?? 'Null'}}" class="facebook-bg">
                                    <i class="fa-brands fa-facebook"></i>
                                    </a>
                                    <a target="_blank" href="{{ $agent->twitter_url ?? 'Null'}}" class="twitter-bg">
                                       <i class="fa-brands fa-twitter"></i>
                                    </a>
                                    <a target="_blank" href="{{ $agent->linkedin_url ?? 'Null'}}" class="google-bg">
                                       <i class="fa-brands fa-linkedin"></i>
                                    </a>
                                    <a target="_blank" href="{{ $agent->whatsapp_url ?? 'Null'}}" class="rss-bg">
                                       <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                  </div>
                              </div>
                          </div>
                          <div class="team-hover-content">
                              <div class="member-thumb">
                                  <img src="{{asset($agent->image) }}" alt="agent-1" class="img-fluid w-100 h-100">
                              </div>
                              <div class="member-name-designation">
                                  <h4 class="member-name">
                                      <a href="#">{{ $agent->name ?? 'Null'}}</a>
                                  </h4>
                                  <p class="member-designation">{{ $agent->designation ?? 'Null'}}</p>
                              </div>
                              <div class="member-socials">
                                 <a target="_blank" href="{{ $agent->facebook_url ?? 'Null'}}" class="facebook-bg">
                                    <i class="fa-brands fa-facebook"></i>
                                 </a>
                                 <a target="_blank" href="{{ $agent->twitter_url ?? 'Null'}}" class="twitter-bg">
                                    <i class="fa-brands fa-twitter"></i>
                                 </a>
                                 <a target="_blank" href="{{ $agent->linkedin_url ?? 'Null'}}" class="google-bg">
                                    <i class="fa-brands fa-linkedin"></i>
                                 </a>
                                 <a target="_blank" href="{{ $agent->whatsapp_url ?? 'Null'}}" class="rss-bg">
                                    <i class="fa-brands fa-whatsapp"></i>
                                 </a>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>
      </div>
      <!-- Agent section end -->

      @php
         $testimonials = App\Models\Testimonial::where('status', 1)->latest()->get();
      @endphp
      <!-- Testimonial 3 section start-->
      <div class="testimonials-3 content-area-7 comon-slick">
          <div class="container">
              <!-- Main title -->
            @php
               $sections = App\Models\Section::orderBy('created_at','asc')->skip(4)->take(1)->get();
            @endphp
              <div class="main-title main-title-5">
               @foreach($sections as $section)
                  <h1><span>{{ $section->name ?? 'Null'}}</span></h1>
                  <p>{{ $section->title ?? 'Null'}}</p>
               @endforeach
              </div>
              <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                  @foreach($testimonials as $testimonial)
                  <div class="item slide-box wow fadeInRight delay-04s">
                      <div class="testimonials-inner">
                          <div class="user">
                              <a href="#">
                                 <img class="media-object" src="{{ asset($testimonial->image) }}" alt="user">
                              </a>
                          </div>
                          <div class="testimonial-info">
                              <h3>
                                 {{ $testimonial->name ?? 'Null'}}
                              </h3>
                              <p>
                                 <?php $des =  strip_tags(html_entity_decode($testimonial->description))?>
                                 {{ Str::limit($des, $limit = 120, $end = '. . .') }}
                              </p>
                              <div class="rating">
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star-half-full"></i>
                                  <span>Reting</span>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>
      </div>
      <!-- Testimonial 3 end -->
      @php
         $blogs = App\Models\Blog::where('status', 1)->latest()->get();
      @endphp
      <!-- Blog start -->
      <div class="blog comon-slick content-area">
          <div class="container">
              <!-- Main title -->
            @php
               $sections = App\Models\Section::orderBy('created_at','asc')->skip(5)->take(1)->get();
            @endphp
              <div class="main-title">
               @foreach($sections as $section)
                  <h1><span>{{ $section->name ?? 'Null'}}</span></h1>
                  <p>{{ $section->title ?? 'Null'}}</p>
               @endforeach
              </div>
              <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                  @foreach($blogs as $blog)
                  <div class="item slide-box wow fadeInUp delay-04s">
                      <div class="blog-3">
                          <div class="blog-image">
                              <img src="{{ asset($blog->blog_image) }}" alt="blog-3" class="img-fluid w-100">
                              <div class="date-box">{{ $blog->created_at->format('l jS \\of F Y h:i:s A') }}</div>
                              <div class="post-meta clearfix">
                                  <span><a href="#"><i class="fa fa-user"></i></a>Admin</span>
                                  <span><a href="#"><i class="fa fa-calendar"></i></a> 17K</span>
                                  <span><a href="#"><i class="fa fa-comments"></i></a> 73k</span>
                                  <span>
                                    <a href="#">
                                       <i class="fa-solid fa-eye"></i>
                                    </a>
                                    {{ $blog->view ?? '0'}} Views</span>
                              </div>
                          </div>
                          <div class="detail">
                              <h4>
                                 <a href="{{ route('property.single.blog',$blog->slug)}}">{{ $blog->title ?? 'Null'}}</a>
                              </h4>
                              <p>
                                 <?php $des =  strip_tags(html_entity_decode($blog->description))?>
                                 {{ Str::limit($des, $limit = 120, $end = '. . .') }}
                              </p>
                              <a href="{{ route('property.single.blog',$blog->slug)}}" class="read-more">Read More...</a>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>
      </div>
      <!-- Blog end -->
@php
   $brands = App\Models\Brand::where('status', 1)->latest()->get();
@endphp
   <!-- Partners strat -->
   <div class="partners bg-white">
       <div class="container">
           <h4>Brands <span>$ Partners</span></h4>
           <div class="row">

               <div class="col-lg-12">
                  <div class="custom-slider slide-box-btn">
                      @foreach($brands as $brand)
                     <div class="custom-box">
                        <img src="{{ asset($brand->image)}}"alt="brand">
                     </div>
                       @endforeach
                   </div>
               </div>

           </div>
       </div>
   </div>
   <!-- Partners end -->
@endsection
