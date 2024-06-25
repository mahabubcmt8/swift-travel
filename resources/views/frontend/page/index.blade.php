@extends('layouts.frontend')
@section('content-frontend')
 <!-- Page 2 -->
 <section class="blog2 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="item">
                            <div class="post-cont">
                                <h5>
                                    <a href="#">{{ $page->title ?? 'NULL' }}</a>
                                </h5>
                                <p>{!! $page->description ?? 'NULL' !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog2-sidebar row">
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Popular Pages</h6>
                            </div>
                            <ul>
                                @foreach(get_pages_both_footer() as $page)
                                <li>
                                    <a href="{{ route('page.about', $page->slug) }}"><i class="ti-angle-right"></i>{{ $page->name ?? 'Null' }}</a>
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