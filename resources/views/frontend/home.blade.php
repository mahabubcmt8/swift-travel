@extends('layouts.frontend')
@section('content-frontend')
 <!-- Tour Search -->
 {{-- <div class="booking-wrapper">
    <div class="container">
       <div class="tour-inner clearfix form-inline justify-content-center">
          <form action="https://duruthemes.com/demo/html/travol/multipage-image/tours.html" class="form1 clearfix">
             <div class="col1 c1">
                <div class="input2_wrapper">
                   <label>Where to?</label>
                   <div class="input2_inner">
                      <input type="text" class="form-control input" placeholder="Where to?">
                   </div>
                </div>
             </div>
             <div class="col1 c2">
                <div class="select1_wrapper">
                   <label>Destinations</label>
                   <div class="select1_inner">
                      <select class="select2 select" style="width: 100%">
                         <option value="0">Destinations</option>
                         <option value="1">Greece</option>
                         <option value="2">London</option>
                         <option value="3">Maldives</option>
                         <option value="4">Paris</option>
                         <option value="5">Rome</option>
                      </select>
                   </div>
                </div>
             </div>
             <div class="col1 c4">
                <div class="select1_wrapper">
                   <label>Duration</label>
                   <div class="select1_inner">
                      <select class="select2 select" style="width: 100%">
                         <option value="0">Duration</option>
                         <option value="1">1 Day Tour</option>
                         <option value="2">2-4 Days Tour</option>
                         <option value="3">5-7 Days Tour</option>
                         <option value="4">7+ Days Tour</option>
                      </select>
                   </div>
                </div>
             </div>
             <div class="col1 c5">
                <button type="submit" class="btn-form1-submit"><i class="ti-search"></i> Find Now</button>
             </div>
          </form>
       </div>
    </div>
 </div> --}}
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
 @php
   $tours = App\Models\Tour::where('status', 1)->latest()->get();
 @endphp
 <!-- Tours 1 -->
 <style>
   .tour_single_image{
      width: 100%;
      height: 433px;
   }
</style>
 <section class="tours1 section-padding bg-lightnav" data-scroll-index="1">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
            @php
               $sections = App\Models\Section::orderBy('created_at','asc')->take(1)->get();
            @endphp
             @foreach($sections as $section)
               <div class="section-subtitle"><span>{{ $section->name }}</span></div>
               <div class="section-title"> <span>{{ $section->title }}</span></div>
             @endforeach
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
 <!-- Numbers -->
@php
 $counters = App\Models\Counter::where('status', 1)->latest()->get();
