@extends('layouts.frontend')
@section('content-frontend')
<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{asset('frontend/assets/images/backgrounds/page-header-bg.jpg')}})">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span>/</span></li>
                <li>Contact</li>
            </ul>
            <h2>contact us</h2>
        </div>
    </div>
</section>
<!--Page Header End-->
<!--Google Map Start-->
<section class="google-map">
<div class="container">
    <div class="google-map-box">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
            class="google-map__one" allowfullscreen>
        </iframe>
    </div>
    <div class="contact-details">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="contact-details__single">
                    <div class="contact-details__icon">
                        <span class="icon-help"></span>
                    </div>
                    <div class="contact-details__text">
                        <p>Have Question?</p>
                        <h3><a href="tel:{{ get_setting('phone')->value ?? 'null' }}">{{ get_setting('phone')->value ?? 'null' }}</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="contact-details__single">
                    <div class="contact-details__icon">
                        <span class="icon-mailbox"></span>
                    </div>
                    <div class="contact-details__text">
                        <p>Write Email</p>
                        <h3><a href="mailto:{{ get_setting('email')->value ?? 'null' }}">{{ get_setting('email')->value ?? 'null' }}</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="contact-details__single contact-details__single-last">
                    <div class="contact-details__icon">
                        <span class="icon-maps-and-flags"></span>
                    </div>
                    <div class="contact-details__text">
                        <p>Visit Office</p>
                        <h3>{{ get_setting('business_address')->value ?? 'null' }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="contact-details__single">
                    <div class="contact-details__social">
                        <a target="_blank" href="{{ get_setting('twitter_url')->value ?? 'null' }}"><i class="fab fa-twitter"></i></a>
                        <a target="_blank" href="{{ get_setting('facebook_url')->value ?? 'null' }}"><i class="fab fa-facebook"></i></a>
                        <a target="_blank" href="{{ get_setting('pinterest_url')->value ?? 'null' }}"><i class="fab fa-pinterest-p"></i></a>
                        <a target="_blank" href="{{ get_setting('instagram_url')->value ?? 'null' }}"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!--Google Map End-->
<!--Contact Two Start-->
<section class="contact-two">
    <div class="contact-two__shape-1 float-bob-x">
        <img src="{{ asset('frontend/assets/images/shapes/contact-two-shape-1.png ') }}" alt="">
    </div>
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Write a Message</span>
            <h2 class="section-title__title">Always here to help you</h2>
            <div class="section-title__icon">
                <img src="{{ asset('frontend/assets/images/icon/section-title-icon-1.png ')}}" alt="">
            </div>
        </div>
        <div class="contact-two__form-box">
            <form action="#" class="contact-two__form contact-form-validated"
                novalidate="novalidate">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="text" placeholder="Your Name" name="name">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="email" placeholder="Email Address" name="email">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="text" placeholder="Phone" name="Phone Number">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="text" placeholder="Subject" name="Subject">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="contact-form__input-box text-message-box">
                            <textarea name="message" placeholder="Write a Comment"></textarea>
                        </div>
                        <div class="contact-form__btn-box">
                            <a href="#" class="thm-btn contact-two__btn">Send a Message<i
                                    class="icon-right-arrow"></i> </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!--Contact Two End-->
@endsection
