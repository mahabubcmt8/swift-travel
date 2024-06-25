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
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row offset-1">
        <div class="col-10">
          <div class="card card-primary card-outline shadow-lg">
            <div class="card-header">
               <div class="row">
                  <div class="col-sm-6">
                     <h3 class="card-title">
                        Add New Director
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
            <form action="{{ route('agent.update',$agent->id) }}" method="POST" enctype="multipart/form-data">
              @csrf 
               <div class="row m-4">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="name">Director Name: <span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ $agent->name }}" id="name" class="form-control" placeholder="Write name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="designation">Director Designation: <span class="text-danger">*</span></label>
                        <input type="text" name="designation" value="{{ $agent->designation }}" id="designation" class="form-control" placeholder="Write designation">
                        @error('designation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="image">Director Image <span class="text-danger">(Size:170,232):</span></label>
                        <span class="text-danger">*</span>
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input image" name="image" id="image">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                           </div>
                           <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                           </div>
                        </div>
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="mb-2 mt-3">
                           <img id="showImage" class="rounded avatar-lg showImage" src="{{ asset($agent->image) }}" alt="No Image" width="100px" height="80px;">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="description">Description:
                        <span class="text-danger">*</span>
                        </label>
                        <textarea class="summernote_content" id="description" name="description">{{  $agent->description  }}</textarea>
                     </div>
                     @error('description')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="facebook_url">Facebook Link: <span class="text-danger">*</span></label>
                        <input type="text" name="facebook_url" value="{{  $agent->facebook_url  }}" id="facebook_url" class="form-control" placeholder="Write facebook url">
                        @error('facebook_url')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="linkedin_url">Linkedin Link: <span class="text-danger">*</span></label>
                        <input type="text" name="linkedin_url" value="{{  $agent->linkedin_url  }}" id="linkedin_url" class="form-control" placeholder="Write linkedin url">
                        @error('linkedin_url')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="twitter_url">Twitter Link: <span class="text-danger">*</span></label>
                        <input type="text" name="twitter_url" value="{{  $agent->twitter_url  }}" id="twitter_url" class="form-control" placeholder="Write twitter url">
                        @error('twitter_url')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="whatsapp_url">Whatsapp Link: <span class="text-danger">*</span></label>
                        <input type="text" name="whatsapp_url" value="{{  $agent->whatsapp_url  }}" id="whatsapp_url" class="form-control" placeholder="Write whatsapp url">
                        @error('whatsapp_url')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="status">Status:</label>
                        <span class="text-danger">*</span>
                        <select name="status" id="status" class="form-control">
                              @if ($agent->status == 1)
                                 <option value="1" selected>Active</option>
                                 <option value="0">Disable</option>
                              @else
                                 <option value="1">Active</option>
                                 <option value="0" selected>Disable</option>
                              @endif
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12 text-right">
                     <div class="form-group">
                        <button class="btn btn-success" type="submit">Update</button>
                     </div>
                  </div>
               </div>
            </form>
          </div><!-- /.card -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection
