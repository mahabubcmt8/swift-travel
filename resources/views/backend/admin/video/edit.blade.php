@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1>Video</h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Video</li>
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
                       Edit Video
                     </h3>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="{{ route('video.index') }}" class="btn btn-danger">
                     <i class="fas fa-long-arrow-alt-left"></i>
                     Back to List
                     </a>
                  </div>
               </div>
            </div>
            <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
              @csrf 
                <div class="row m-4">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="title">Video Title: <span class="text-danger">*</span></label>
                        <input type="text" name="title" value="{{ $video->title }}" id="title" class="form-control" placeholder="Enter title">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                       <label for="title">Tour Country: <span class="text-danger">*</span></label>
                       <input type="text" name="tour_country" value="{{ $video->tour_country }}" id="tour_country" class="form-control" placeholder="Enter tour country name">
                       @error('tour_country')
                       <span class="text-danger">{{ $message }}</span>
                       @enderror
                    </div>
                 </div>
                 <div class="col-md-12">
                    <div class="form-group">
                       <label for="title">Tour Day: <span class="text-danger">*</span></label>
                       <input type="text" min="0" name="tour_day" value="{{ $video->tour_day }}" id="tour_day" class="form-control" placeholder="Enter tour day">
                       @error('tour_day')
                       <span class="text-danger">{{ $message }}</span>
                       @enderror
                    </div>
                 </div>
                 <div class="col-md-12">
                    <div class="form-group">
                       <label for="video_url">Video URL: <span class="text-danger">*</span></label>
                       <input type="text" name="video_url" value="{{ $video->video_url }}" id="video_url" class="form-control" placeholder="Enter video url">
                       @error('video_url')
                       <span class="text-danger">{{ $message }}</span>
                       @enderror
                    </div>
                 </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="status">Status:</label>
                        <span class="text-danger">*</span>
                        <select name="status" id="status" class="form-control">
                            @if ($video->status == 1)
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
