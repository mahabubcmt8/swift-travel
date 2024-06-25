<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin Login</title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css ') }}">
      <!-- icheck bootstrap -->
      <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css ') }}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css ') }}">

      <!-- Toastr css -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <!-- /.login-logo -->
         <div class="card card-outline card-primary">
            <h3 class="m-auto m-3">
                <img src="{{ asset(get_setting('site_logo')->value ?? 'null')}}" alt="banner-slider-1" style="width:100px;">
            </h3>
            <div class="card-header text-center">
               <a href="#" class="h1"><b>Sign</b>In</a>
            </div>
            <div class="card-body">
               <form action="{{ isset($guard) ? url($guard.'/login') : route('login') }}" method="post">
                  @csrf
                  <label for="email">Email</label>
                  @error('email')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                  <div class="input-group mb-3">
                     <input type="email" id="email" class="form-control" placeholder="Email" name="email" :value="old('email')" required="">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-envelope"></span>
                        </div>
                     </div>
                  </div>
                  <label for="email">Password</label>
                  @error('password')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                  <div class="input-group mb-3">
                     <input type="password" id="password" class="form-control" type="password" name="password" placeholder="Password" required="">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-8">
                        <div class="icheck-primary">
                           <input type="checkbox" id="remember">
                           <label for="remember">
                           Remember Me
                           </label>
                        </div>
                     </div>
                     <!-- /.col -->
                     <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                     </div>
                     <!-- /.col -->
                  </div>
               </form>
               <!-- /.social-auth-links -->
              <!--  <div class="mt-4">
                  <table class="table table-bordered">
                     <tbody>
                        <tr>
                           <td>admin@gmail.com</td>
                           <td>12345678</td>
                           <td><button class="btn btn-info btn-xs" onclick="autoFill()">Copy</button></td>
                        </tr>
                     </tbody>
                  </table>
               </div> -->
               <p class="#">
                  <a href="{{ route('password.request') }}">I forgot my password</a>
               </p>
               <!--<p class="mb-0">
                  <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                  </p>-->
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.login-box -->
      <!-- jQuery -->
      <script src="{{ asset('backend/plugins/jquery/jquery.min.js ') }}"></script>
      <!-- Bootstrap 4 -->
      <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js ') }}"></script>
      <!-- AdminLTE App -->
      <script src="{{ asset('backend/dist/js/adminlte.min.js ') }}"></script>
      <script type="text/javascript">
         function autoFill(){
             $('#email').val('admin@gmail.com');
             $('#password').val('12345678');
         }
      </script>

      <!-- Toastr js -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
   </body>
</html>