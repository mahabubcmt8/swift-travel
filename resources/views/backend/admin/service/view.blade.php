@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Service</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline shadow-lg mb-4">
            <div class="card-header py-3">
               <div class="row">
                  <div class="col-sm-6">
                     <h3 class="card-title m-0 font-weight-bold text-primary">
                       Service Details
                     </h3>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="{{ route('service.index') }}" class="btn btn-danger">
                     <i class="fas fa-long-arrow-alt-left"></i>
                     Back to List
                     </a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered">
                     <tr>
                        <td>Service Icon</td>
                        <td>
                           {{ $service->icon ?? 'Null'}}
                        </td>
                     </tr>
                     <tr>
                        <td>Service Title</td>
                        <td>{{ $service->title ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Service Description</td>
                        <td>{!! Str::limit($service->description, 600) !!}</td>
                     </tr>
                      <td>Status</td>
                      <td>
                          @if ($service->status == 1)
                          <span class="badge badge-success">Active</span>
                          @else
                          <span class="badge badge-danger">Disable</span>
                          @endif

                      </td>
                     </tr>
                  </table>
               </div>
            </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 </div>
@endsection
