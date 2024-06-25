@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1>Pages</h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pages</li>
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
                        Edit Page
                     </h3>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="{{ route('pages.index') }}" class="btn btn-danger">
                     <i class="fas fa-long-arrow-alt-left"></i>
                     Back to List
                     </a>
                  </div>
               </div>
            </div>
            <form action="{{ route('pages.update',$page->id) }}" method="POST" enctype="multipart/form-data">
              @csrf 
                <div class="row m-4">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="name">Page Name: <span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ $page->name }}" id="name" class="form-control" placeholder="Write page name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="title">Page Title:<span class="text-danger">*</span></label>
                        <input type="text" name="title" value="{{ $page->title }}" id="title" class="form-control" placeholder="Write page title ">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="description">Description:
                        <span class="text-danger">*</span>
                        </label>
                        <textarea class="summernote_content" id="description" name="description">{{ $page->description }}</textarea>
                     </div>
                     @error('description')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="position" class="col-form-label" style="font-weight: bold;"> Position:<span class="text-danger">*</span></label>
                        <div class="custom_select">
                           <select class="form-control select-active w-100 form-select select-nice" name="position">
                              <option value="1" @if($page->position == 1) selected @endif>Nav</option>
                              <option value="2" @if($page->position == 2) selected @endif>Both</option>
                              <option value="3" @if($page->position == 3) selected @endif>Bottom</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="status">Status:</label>
                        <span class="text-danger">*</span>
                        <select name="status" id="status" class="form-control">
                           @if ($page->status == 1)
                              <option value="1" selected>Active</option>
                              <option value="0">Disable</option>
                           @else
                              <option value="1" >Active</option>
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
