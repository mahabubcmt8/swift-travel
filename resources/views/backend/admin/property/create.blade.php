@extends('layouts.backend')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
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
            <!-- DataTales Example -->
			<div class="row">
			   <form action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data">
			    @csrf            
				    <div class="col-md-12">
				        <div class="card  mb-4  card-primary card-outline shadow-lg">
				            <div class="card-body">
				               <h4>Basic Information</h4>
				               <hr>
				               <div class="form-group">
				                  <label for="title">Title<span class="text-danger">*</span></label>
				                  <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
				               </div>
				               <div class="form-group">
				                  <label for="slug">Slug <span class="text-danger">*</span></label>
				                  <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug') }}">
				               </div>
				               <div class="row">
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="category">Property Types <span class="text-danger">*</span></label>
				                        <select name="property_type" id="property_type" class="form-control select2">
				                           <option value="">Select Property Type</option>
				                             @foreach ($propertyTypes as $item)
                                       <option {{ old('property_type')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->type }}</option>
                                      @endforeach
				                        </select>
				                     </div>
				                  </div>
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="city">City <span class="text-danger">*</span></label>
				                        <select name="city" id="city" class="form-control select2">
				                           <option value="">Select City</option>
				                           @foreach ($cities as $item)
                                    <option {{ old('city')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name.', '.$item->countryState->name.', '.$item->countryState->country->name }}</option>
                                    @endforeach
				                        </select>
				                     </div>
				                  </div>
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="address">Address <span class="text-danger">*</span></label>
				                        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
				                     </div>
				                  </div>
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="phone">Phone</label>
				                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
				                     </div>
				                  </div>
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="email">Email <span class="text-danger">*</span></label>
				                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
				                     </div>
				                  </div>
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="website">Website</label>
				                        <input type="url" name="website"  class="form-control" value="{{ old('website') }}">
				                     </div>
				                  </div>
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="purpose">Purpose <span class="text-danger">*</span></label>
				                        <select name="purpose" id="purpose" class="form-control select2">
				                           @foreach ($purposes as $item)
                                    <option value="{{ $item->id }}">{{ $item->purpose }}</option>
                                    @endforeach
				                        </select>
				                     </div>
				                  </div>
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="price">Price <span class="text-danger">*</span></label>
				                        <input type="text" name="price" class="form-control" value="{{ old('price') }}">
				                     </div>
				                  </div>
				                  <div class="col-md-6 d-none" id="period_box">
				                     <div class="form-group">
				                        <label for="period">Period <span class="text-danger">*</span></label>
				                        <select name="period" id="period" class="form-control ">
				                           <option value="Daily">Daily</option>
				                           <option value="Monthly">Monthly</option>
				                           <option value="Yearly">Yearly</option>
				                        </select>
				                     </div>
				                  </div>
				               </div>
				            </div>
				        </div>
				        <div class="card  mb-4 card-primary card-outline shadow-lg">
				            <div class="card-body">
				               <h4>Others Information</h4>
				               <hr>
				               <div class="row">
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="">Total Area(Square Feet) <span class="text-danger">*</span></label>
				                        <input type="text" name="area" class="form-control" value="{{ old('area') }}">
				                     </div>
				                  </div>
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="">Total Unit <span class="text-danger">*</span></label>
				                        <input type="number" name="unit"  class="form-control" value="{{ old('unit') }}">
				                     </div>
				                  </div>
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="">Total Room <span class="text-danger">*</span></label>
				                        <input type="number" name="room"  class="form-control" value="{{ old('room') }}">
				                     </div>
				                  </div>
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="">Total Bedroom <span class="text-danger">*</span></label>
				                        <input type="number" name="bedroom" value="{{ old('bedroom') }}" class="form-control">
				                     </div>
				                  </div>
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="">Total Bathroom <span class="text-danger">*</span></label>
				                        <input type="number" name="bathroom" value="{{ old('bathroom') }}" class="form-control">
				                     </div>
				                  </div>
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="">Total Floor <span class="text-danger">*</span></label>
				                        <input type="number" name="floor" value="{{ old('floor') }}" class="form-control">
				                     </div>
				                  </div>
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="">Total Kitchen </label>
				                        <input type="number" name="kitchen" value="{{ old('kitchen') }}" class="form-control">
				                     </div>
				                  </div>
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="">Total Parking Place</label>
				                        <input type="number" name="parking" value="{{ old('parking') }}" class="form-control">
				                     </div>
				                  </div>
				               </div>
				            </div>
				        </div>
				        <div class="card mb-4 card-primary card-outline shadow-lg">
				            <div class="card-body">
				               <h4>Image, PDF and Video</h4>
				               <hr>
				               <div class="row">
				                   <div class="col-md-12">
				                     <div class="form-group">
				                        <label for="">PDF File</label>
				                        <input type="file" name="pdf_file" class="form-control-file">
				                     </div>
				                   </div>
				                  <!-- <div class="col-md-12">
				                     <div class="form-group">
				                        <label for="">Bannner Image <span class="text-danger">*</span></label>
				                        <input type="file" name="banner_image" class="form-control-file">
				                     </div>
				                  </div> -->
				                  <div class="col-md-12">
				                     <div class="form-group">
				                        <label for="">Thumbnail Image <span class="text-danger">(Size:345,230): *</span></label>
				                        <input type="file" name="thumbnail_image" class="form-control-file thumbnail_image">
				                     </div>
				                  </div>
				                   <div class="mb-1">
			                          <img id="showImage" class="rounded avatar-lg showImage" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="No Image" width="100px" height="80px;">
			                        </div>
				               </div>
				               <div class="row">
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="">Slider Images (Multiple) <span class="text-danger">(Size:351,234): *</span></label>
				                        <input type="file" class="form-control-file" id="slider_images" name="slider_images[]" multiple>
				                        <div class="row pt-2" id="preview_img">

                         	 			</div>
				                     </div>
				                  </div>
				               </div>
				               <div class="row">
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="">Youtube Video Link</label>
				                        <input type="text" class="form-control" name="video_link" value="">
				                     </div>
				                  </div>
				               </div>
				            </div>
				        </div>
				        <div class="card mb-4 card-primary card-outline shadow-lg">
				            <div class="card-body">
				               <h4>Aminities</h4>
				               <hr>
				               <div class="row">
				                  <div class="col">
				                     <div class="form-group">
				                        <div>
				                           @foreach ($aminities as $aminity)
                                          @if (old('aminities'))
                                              @php
                                                  $isChecked=false;
                                              @endphp
                                              @foreach (old('aminities') as $old_aminity)
                                                  @if ($aminity->id==$old_aminity)
                                                  @php
                                                  $isChecked=true;
                                              @endphp
                                                  @endif
                                              @endforeach
                                              <input id="{{ $aminity->slug }}" {{ $isChecked ? 'checked' :'' }} value="{{ $aminity->id }}" type="checkbox" name="aminities[]" >
                                              <label class="mx-1" for="{{ $aminity->slug }}">{{ $aminity->aminity }}</label>

                                          @else
                                              <input value="{{ $aminity->id }}" type="checkbox" name="aminities[]" id="{{ $aminity->slug }}">
                                              <label class="mx-1" for="{{ $aminity->slug }}">{{ $aminity->aminity }}</label>
                                          @endif
                                      @endforeach
				                        </div>
				                     </div>
				                  </div>
				               </div>
				            </div>
				        </div>
				        <div class="card mb-4 card-primary card-outline shadow-lg">
				            <div class="card-body">
				               <h4>Nearest Locations</h4>
				               <hr>
				               <div class="row">
				                  <div class="col-8" id="nearest-place-box">
				                     <div class="row">
				                        <div class="col-md-6">
				                           <div class="form-group">
				                              <label for="">Nearest Locations</label>
				                              <select name="nearest_locations[]" id="" class="form-control select2">
				                                 <option value="">Select Nearest Location</option>
				                                  @foreach ($nearest_locatoins as $item)
                                          <option value="{{ $item->id }}">{{ $item->location }}</option>
                                          @endforeach
				                              </select>
				                           </div>
				                        </div>
				                        <div class="col-md-4">
				                           <div class="form-group">
				                              <label for="">Distance(km)</label>
				                              <input type="text" class="form-control" name="distances[]">
				                           </div>
				                        </div>
				                        <div class="col-md-2">
				                           <button id="addNearestPlaceRow" type="button" class="btn btn-success btn-sm nearest-row-btn"><i class="fas fa-plus" aria-hidden="true"></i></button>
				                        </div>
				                     </div>
				                  </div>
				               </div>
				            </div>
				        </div>
				        
				        <div id="hidden-location-box" class="d-none" >
				            <div class="delete-dynamic-location">
				               <div class="row">
				                  <div class="col-md-6">
				                     <div class="form-group">
				                        <label for="">Nearest Locations</label>
				                        <select name="nearest_locations[]" id="" class="form-control ">
				                           <option value="">Select Nearest Location</option>
				                            @foreach ($nearest_locatoins as $item)
                                    <option value="{{ $item->id }}">{{ $item->location }}</option>
                                    @endforeach
				                        </select>
				                     </div>
				                  </div>
				                  <div class="col-md-4">
				                     <div class="form-group">
				                        <label for="">Distance(km)</label>
				                        <input type="text" class="form-control" name="distances[]">
				                     </div>
				                  </div>
				                  <div class="col-md-2">
				                     <button type="button" class="btn btn-danger btn-sm nearest-row-btn removeNearestPlaceRow"><i class="fas fa-trash" aria-hidden="true"></i></button>
				                  </div>
				               </div>
				            </div>
				        </div>
				        <!-- <div class="card mb-4 card-primary card-outline shadow-lg">
				            <div class="card-body">
				               <h4>Property Details and Google Map</h4>
				               <hr>
				               <div class="row">
				                  <div class="col">
				                     <div class="form-group">
				                        <label>Google Map Code</label>
				                        <textarea class="form-control" rows="5" name="google_map_embed_code"></textarea>
				                     </div>
				                     <div class="form-group mt-3">
				                        <label for="description">Description <span class="text-danger">*</span></label>
				                        <textarea class="summernote_content" id="description" name="description"></textarea>
				                     </div>
				                  </div>
				               </div>
				            </div>
				        </div> -->
				        <div class="card mb-4 card-primary card-outline shadow-lg">
				            <div class="card-body">
				               <div class="row">
				                  <div class="col-md-12">
				                     <div class="form-group">
				                        <label for="status">Status <span class="text-danger">*</span></label>
				                        <select name="status" id="status" class="form-control select2">
				                           <option  value="1">Active</option>
				                           <option  value="0">InActive</option>
				                        </select>
				                     </div>
				                  </div>
				                  <div class="col-md-12">
				                     <div class="form-group">
				                        <label for="featured">Featured <span class="text-danger">*</span></label>
				                        <select name="featured" id="featured" class="form-control select2">
				                           <option selected {{ old('featured')==0 ? 'selected': '' }} value="0">No</option>
				                           <option  {{ old('featured')==1 ? 'selected': '' }} value="1">Yes</option>
				                        </select>
				                     </div>
				                  </div>
				                  <div class="col-md-12">
				                     <div class="form-group">
				                        <label for="top_property">Top Property <span class="text-danger">*</span></label>
				                        <select name="top_property" id="top_property" class="form-control select2">
				                           <option value="1">Yes</option>
				                           <option value="0">No</option>
				                        </select>
				                     </div>
				                  </div>
				                  <div class="col-md-12">
				                     <div class="form-group">
				                        <label for="urgent_property">Urgent Property <span class="text-danger">*</span></label>
				                        <select name="urgent_property" id="urgent_property" class="form-control select2">
				                           <option value="1">Yes</option>
				                           <option value="0">No</option>
				                        </select>
				                     </div>
				                  </div>
				                  <div class="col-md-12">
				                     <div class="form-group">
				                        <label for="description">Description:
				                        <span class="text-danger">*</span>
				                        </label>
				                        <textarea class="summernote_content" id="description" name="description"></textarea>
				                     </div>
				                     @error('description')
				                     <span class="text-danger">{{ $message }}</span>
				                     @enderror
				                  </div>
				                  <div class="col-md-12">
				                     <div class="form-group">
				                        <label for="seo_title">SEO Title</label>
				                        <input type="text" name="seo_title" class="form-control" id="seo_title" value="{{ old('seo_title') }}">
				                     </div>
				                  </div>
				                  <div class="col-md-12">
				                     <div class="form-group">
				                        <label for="seo_description">SEO Description</label>
				                        <textarea name="seo_description" id="seo_description" cols="30" rows="3" class="form-control" >{{ old('seo_description') }}</textarea>
				                     </div>
				                  </div>
				               </div>
				               <button style="float: right;" class="btn btn-success">Save</button>
				            </div>
				        </div>
				    </div>
			   </form>
			</div>
       <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Product Image -->
