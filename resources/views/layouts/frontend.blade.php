<!DOCTYPE html>
<html lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <meta name="description" content="{{ get_setting('meta_description')->value ?? 'null'}}" />
      <meta name="keywords" content="{{ get_setting('meta_keyword')->value ?? 'null'}}">
      <meta name="author" content="{{ get_setting('meta_title')->value ?? 'null'}}">
      <title>{{ get_setting('site_name')->value ?? 'null'}}</title>
      <link rel="icon" type="image/png" sizes="32x32" href="{{ get_setting('site_favicon')->value ?? 'null'}}" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500&amp;family=Poppins:wght@300;400;500;600;700&amp;display=swap">
      <link rel="stylesheet" href="{{ asset('frontend/css/plugins.css ') }}" />
      <link rel="stylesheet" href="{{ asset('frontend/css/style.css ') }}" />

       <!-- front awesome -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <!-- Sweetalert css-->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.css">
       <!-- Toastr css -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
   </head>
   <body>

    @include('frontend.body.header')
    <!--/ Header -->
    <!-- Start  page wrapper -->
    @yield('content-frontend')
    <!--end page wrapper -->
    <!-- Footer -->
    @include('frontend.body.footer')
    <!--/ Footer -->

      <!-- jQuery -->
      <script src="{{ asset('frontend/js/jquery-3.6.3.min.js ') }}"></script>
      <script src="{{ asset('frontend/js/jquery-migrate-3.0.0.min.js ') }}"></script>
      <script src="{{ asset('frontend/js/modernizr-2.6.2.min.j ') }}s"></script>
      <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js ') }}"></script>
      <script src="{{ asset('frontend/js/jquery.isotope.v3.0.2.js ') }}"></script>
      <script src="{{ asset('frontend/js/pace.js ') }}"></script>
      <script src="{{ asset('frontend/js/popper.min.js ') }}"></script>
      <script src="{{ asset('frontend/js/bootstrap.min.js ') }}"></script>
      <script src="{{ asset('frontend/js/scrollIt.min.js ') }}"></script>
      <script src="{{ asset('frontend/js/jquery.waypoints.min.js ') }}"></script>
      <script src="{{ asset('frontend/js/owl.carousel.min.js ') }}"></script>
      <script src="{{ asset('frontend/js/jquery.stellar.min.js ') }}"></script>
      <script src="{{ asset('frontend/js/jquery.magnific-popup.js ') }}"></script>
      <script src="{{ asset('frontend/js/YouTubePopUp.js ') }}"></script>
      <script src="{{ asset('frontend/js/select2.js ') }}"></script>
      <script src="{{ asset('frontend/js/datepicker.js ') }}"></script>
      <script src="{{ asset('frontend/js/jquery.counterup.min.js ') }}"></script>
      <script src="{{ asset('frontend/js/smooth-scroll.min.js ') }}"></script>
      <script src="{{ asset('frontend/js/custom.js ') }}"></script>

       <!-- Toastr js -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
       <!-- Sweetalert js -->
       <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

       <!-- all toastr message show  Update-->
        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
                case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

                case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

                case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

                case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
            }
            @endif
        </script>

        <!-- all toastr message show  old-->
        <script type="text/javascript">
            @if(Session::has('success'))
              toastr.success("{{Session::get('success')}}");
            @endif
        </script>
   </body>
</html>
