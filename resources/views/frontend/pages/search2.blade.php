@extends('frontend.layout.master2')

@section('title', 'Home')

@section('content')

<div class="site-main-container">
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 post-list">
                    <!-- Start latest-post Area -->
                    <div class="latest-post-wrap">
                        <h4 class="cat-title">Search Result</h4>
                        @foreach($newssearch as $search)
                        <div class="single-latest-post row align-items-center">
                            <div class="col-lg-5 post-left">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="img/l1.jpg" alt="">
                                </div>
                                <ul class="tags">
                                    <li><a href="{{ route('page.category',$search->category->slug) }}">{!! $search->category->name !!}</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-7 post-right">
                                <a href="{{ route('page.news',$search->slug) }}">
                                    <h4>{!! $search->title !!}</h4>
                                </a>
                                <ul class="meta">                                    
                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>{!! $search->source_date !!}</a></li>
                                    <!--li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li-->
                                </ul>
                                <p class="excert">
                                    {!! $search->details !!}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @include('frontend.pages.sidebar2')
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')

@endpush