<script type="text/javascript">
      $(document).ready(function(){
        $('.thumbnail_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('.showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    }); 
</script>


<script>
  $(document).ready(function(){
   $('#slider_images').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });  
</script>

<!-- start nearest location -->
<script>
    (function($) {
    "use strict";
	    $(document).ready(function () {
	    	// start title to slug convert //
	    	$("#title").on("focusout",function(e){
                $("#slug").val(convertToSlug($(this).val()));
            });
            // end title to slug convert  //

            // start purpose change   //
            $("#purpose").on("change",function(){
                var purposeId=$(this).val()
                if(purposeId==2){
                    $("#period_box").removeClass('d-none');
                }else if(purposeId==1){
                    $("#period_box").addClass('d-none');
                }
            });
            // end purpose change   //

	        // start dynamic nearest place add and remove //
	        $("#addNearestPlaceRow").on("click",function(){
	            var new_row=$("#hidden-location-box").html();
	            $("#nearest-place-box").append(new_row)

	        })
	        $(document).on('click', '.removeNearestPlaceRow', function () {
	            $(this).closest('.delete-dynamic-location').remove();
	        });
	        // end dynamic nearest place add and remove //
	    });
    })(jQuery);

    // start title to slug convert function //
    function convertToSlug(Text)
    {
        return Text
            .toLowerCase()
            .replace(/[^\w ]+/g,'')
            .replace(/ +/g,'-');
    }
    // end title to slug convert function //
</script>
<!-- end nearest location -->
@endsection