@endphp
 <section class="numbers">
    <div class="section-padding bg-img bg-fixed back-position-center" data-background="{{ asset('frontend/img/slider/15.jpg ')}}" data-overlay-dark="6">
       <div class="container">
          <div class="row">
            @foreach($counters as $counter)
             <div class="col-md-3">
                <div class="item text-center">
                   <span class="icon">
                   <i class="{{ $counter->icon }}"></i>
                   <i class="back flaticon-air-freight"></i>
                   </span>
                   <h3 class="count">{{ $counter->counter_no }}</h3>
                   <h6>{{ $counter->title }}</h6>
                </div>
             </div>
            @endforeach
          </div>
       </div>
    </div>
 </section>
 @php
   $tours_popular = App\Models\Tour::where('status',1)->where('is_popular',1)->latest()->get();
 @endphp
 <!-- Destination 1 -->
 <section class="destination1 section-padding bg-lightnav">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
            @php
               $sections = App\Models\Section::orderBy('created_at','asc')->skip(1)->take(1)->get();
            @endphp
            @foreach($sections as $section)
               <div class="section-subtitle"><span>{{ $section->name }}</span></div>
               <div class="section-title"> <span>{{ $section->title }}</span></div>
            @endforeach
          </div>
       </div>
       <div class="row">
          <div class="col-md-12">
             <div class="owl-carousel owl-theme">
               @foreach ($tours_popular as $item )
               <div class="item">
                  <div class="position-re o-hidden">
                     <img class="owl_image" src="{{ asset($item->image)}}" alt="">
                  </div>
                  <span class="category"><a href="#0">New</a></span>
                  <div class="con">
                     <h5>
                        <a href="{{ route('tour.details',$item->slug) }}"><i class="ti-location-pin"></i>{{ $item->tour_country }}</a>
                     </h5>
                     <div class="line"></div>
                     <div class="row facilities">
                        <div class="col col-md-8">
                           {{-- <p>4 Tour Packages</p> --}}
                        </div>
                        <div class="col col-md-4 text-right">
                           <div class="permalink"><a href="{{ route('tour.details',$item->slug) }}">Explore <i class="ti-arrow-right"></i></a></div>
                        </div>
                     </div>
                  </div>
               </div> 
               @endforeach
             </div>
          </div>
       </div>
    </div>
 </section>
 @php
   $video = App\Models\Video::where('status',1)->latest()->first() ?? '';
 @endphp
 <!-- Banner Tour Video -->
 <section class="dynamic-video-wrapper" data-overlay-dark="3">
    <video width="100%" height="100%" autoplay="autoplay" muted preload="auto" loop="loop">
       <source src="{{ $video->video_url ?? '' }}" type="video/mp4">
    </video>
    <div class="wrap-content v-middle">
       <div class="container">
          <div class="row">
             <div class="col-md-8 offset-md-2">
                <h1>{{ $video->title ?? '' }}</h1>
                <h4><i class="ti-location-pin"></i> {{ $video->tour_country ?? '' }} &nbsp;&nbsp; <i class="ti-timer"></i> {{ $video->tour_day ?? '' }}</h4>
             </div>
          </div>
       </div>
    </div>
 </section>
 <style>
   .owl_image {
      display: block;
      width: 100%;
      height: 433px;
   }
 </style>
 <!-- Italy & France Tours 1 -->
 <section class="tours1 section-padding">
    <div class="container">
       <div class="row mb-30">
          <div class="col-md-12">
            @php
               $sections = App\Models\Section::orderBy('created_at','asc')->skip(2)->take(1)->get();
            @endphp
            @foreach($sections as $section)
               <div class="section-subtitle"><span>{{ $section->name }}</span></div>
               <div class="section-title"> <span>{{ $section->title }}</span></div>
            @endforeach
          </div>
       </div>
       @php
       $tours_popular = App\Models\Tour::where('status',1)->where('is_popular',1)->latest()->get();
     @endphp
       <!-- Italy Tours -->
      @foreach ($tours_popular as $item )
       <div class="row mb-90">
          <div class="col-md-5">
             <div class="country country1 mt-30">
                <div class="section-title2">{{ $item->tour_country }}</div>
                <p style="text-align: justify;">{{ $item->description }}</p>
                <div class="row tour-list">
                   <div class="col-md-6">
                      <ul>
                        <li><i class="ti-location-pin"></i> <a href="#" class="link-btn">{{ $item->tour_division }}</a></li>
                      </ul>
                   </div>
                </div>
                <div class="butn-dark mt-30 mb-30"> <a href="" ><span>All Tours <i class="ti-arrow-right"></i></span></a> </div>
             </div>
          </div>
          <div class="col-md-7">
             <div class="owl-carousel owl-theme">
                <div class="item">
                   <div class="position-re o-hidden"><img class="owl_image" src="{{ asset($item->image) }}" alt=""></div>
                     @php
                        if($item->discount_type == 1){
                           $price_after_discount = $item->regular_price - $item->discount_price;
                        }elseif($tour->discount_type == 2){
                           $price_after_discount = $item->regular_price - ($item->regular_price * $item->discount_price / 100);
                        }
                     @endphp
                    @if ($item->discount_price > 0)
                        <span class="category">
                           <a href="#0">
                              ৳{{ number_format($price_after_discount, 2) }}
                              <del>৳ {{ number_format($item->regular_price, 2) }}</del>
                           </a>
                        </span>
                     @else
                        <span class="category">
                           <a href="#0">
                              ৳{{ number_format($item->regular_price, 2) }}
                           </a>
                        </span>
                     @endif
                   <div class="con">
                      <h5><a href="{{ route('tour.details',$tour->slug) }}">{{ $item->tour_division }}</a> </h5>
                      <div class="line"></div>
                      <div class="row facilities">
                         <div class="col col-md-12">
                            <ul>
                               <li><i class="ti-time"></i> {{ $item->tour_day }} Days</li>
                               <li><i class="ti-user"></i> {{ $item->views ?? '0' }}+</li>
                               {{-- <li><i class="ti-location-pin"></i> Italy</li> --}}
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       @endforeach
    </div>
 </section>
 <!-- Blog -->
 @php
 $blogs = App\Models\Blog::where('status', 1)->latest()->get();
