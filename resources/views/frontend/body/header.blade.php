<style>
   .nav-scroll .navbar-toggler-icon, .nav-scroll .icon-bar {
      color: #fff;
   }
</style>
<!-- Preloader -->
<div class="preloader-bg"></div>
<div id="preloader">
   <div id="preloader-status">
      <div class="preloader-position loader"> <span></span> </div>
   </div>
</div>

<!-- Progress scroll totop -->
<div class="progress-wrap cursor-pointer">
   <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
   </svg>
</div>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
   <div class="container">
      <!-- Logo -->
      <div class="logo-wrapper">
        <a class="" href="{{ route('home') }}">
            <img src="{{ asset(get_setting('site_logo')->value ?? 'null')}}" class="logo-img" alt="">
        </a>
      </div>
      <style>
        .nav-scroll {
            background: #2095ae !important;
        }
        .nav-scroll .navbar-nav .nav-link {
            color: #ffffff;
        }
      </style>
      <!-- Button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><i class="ti-menu"></i></span> </button>
      <!-- Menu -->
      <div class="collapse navbar-collapse" id="navbar">
         <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
               <a class="nav-link " href="{{ route('home') }}" role="button" data-bs-auto-close="outside" aria-expanded="false">Home</a>
            </li>
            @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.category.show',$category->slug) }}"> {{ $category->name ??'NULL'}}</a>
                </li>
            @endforeach
         </ul>
      </div>
   </div>
</nav>
@php
	$sliders = App\Models\Slider::where('status', 1)->latest()->get();
@endphp
<!-- Header Image -->
@foreach($sliders->take(1) as $slider)
<header class="header full-height valign bg-img bg-fixed" data-overlay-dark="4" data-background="{{asset($slider->slider_img) }}">
   <div class="image-fullscreen-wrap">
      <div class="v-middle caption overlay">
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <h4>{{ $slider->title }}</h4><br>
                  <h1>{!! $slider->description !!} <span style="display:block">SWIFT Corporation</span></h1>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>
@endforeach
