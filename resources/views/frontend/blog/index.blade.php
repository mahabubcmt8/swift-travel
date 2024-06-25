@extends('layouts.frontend')
@section('content-frontend')
<!-- Blog 2 -->
<section class="blog2 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="item">
                            <div class="post-img">
                                <a href="{{ route('tour.single.blog',$blogShow->slug)}}">
                                    <img src="{{ asset($blogShow->blog_image) }}" alt=""> </a>
                                <div class="date">
                                    <a href="{{ route('tour.single.blog',$blogShow->slug)}}"> <span></span> <i>{{ date('j F, Y', strtotime($blogShow->created_at)) }}</i> </a>
                                </div>
                            </div>
                            <div class="post-cont">
                                <h5><a href="{{ route('tour.single.blog',$blogShow->slug)}}">{{ $blogShow->title ?? 'Null'}}</a></h5>
                                <p>{!! $blogShow->description !!}</p>
                                <div class="butn-dark"> <a href="{{ route('tour.single.blog',$blogShow->slug)}}"><span>Read More</span></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog2-sidebar row">
                    <div class="col-md-12">
                        <div class="widget search">
                            <form>
                                <input type="text" name="search" placeholder="Type here ...">
                                <button type="submit"><i class="ti-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Recent Tour</h6>
                            </div>
                            <ul class="recent">
                                @foreach($RecenProperty->take(3) as $blog)
                                <li>
                                    <style>
                                        .blog_image{
                                            width: 100px;
                                            height: 70px;
                                        }
                                    </style>
                                    <div class="thum"> <img class="blog_image" src="{{ asset($blog->blog_image) }}" alt=""> </div> 
                                    <a href="{{ route('tour.single.blog',$blog->slug)}}">{{ $blog->title ?? 'Null'}}</a>
                                    <a href="#">{{ date('j F, Y', strtotime($blog->created_at)) }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Categories</h6>
                            </div>
                            <ul class="tags">
                                @foreach($blogCategogry as $category)
                                <li>
                                    @php 
                                        $blog_category = App\Models\Blog::where('blog_category_id',$category->id)->paginate(10); 
                                    @endphp 
                                    <a href="#">{{ $category->name ?? 'Null'}}</a> <span> ({{ count($blog_category) }})</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection