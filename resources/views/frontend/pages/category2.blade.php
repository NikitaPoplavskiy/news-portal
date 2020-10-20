@extends('frontend.layout.master2')

@section('title', 'Category Page')

@section('content')
<div class="site-main-container">
	<!-- Start top-post Area -->
	<section class="top-post-area pt-10">
		<div class="container no-padding">
			<div class="row">
				<div class="col-lg-12">
					<div class="hero-nav-area">
						<h1 class="text-white">{!! $category->name !!}</h1>
						<p class="text-white link-nav"><a href="{{ route('home') }}">Home </a> <span class="lnr lnr-arrow-right"></span>Posts Category</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End top-post Area -->
	<!-- Start latest-post Area -->
	<section class="latest-post-area pb-120">
		<div class="container no-padding">
			<div class="row">
				<div class="col-lg-8 post-list">
					<!-- Start latest-post Area -->
					<div class="latest-post-wrap">
						<h4 class="cat-title">Latest News</h4>
						@foreach ($featurednewslist as $featurednews)
						<div class="single-latest-post row align-items-center">
							<div class="col-lg-5 post-left">
								<div class="feature-img relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="{{ $featurednews->image }}" alt="">
								</div>
								<ul class="tags">
									<li><a href="{{ route('page.category',$featurednews->category->slug) }}">{!! $featurednews->category->name !!}</a></li>
								</ul>
							</div>
							<div class="col-lg-7 post-right">
								<a href="{{ route('page.news',$featurednews->slug) }}">
									<h4>{!! $featurednews->title !!}</h4>
								</a>
								<ul class="meta">
									<!--li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li-->
									<li><a href="#"><span class="lnr lnr-calendar-full"></span> {!! $featurednews->source_date !!}</a></li>
									<!--li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li-->
								</ul>
								<p class="excert">
									{!! $featurednews->details !!}
								</p>
							</div>
						</div>
						@endforeach
						<div class="load-more">
							<!--a href="#" class="primary-btn">Load More Posts</a-->
							<?php echo $featurednewslist->render(); ?>
						</div>
					</div>
					<!-- End latest-post Area -->
				</div>
				@include('frontend.pages.sidebar2')
			</div>
		</div>
	</div>
</section>
<!-- End latest-post Area -->
</div>
@endsection

@push('scripts')

@endpush