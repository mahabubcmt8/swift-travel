@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Properties Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Properties Information</li>
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
                      Properties Information Details
                     </h3>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="{{ route('property.index') }}" class="btn btn-danger">
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
                        <td>Properties Title</td>
                        <td>{{ $property->title ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Property Types</td>
                        <td>{{ $property->propertyType->type ?? 'Null' }}</td>
                     </tr>
                     <tr>
                        <td>Property Purpose</td>
                        <td>{{ $property->propertyPurpose->purpose ?? 'Null' }}</td>
                     </tr>
                     <tr>
                        <td>Property Types</td>
                        <td>{{ $property->propertyType->type ?? 'Null' }}</td>
                     </tr>
                     <tr>
                        <td>Property Aminities</td>
                        <td>
                           @foreach($property->propertyAminities as $aminities)
                              {{ $aminities->aminity->aminity ?? 'Null' }},
                           @endforeach
                        </td>
                     </tr>
                     <tr>
                        <td>Total Area</td>
                        <td>{{ $property->area  ?? 'NULL' }} SQ FT</td>
                     </tr>
                     <tr>
                        <td>Total Unit</td>
                        <td>{{ $property->number_of_unit  ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Total Room</td>
                        <td>{{ $property->number_of_room ?? 'NULL' }}</td>
                     </tr>
                      <tr>
                        <td>Total Bathroom</td>
                        <td>{{ $property->number_of_bathroom ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Total Floor</td>
                        <td>{{ $property->number_of_floor ?? 'NULL' }}</td>
                     </tr>
                      <tr>
                        <td>Total Kitchen</td>
                        <td>{{ $property->number_of_kitchen ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Total Parking Place</td>
                        <td>{{ $property->number_of_parking ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Phone</td>
                        <td>{{ $property->phone ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Email</td>
                        <td>{{ $property->email ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Website</td>
                        <td>{{ $property->website ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>City</td>
                        <td>
                           {{ $property->city->name  ?? 'Null' }},
                           {{ $property->city->countryState->name  ?? 'Null' }},
                           {{ $property->city->countryState->country->name  ?? 'Null' }}
                        </td>
                     </tr>
                     <tr>
                        <td>Thumbnail Image</td>
                        <td>
                        	<img src="{{ asset($property->thumbnail_image)}}" width="70" height="60">
                        </td>
                     </tr>
                     <tr>
                        <td>Slider Image</td>
                        <td>
                        	@foreach($property->propertyImages as $property)
				                <img src="{{ asset($property->image) }}" alt="" style="height:60px; width:50px;">
				            @endforeach
                        </td>
                     </tr>
                     <tr> 
                      <td>Status</td>
                      <td>
                        @if ($property->status == 1)
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
