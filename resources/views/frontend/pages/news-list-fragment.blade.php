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
@endforeach



<div id="pagination" style="display: flex; justify-content: center">
    <div style="display: flex;">
        <?php echo $newsList->render(); ?>
    </div>
</div>




