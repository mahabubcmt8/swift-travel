<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/x-icon" href="{{asset('img/f.jpg')}}">
      <title>Admin Panel </title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Tempusdominus Bootstrap 4 -->
      <link rel="stylesheet" href="{{asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
      <!-- iCheck -->
      <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
      <!-- JQVMap -->
      <link rel="stylesheet" href="{{asset('backend/plugins/jqvmap/jqvmap.min.css')}}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="{{asset('backend/plugins/daterangepicker/daterangepicker.css')}}">
      <!-- summernote -->
      <link rel="stylesheet" href="{{asset('backend/plugins/summernote/summernote-bs4.min.css')}}">

      <!-- Custom css -->
      <link rel="stylesheet" href="{{asset('backend/custom/style.css') }}">
      <!-- DataTables -->
      <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css ') }}">
      <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css ') }}">
      <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css ') }}">
      <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css ') }}">

      <!-- Sweetalert css-->
      <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css ') }}">
      <!-- front awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
      <!-- bootstrap tags input css -->
      <link href="{{asset('backend/plugins/input-tags/css/tagsinput.css ')}}" rel="stylesheet" />

      <!-- Toastr css -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

      <style>
         .nav-pills .nav-link {
         color: #f5f5f5;
         }
         .nav-pills .nav-link:not(.active):hover {
         color: #e2fb10;
         }
         .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
         background-color: #d8f1057a;
         }
         .nav-pills .nav-link {
         color: #fff;
         }
      </style>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <!-- Nav Sidebar  -->
        @include('backend.body.navsidebar')
        <!--/ Nav Sidebar  -->
         <!-- Main Sidebar Container -->

        <!--  Main Sidebar  -->
        @include('backend.body.sidebar')

        @yield('content')
        <!-- Control Sidebar -->
        <!-- Nav Sidebar  -->
        @include('backend.body.footer')
        <!--/ Nav Sidebar  -->
        <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
      </div>
      <!-- ./wrapper -->
      <!-- jQuery -->
      <script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="{{asset('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
       <!-- bootstrap tags input js -->
      <script src="{{asset('backend/plugins/input-tags/js/tagsinput.js ')}}"></script>
      <script>
         $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- JQVMap -->
      <script src="{{asset('backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
      <script src="{{asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
      <!-- jQuery Knob Chart -->
      <script src="{{asset('backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
      <!-- daterangepicker -->
      <script src="{{asset('backend/plugins/moment/moment.min.js')}}"></script>
      <script src="{{asset('backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
      <!-- Summernote -->
      <script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
      <!-- overlayScrollbars -->
      <script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{asset('backend/dist/js/adminlte.js')}}"></script>
    
      <!-- data table -->
      <!-- DataTables  & Plugins -->
      <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js ') }}"></script>
      <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js ') }}"></script>
      <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js ') }}"></script>
      <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js ') }}"></script>
      <script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js ') }}"></script>
      <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js ') }}"></script>
      <script src="{{ asset('backend/plugins/jszip/jszip.min.js ') }}"></script>
      <script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js ') }}"></script>
      <script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js ') }}"></script>
      <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js ') }}"></script>
      <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js ') }}"></script>
      <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js ') }}"></script>
      <script src="{{ asset('backend/plugins/select2/js/select2.min.js ') }}"></script>

       <!-- sweetalerat js -->
       <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js ') }}"></script>

       <!-- sweetalerat delete data -->
        <script type="text/javascript">
            $(function(){
                $(document).on('click','#delete',function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");

                    Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  })
                });
            });
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

      <!-- start Brand img -->
      <script>
         $(document).ready(function(){
             $('.image').change(function(event){
                 var reader = new FileReader();
                 reader.onload = function(event){
                     $('.showImage').attr('src',event.target.result);
                 }
                 reader.readAsDataURL(event.target.files['0']);
             });
             // select2 form input
             $('.select2').select2();
         });
      </script>
      <!-- Page specific script -->
      <script>
         $(function () {
           $("#example1").DataTable({
             "responsive": true, "lengthChange": false, "autoWidth": false,
           }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
           $('#example2').DataTable({
             "paging": true,
             "lengthChange": false,
             "searching": false,
             "ordering": true,
             "info": true,
             "autoWidth": false,
             "responsive": true,
           });
         });
      </script>

        <!-- skummernote -->
        <script type="text/javascript">
            $(document).ready(function(){
               $('.summernote_content').summernote();
            });
        </script>
      @stack('footer-script')
   </body>
</html>