@endphp
 <section class="blog section-padding bg-navy">
    <div class="container">
      <div class="row">
         @php
            $sections = App\Models\Section::orderBy('created_at','asc')->skip(3)->take(1)->get();
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
                         <a href="{{ route('tour.single.blog',$blog->slug)}}">
                           <span>
                              @if($blog->created_by == 1)
                                 {{ $blog->created_at->format('l jS \\of F Y h:i:s A') }}
                              @else
                                 {{ $blog->updated_at->format('l jS \\of F Y h:i:s A') }}
                              @endif
                           </span> <i></i> </a>
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
 @php
 $testimonials = App\Models\Testimonial::where('status', 1)->latest()->get();
@endphp
 <!-- Testimonials -->
 <section class="testimonials">
    <div class="background bg-img bg-fixed section-padding pb-0" data-background="{{ asset('frontend/img/slider/15.jpg')}}" data-overlay-dark="5">
       <div class="container">
          <div class="row">
            
             <!-- Call Now  -->
             <div class="col-md-5 mb-30 mt-30">
                <p><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></p>
                <h5>We Provide Top Destinations Expecially For You Book Now and Enjoy!</h5>
                <div class="phone-call mb-10">
                   <div class="icon color-1"><span class="flaticon-phone-call"></span></div>
                   <div class="text">
                      <p class="color-1">Call Now</p>
                      <a class="color-1" href="tel:{{ get_setting('phone')->value ?? 'null'}}">{{ get_setting('phone')->value ?? 'null'}}</a>
                   </div>
                </div>
                <p><i class="ti-check"></i><small>Call us, it's toll-free.</small></p>
             </div>
             <!-- Booking From -->
             <div class="col-md-5 offset-md-2">
               @php
                  $sections = App\Models\Section::orderBy('created_at','asc')->skip(4)->take(1)->get();
               @endphp
                <div class="testimonials-box">
                  @foreach($sections as $section)
                   <div class="head-box">
                      <h6>{{ $section->name ?? 'Null'}}</h6>
                      <h4>{{ $section->title ?? 'Null'}}</h4>
                   </div>
                  @endforeach
                   <div class="owl-carousel owl-theme">
                     @foreach($testimonials as $testimonial)
                      <div class="item">
                         <p><?php $des =  strip_tags(html_entity_decode($testimonial->description))?>
                           {{ Str::limit($des, $limit = 120, $end = '. . .') }}</p>
                         <div class="info">
                            <div class="author-img"> <img src="{{ asset($testimonial->image) }}" alt=""> </div>
                            <div class="cont">
                               <div class="rating"> <i class="star active"></i> <i class="star active"></i> <i class="star active"></i> <i class="star active"></i> <i class="star active"></i> </div>
                               <h6>{{ $testimonial->name ?? 'Null'}}</h6>
                               <span>Guest review</span>
                            </div>
                         </div>
                      </div>
                      @endforeach
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 @php
   $brands = App\Models\Brand::where('status', 1)->latest()->get();
@endphp
 <!-- Clients -->
 <section class="clients">
    <div class="container">
       <div class="row">
          <div class="col-md-7">
             <div class="owl-carousel owl-theme">
               @foreach($brands as $brand)
                <div class="clients-logo">
                   <a href="#0"><img src="{{ asset($brand->image)}}" alt=""></a>
                </div>
                @endforeach
             </div>
          </div>
       </div>
    </div>
 </section>
@endsection
