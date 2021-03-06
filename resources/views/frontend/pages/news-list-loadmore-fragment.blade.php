@foreach($newsList as $news)
<div class="single-latest-post row align-items-center">
    <div class="col-lg-5 post-left">
        <div class="feature-img relative">
            <div class="overlay overlay-bg"></div>
            <img class="img-fluid" src="img/l1.jpg" alt="">
        </div>
        <ul class="tags">
            <li><a href="{{ route('page.category',$news->category->slug) }}">{!! $news->category->name !!}</a></li>
        </ul>
    </div>
    <div class="col-lg-7 post-right">
        <a href="{{ route('page.news',$news->slug) }}">
            <h4>{!! $news->title !!}</h4>
        </a>
        <ul class="meta">
            <li><a href="#"><span class="lnr lnr-calendar-full"></span>{!! $news->source_date !!}</a></li>
        </ul>
        <p class="excert">
            {!! $news->details !!}
        </p>
    </div>
</div>
<?php $last_id = $news->id; ?>
@endforeach

<div class="load-more" id="remove-row">
    <button formmethod="post" onclick="loadMore(this)" data-id=" {{ $last_id }} " id="btn-more" class="primary-btn">Load more News</button>
</div>