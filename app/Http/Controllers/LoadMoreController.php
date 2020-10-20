<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;

class LoadMoreController extends Controller
{
    public function loadMore(Request $request)
    {

        if ($request->ajax()) {
            if ($request->id > 0) {
                $data = News::where('id', '<', $request->id)->orderBy('created_at', 'DESC')->limit(5)->get();
            } else {
                $data = News::orderBy('created_at', 'DESC')->limit(5)->get();
            }
            $output = '';
            $lastId = '';
            if (!$data->isEmpty()) {
                foreach ($data as $row) {
                    $output .= '<div class="single-latest-post row align-items-center">
                    <div class="col-lg-5 post-left">
                        <div class="feature-img relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/l1.jpg" alt="">
                        </div>
                        <ul class="tags">
                            <li><a href="{{ route("page.category",$row->category->slug) }}"> ' . $row->category->name . '</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-7 post-right">
                        <a href="{{ route("page.news",$row->slug) }}">
                            <h4>' . $row->title . '</h4>
                        </a>
                        <ul class="meta">                            
                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>' . $row->source_date . '</a></li>                            
                        </ul>
                        <p class="excert">
                            ' . $row->details . '
                        </p>
                    </div>
                </div>';
                    $lastId = $row->id;
                }
                $output .= '
                <div class="load-more" id="remove-row">							
                <a href="{{ route("loadMoreNews") }}" data-id="' . $lastId . '" id="btn-more" class="primary-btn">Load More News</a>                            
                ';
            } else {
                $output .= '
                <div class="load-more" id="remove-row">							
                <button type="button" name="load_more_button" class="btn btn-info form-control"> No News </button>                
            </div> </div>	
                ';
            }
            return $output;
        }

        /*$output = '';
        $id = $request->id;
        $newsList = News::where('id','<',$id)->orderBy('created_at','DESC')->limit(5)->get();

        if(!$newsList->isEmpty())
        {
            foreach($newsList as $news)
            {                
                $urlCat = '{{ route("pagecategory",$news->category->slug) }}';  
                $urlNews = '{{ route("page.news",$news->slug) }}';

                $output .= '<div class="single-latest-post row align-items-center">
							<div class="col-lg-5 post-left">
								<div class="feature-img relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/l1.jpg" alt="">
								</div>
								<ul class="tags">
									<li><a href="'.$urlCat.'">'.$news->category->name.'</a></li>
								</ul>
							</div>
							<div class="col-lg-7 post-right">
								<a href="'.$urlNews.'">
									<h4>'.$news->title.'</h4>
								</a>
								<ul class="meta">									
									<li><a href="#"><span class="lnr lnr-calendar-full"></span>'.$news->source_date.'</a></li>
								</ul>
								<p class="excert">
									 '.$news->details.' 
								</p>
							</div>
						</div>';
            }
            $loadMoreNewsURL = '{{ route("loadMoreNews")}}';
            $output .= '<div class="load-more">							
            <a href="'.$loadMoreNewsURL.'" class="primary-btn" data-id="'.$news->id.'>Load More News</a>           
        </div>';            
            echo $output;
        }*/
    }
}
