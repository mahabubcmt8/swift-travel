@extends('layouts.frontend')
@section('content-frontend')
 <!-- Tour Content -->
 <section class="tour-page section-padding" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-30">
                <div class="section-subtitle">Travel Agency</div>
                <div class="section-title mb-0">{{ $tour->title }} <span>{{ $tour->tour_country }}</span></div>
                <div class="rating mb-30"> <i class="star active"></i> <i class="star active"></i> <i class="star active"></i> <i class="star active"></i> <i class="star active"></i>
                    <div class="reviews-count color-2">(2 Reviews)</div>
                </div>
                <div class="tour-page head-icon">
                    <p><i class="ti-time"></i> {{ $tour->day }} Days </p>
                    <p><i class="ti-user"></i> Group: {{ $tour->tour_group }} People</p>
                    <p><i class="ti-location-pin"></i> {{ $tour->tour_country }}</p>
                    <p><i class="ti-face-smile"></i> {{ $tour->views }}</p>
                </div>
                <h6>Information</h6>
                <p class="mb-30">{{ $tour->description }}</p>
                <!-- tour-page time-table -->
                <div class="tour-page time-table"> <span>Departure</span>
                    <p>{{ $tour->depture }}</p>
                </div>
                <div class="tour-page time-table"> <span>Departure Time</span>
                    <p>{{ $tour->depture_time }}</p>
                </div>
                <div class="tour-page time-table"> <span>Return Time</span>
                    <p>{{ $tour->return_time }}</p>
                </div>
                <div class="tour-page time-table"> <span>Dress Code</span>
                    <p>{{ $tour->dress_code }}</p>
                </div>
                <div class="tour-page time-table-price"> <span>Price Includes</span>
                    <ul class="tour-page time-table-price-include">
                        <li><i class="ti-check"></i> {{  $tour->price_includes }}</li>
                    </ul>
                </div>
                <div class="tour-page time-table-price"> <span>Price Excludes</span>
                    <ul class="tour-page time-table-price-exclude">
                        <li><i class="ti-close"></i>  {{  $tour->price_excludes }} </li>
                    </ul>
                </div>
                <br>
                <br>
                @php
                    $tours = App\Models\Tour::where('status',1)->get();
                @endphp
                <!-- Gallery -->
                <h6 class="mb-0">Tour Gallery</h6>
                <div class="row">
                    @foreach ($tours as $item )
                    <div class="col-md-4 gallery-item">
                        <a href="{{ route('tour.details',$item->slug) }}" title="" class="">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="{{ asset($item->image) }}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <br>
                <br>
                <!-- FAQ's -->
            </div>
            <!-- sidebar -->
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="right-sidebar">
                        <div class="right-sidebar item">
                            <h3>
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
                            </h3>
                            <form method="post" class="right-sidebar item-form" action="#">
                                <div class="row">
                                    <!--<div class="col-md-12 form-group">-->
                                    <!--    <input name="name" type="text" placeholder="Full Name" required>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-12 form-group">-->
                                    <!--    <input name="email" type="email" placeholder="Email Address" required>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-12 form-group input1_inner">-->
                                    <!--    <input type="text" class="form-control input datepicker" placeholder="Travel Date" required>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-12 form-group">-->
                                    <!--    <input name="people" type="text" placeholder="People" required>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-12 form-group">-->
                                    <!--    <textarea name="message" id="message" cols="30" rows="4" placeholder="Your Enquiry"></textarea>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-12">-->
                                    <!--</div>-->
                                       
                                <button type="button" class="butn-dark"><a href="{{ $tour->booking_link ?? '#' }}" target="_blank" ><span>Book Now</span></a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection