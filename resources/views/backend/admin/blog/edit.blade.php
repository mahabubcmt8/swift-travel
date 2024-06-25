@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1>Blogs</h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Blogs</li>
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
                        Edit Blog
                     </h3>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="{{ route('blog.index') }}" class="btn btn-danger">
                     <i class="fas fa-long-arrow-alt-left"></i>
                     Back to List
                     </a>
                  </div>
               </div>
            </div>
            <form action="{{ route('blog.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
              @csrf 
                <div class="row m-4">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="title">Blog Title: <span class="text-danger">*</span></label>
                        <input type="text" name="title" value="{{ $blog->title }}" id="title" class="form-control" placeholder="Write blog title">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Blog Category</label>
                        <select class="select2" name="category" data-placeholder="Select a State" style="width: 100%;">
                           @foreach($blogCategory as $item)
                              <option value="{{ $item ->id }}" {{ $item->id==$blog->blog_category_id ? 'selected':'' }}>{{ $item->name }}</option>
                           @endforeach
                        </select>
                      </div>
                      <!-- /.form-group -->
                    </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="blog_image">Blog Image <span class="text-danger">(Size:1200,1700):</span></label>
                        <span class="text-danger">*</span>
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input image" name="blog_image" id="blog_image">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                           </div>
                           <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                           </div>
                        </div>
                        @error('blog_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="mb-2 mt-3">
                           <img id="showImage" class="rounded avatar-lg showImage" src="{{ asset($blog->blog_image) }}" alt="No Image" width="100px" height="80px;">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="blog_description">Blog Description:
                        <span class="text-danger">*</span>
                        </label>
                        <textarea class="summernote_content" id="blog_description" name="blog_description">{{  $blog->description  }}</textarea>
                     </div>
                     @error('blog_description')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                        <label for="status">Status:</label>
                        <span class="text-danger">*</span>
                        <select name="status" id="status" class="form-control">
                           @if ($blog->status == 1)
                              <option value="1" selected>Active</option>
                              <option value="0">Disable</option>
                           @else
                              <option value="1">Active</option>
                              <option value="0" selected>Disable</option>
                           @endif
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="status">Show Homepage:</label>
                        <span class="text-danger">*</span>
                        <select name="show_homepage" id="show_homepage" class="form-control">
                           @if($blog->show_homepage)
                              <option value="1" selected>Yes</option>
                              <option value="0">No</option>
                           @else
                              <option value="1" selected>Yes</option>
                              <option value="0" selected>No</option>
                           @endif
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                         <label for="seo_title">SEO Title</label>
                         <input type="text" name="seo_title" class="form-control" id="seo_title" value="{{ $blog->seo_title }}">
                     </div>
                  </div>
                  <div  class="col-md-12">
                     <div class="form-group">
                         <label for="seo_description">SEO Description</label>
                         <textarea name="seo_description" id="seo_description" cols="30" rows="3" class="form-control" >{{ $blog->seo_description }}</textarea>
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
