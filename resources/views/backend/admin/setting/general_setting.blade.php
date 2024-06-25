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
            <h1>Application Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Application Setting</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <section class="content">
       <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="">
                        <form method="post" action="{{ route('update.setting') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="card card-primary card-outline shadow-lg">
                                        <div class="card-header">
                                            <h3>Site Settings</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 mb-3">
                                                   <label for="site_name" class="col-form-label" style="font-weight: bold;">Site Name :</label>
                                                    <input type="hidden" name="types[]" value="site_name">
                                                    <input class="form-control" type="text" name="site_name" id="site_name" placeholder="Write Site name" value="{{ get_setting('site_name')->value ?? 'null'}}">
                                                    @error('site_name')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6 mb-3">
                                                   <label for="business_name" class="col-form-label" style="font-weight: bold;">Business Name :</label>
                                                    <input type="hidden" name="types[]" value="business_name">
                                                    <input class="form-control" type="text" name="business_name" id="business_name" placeholder="Write Site name" value="{{ get_setting('business_name')->value ?? 'null'}}">
                                                    @error('business_name')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6 mb-3">
                                                   <label for="phone" class="col-form-label" style="font-weight: bold;">Phone :</label>
                                                   <input type="hidden" name="types[]" value="phone">
                                                    <input class="form-control" type="text" name="phone" id="phone" placeholder="Write phone" value="{{ get_setting('phone')->value ?? 'null'}}">
                                                    @error('phone')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6 mb-3">
                                                   <label for="email" class="col-form-label" style="font-weight: bold;">Email :</label>
                                                   <input type="hidden" name="types[]" value="email">
                                                    <input class="form-control" type="text" name="email" id="email" placeholder="Write email" value="{{ get_setting('email')->value ?? 'null'}}">
                                                    @error('email')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- Row End -->
                                            <div class="row">
                                                <div class="col-sm-6 mb-3">
                                                    <label for="business_hours" class="col-form-label" style="font-weight: bold;">Business Hours</label>
                                                    <input type="hidden" name="types[]" value="business_hours">
                                                    <input class="form-control" type="text" name="business_hours" placeholder="business hours" value="{{ get_setting('business_hours')->value ?? 'null'}}">
                                                    @error('business_hours')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6 mb-3">
                                                    <label for="copy_right" class="col-form-label" style="font-weight: bold;">Copy Right</label>
                                                    <input type="hidden" name="types[]" value="copy_right">
                                                    <input class="form-control" type="text" name="copy_right" placeholder="copy right" value="{{ get_setting('copy_right')->value ?? 'null'}}">
                                                    @error('copy_right')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-12 mb-3">
                                                   <label for="business_address" class="col-form-label" style="font-weight: bold;">Address</label>
                                                   <input type="hidden" name="types[]" value="business_address">
                                                   <textarea class="form-control" id="business_address" cols="2" name="business_address" placeholder="Write address here">{{ get_setting('business_address')->value ?? 'null'}}</textarea>
                                                    @error('business_address')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- Row End// -->
                                        </div>
                                        <!-- card body .// -->
                                    </div>
                                    <!-- card .// --> 

                                    <div class="card card-primary card-outline shadow-lg mt-3">
                                        <div class="card-header">
                                            <h3>Social Link Settings</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 mb-3">
                                                   <label for="facebook_url" class="col-form-label" style="font-weight: bold;">Facebook link :</label>
                                                   <input type="hidden" name="types[]" value="facebook_url">
                                                    <input class="form-control" type="text" name="facebook_url" id="facebook_url" placeholder="Write facebook url" value="{{ get_setting('facebook_url')->value ?? 'null'}}">
                                                    @error('facebook_url')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6 mb-3">
                                                   <label for="twitter_url" class="col-form-label" style="font-weight: bold;">Twitter link :</label>
                                                   <input type="hidden" name="types[]" value="twitter_url">
                                                    <input class="form-control" type="text" name="twitter_url" id="twitter_url" placeholder="Write twitter url" value="{{ get_setting('twitter_url')->value ?? 'null'}}">
                                                    @error('twitter_url')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                   <label for="linkedin_url" class="col-form-label" style="font-weight: bold;">Linkedin Link :</label>
                                                   <input type="hidden" name="types[]" value="linkedin_url">
                                                    <input class="form-control" type="text" name="linkedin_url" id="linkedin_url" placeholder="Write linkedin url" value="{{ get_setting('linkedin_url')->value ?? 'null'}}">
                                                    @error('linkedin_url')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6 mb-3">
                                                   <label for="youtube_url" class="col-form-label" style="font-weight: bold;">Youtube Link :</label>
                                                   <input type="hidden" name="types[]" value="youtube_url">
                                                    <input class="form-control" type="text" name="youtube_url" id="youtube_url" placeholder="Write youtube url" value="{{ get_setting('youtube_url')->value ?? 'null'}}">
                                                    @error('youtube_url')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                
                                                <div class="col-sm-6 mb-3">
                                                   <label for="instagram_url" class="col-form-label" style="font-weight: bold;">Instagram Link :</label>
                                                   <input type="hidden" name="types[]" value="instagram_url">
                                                    <input class="form-control" type="text" name="instagram_url" id="instagram_url" placeholder="Write instagram url" value="{{ get_setting('instagram_url')->value ?? 'null'}}">
                                                    @error('instagram_url')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6 mb-3">
                                                   <label for="pinterest_url" class="col-form-label" style="font-weight: bold;">Pinterest Link :</label>
                                                   <input type="hidden" name="types[]" value="pinterest_url">
                                                    <input class="form-control" type="text" name="pinterest_url" id="pinterest_url" placeholder="Write pinterest url" value="{{ get_setting('pinterest_url')->value ?? 'null'}}">
                                                    @error('pinterest_url')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- card //-->

                                </div>
                                <!-- col-6 //-->
                                <div class="col-md-5">
                                    <div class="card card-primary card-outline shadow-lg">
                                        <div class="card-header mb-4">
                                            <h3>Logo Settings</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 mb-3">
                                                    <div class="mb-2">
                                                        <img id="showFavicon" class="rounded avatar-lg" src="{{ asset(get_setting('site_favicon')->value ?? 'Null') }}" alt="No Image" width="100px" height="50px;">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="site_favicon" class="col-form-label" style="font-weight: bold;">Site Favicon <span class="text-danger">(Size:32,32):</span></label>
                                                        <input name="site_favicon" class="form-control" type="file" id="site_favicon">
                                                        @error('site_favicon')
                                                            <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 mb-3">
                                                    <div class="mb-2">
                                                        <img id="showImage" class="rounded avatar-lg" src="{{ asset(get_setting('site_logo')->value ?? 'Null') }}" alt="No Image" width="180px" height="100px;">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="image" class="col-form-label" style="font-weight: bold;">Site Logo <span class="text-danger">(Size:122,122):</span></label>

                                                        <input name="site_logo" class="form-control" type="file" id="image">
                                                        @error('site_logo')
                                                            <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 mb-3">
                                                    <div class="mb-2">
                                                        <img id="showFooter" class="rounded avatar-lg" src="{{ asset(get_setting('site_footer_logo')->value ?? 'Null') }}" alt="No Image" width="180px" height="100px;">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="site_footer_logo" class="col-form-label" style="font-weight: bold;">Site Footer Logo (Size:122,122):</label>

                                                        <input name="site_footer_logo" class="form-control" type="file" id="site_footer_logo">
                                                        @error('site_footer_logo')
                                                            <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                               <!--  <div class="col-sm-12 mb-3">
                                                    <div class="mb-2">
                                                        <img id="showContact" class="rounded avatar-lg" src="{{ asset(get_setting('site_contact_logo')->value ?? 'Null') }}" alt="No Image" width="180px" height="100px;">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="site_contact_logo" class="col-form-label" style="font-weight: bold;">Site Contact Logo (Size:308,314):</label>

                                                        <input name="site_contact_logo" class="form-control" type="file" id="site_contact_logo">
                                                        @error('site_contact_logo')
                                                            <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div> -->

                                            </div>
                                            <!-- row //-->
                                        </div>
                                    </div>
                                    <!-- card //-->

                                    <div class="card card-primary card-outline shadow-lg mt-3">
                                        <div class="card-header">
                                            <h3>Meta Settings:</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 mb-3">
                                                   <label for="meta_title" class="col-form-label" style="font-weight: bold;">Meta Title :</label>
                                                    <input type="hidden" name="types[]" value="meta_title">
                                                    <input class="form-control" type="text" name="meta_title" id="meta_title" placeholder="Write meta  name" value="{{ get_setting('meta_title')->value ?? 'null'}}">
                                                    @error('meta_title')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6 mb-3">
                                                   <label for="meta_keyword" class="col-form-label" style="font-weight: bold;">Meta Keyword :</label>
                                                    <input type="hidden" name="types[]" value="meta_keyword">
                                                    <input class="form-control" type="text" name="meta_keyword" id="linkedin_url" placeholder="Write meta keyword " value="{{ get_setting('meta_keyword')->value ?? 'null'}}">
                                                    @error('meta_keyword')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-12 mb-3">
                                                   <label for="meta_description" class="col-form-label" style="font-weight: bold;">Meta Description :</label>
                                                    <input type="hidden" name="types[]" value="meta_description">

                                                    <textarea class="form-control" name="meta_description" rows="3" placeholder="Enter ">{{ get_setting('meta_description')->value ?? 'null'}}</textarea>
                                                    @error('meta_description')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card //-->
                                </div>
                            </div>
                            <div class="row mb-4 justify-content-sm-end mr-4">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </form>
                        <!-- .row // --> 
                 </div>
              </div>
           </div>
       <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection

@push('footer-script')
    <!--Site favicon Show -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#site_favicon').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showFavicon').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    
    <!--Site footer logo Show -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#site_footer_logo').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showFooter').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    
    <!--Site Contact logo Show -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#site_contact_logo').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showContact').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endpush