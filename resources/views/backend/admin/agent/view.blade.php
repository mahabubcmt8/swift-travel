@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Director</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Director</li>
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
                       Director Details
                     </h3>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="{{ route('agent.index') }}" class="btn btn-danger">
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
                        <td>Director Image</td>
                        <td>
                           <img src="{{ asset($agent->image) }}" alt="" style="height:70px; width:80px;">
                        </td>
                     </tr>
                     <tr>
                        <td>Director Name</td>
                        <td>{{ $agent->name ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Director Designation</td>
                        <td>{{ $agent->designation ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Director Description</td>
                        <td>{!! Str::limit($agent->description, 600) !!}</td>
                     </tr>
                     <tr>
                        <td>Facebook Link</td>
                        <td>{{ $agent->facebook_url ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Linkedin Link</td>
                        <td>{{ $agent->linkedin_url ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Twitter Link</td>
                        <td>{{ $agent->twitter_url ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Whatsapp Link</td>
                        <td>{{ $agent->whatsapp_url ?? 'NULL' }}</td>
                     </tr>
                      <td>Status</td>
                      <td>
                          @if ($agent->status == 1)
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
