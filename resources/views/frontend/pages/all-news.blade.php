@extends('frontend.layout.master2')

@section('title', 'All News')

@section('content')

<div class="site-main-container">
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <form action="{{ route('filter-news') }}" method="POST">
                    <div style="display: none">@csrf</div>
                    <!--article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Source </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                @foreach ($sourcesList as $source)
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" value="{{ $source->id }}" data-id="{{ $source->id }}" data-value="source" name="source">
                                    <span class="form-check-label">
                                        {{$source->site_name}}
                                    </span>
                                </label>
                                @endforeach
                            </div>
                        </div-->
                    <div style="display: flex; flex-direction: column;">
                        <select style="display: flex; margin-bottom: 10px;"  name="source">
                        <option value="0">- Choose source -</option>
                            @foreach ($sourcesList as $source)                            
                                <option value="{{$source->id}}" data-id="{{$source->id}}" data-value="source" name="source">{{$source->site_name}}</option>
                            @endforeach
                        </select>                        
                        <input style="display: flex; margin-bottom: 10px;" type="date" data-value="date" id="date_input" name="date">
                    </div>
                    <input type="submit" name="submit" value="Submit">
                    <a href="{{ route('page.all-news') }}"><input type="reset" name="reset" value="Clear"></a>
                    <!--button name="clear" data-clear="clear">Clear</button-->
                </form>
                <div class="col-lg-8 post-list">
                    <!-- Start latest-post Area -->
                    <div class="latest-post-wrap">
                        @foreach($allNewsList as $news)
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
                                    <!--li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li-->
                                </ul>
                                <p class="excert">
                                    {!! $news->details !!}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div id="pagination" style="display: flex; justify-content: center">
                        <div style="display: flex;">
                            <?php echo $allNewsList->render(); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')

@endpush