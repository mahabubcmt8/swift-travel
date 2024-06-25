@extends('layouts.frontend')
@section('content-frontend')
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>{{ $propertyShow->title ?? 'Null'}}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('home')}}">Home</a></li>
                    <li class="active">{{ $propertyShow->title ?? 'Null'}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Sub banner end -->

<!-- Properties details page start -->
<div class="content-area  properties-details-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <!-- Properties desciption start -->
                <div class="product-slider-box cds-2 clearfix mb-2">
                    <div class="product-img-slide">
                       
                        <div class="slider-for2">
                            @foreach($propertyShow->propertyImages as $property)
                            <img src="{{ asset($property->image) }}" class="img-fluid w-100" alt="slider-photo" width="750" height="180">
                            @endforeach
                        </div>
                        <div class="slider-nav2">
                            @foreach($propertyShow->propertyImages as $property)
                            <div class="thumb-slide">
                                <img src="{{ asset($property->image) }}" alt="small-photo" width="750" height="180">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Properties desciption end -->

                <!-- Header Properties start -->
                <div class="heading-properties clearfix sidebar-widget sw2">
                    <div class="pull-left">
                        <h3>{{ $propertyShow->title ?? 'Null'}}</h3>
                        <p>
                            <i class="fa fa-map-marker"></i>
                            {{ $propertyShow->city->name  ?? 'Null' }},
                            {{ $propertyShow->city->countryState->name  ?? 'Null' }},
                            {{ $propertyShow->city->countryState->country->name  ?? 'Null' }}
                        </p>
                    </div>
                    <div class="pull-right">
                        <h3><span>${{ $propertyShow->price ?? '0'}}</span></h3>
                        <h5>
                            Per Manth
                        </h5>
                    </div>
                </div>
                <!-- Header Properties end -->

                <!-- Properties details section start -->
                <div class="Properties-details-section sidebar-widget sw2">
                    <!-- Property description start -->
                    <div class="property-description tabbing tabbing-box tb2">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Condition</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Amenities</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab4" data-bs-toggle="tab" data-bs-target="#profile4" type="button" role="tab" aria-controls="profile4" aria-selected="false">Floor Plans</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="accordion accordion-flush" id="accordionFlushExample7">
                                    <div class="accordion-item">
                                        <div class="properties-description">
                                            <div class="main-title-4">
                                                <h1><span>Description</span></h1>
                                            </div>
                                            <p>{{ $propertyShow->description ?? 'Null'}}</p>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="accordion accordion-flush" id="accordionFlushExample2">
                                    <div class="accordion-item">
                                        <div class="properties-condition">
                                            <div class="main-title-4">
                                                <h1><span>Condition</span></h1>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        <li>
                                                            <i class="fa fa-check-square"></i>{{ $propertyShow->number_of_bedroom }} Beds
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-check-square"></i>{{ $propertyShow->number_of_bathroom }} Bathroom
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        <li>
                                                            <i class="fa fa-check-square"></i>{{ $propertyShow->area }} sq ft
                                                        </li>
                                                        <!-- <li>
                                                            <i class="fa fa-check-square"></i>TV
                                                        </li> -->
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        <li>
                                                            <i class="fa fa-check-square"></i>{{ $propertyShow->number_of_parking }} Garage
                                                        </li>
                                                       <!--  <li>
                                                            <i class="fa fa-check-square"></i>Balcony
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="accordion accordion-flush" id="accordionFlushExample3">
                                    <div class="accordion-item">
                                        <div class="properties-amenities">
                                            <div class="main-title-4">
                                                <h1><span>Amenities</span></h1>
                                            </div>
                                            <div class="row">
                                                @foreach($propertyShow->propertyAminities as $aminities)
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="amenities">
                                                        <li>
                                                            <i class="fa fa-check-square"></i>{{ $aminities->aminity->aminity ?? 'Null' }},
                                                        </li>
                                                    </ul>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                <div class="accordion accordion-flush" id="accordionFlushExample5">
                                    <div class="accordion-item">
                                        <div class="floor-plans">
                                            <div class="main-title-4">
                                                <h1><span>Floor</span> Plans</h1>
                                            </div>
                                            <table>
                                                <tbody><tr>
                                                    <td><strong>Size</strong></td>
                                                    <td><strong>Rooms</strong></td>
                                                    <td><strong>2 Bathrooms</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $propertyShow->area ?? '0' }}</td>
                                                    <td>{{ $propertyShow->number_off_room ?? '0' }}</td>
                                                    <td>{{ $propertyShow->number_off_bathroom ?? '0' }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <!-- <img src="img/properties/floor-plans.png" alt="floor-plans" class="img-fluid"> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Property description end -->
                </div>
                <!-- Properties details section end -->
            </div>
        </div>
    </div>
</div>
<!-- Properties details page end -->
@endsection