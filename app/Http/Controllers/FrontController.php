<?php

namespace App\Http\Controllers;

use App\News;
use App\Category;
use App\Advertisement;
use App\Source;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Pagination\Paginator;
use \Datetime;


class FrontController extends Controller
{
    public function index()
    {
        $topnewslist = News::orderBy('source_date', 'desc')->/*whereHas('category')->*/where('status', 1)->paginate(15);
        $temp = Carbon::now()->startOfDay()->toDateTimeString();

        //$topnewslist = News::orderBy('source_date', 'desc')->where('source_date', '>=', Carbon::now()->startOfDay()->toDateTimeString(), 'and', 'status', '=', 1)->paginate(15);
        // $date = new \DateTime();
        // $dateInHour = $date->modify('-1 hour');
        // $formatted_date = $dateInHour->format('Y-m-d H:i:s');
        // $latestNews = News::where('source_date', '>', $formatted_date)->take(3)->get();



        $newscategory_one   = News::latest()->whereHas('category')->where('category_id', 6)->where('status', 1)->take(9)->get();
        $newscategory_two   = News::latest()->whereHas('category')->where('category_id', 7)->where('status', 1)->take(3)->get();
        $newscategory_three = News::latest()->whereHas('category')->where('category_id', 3)->where('status', 1)->take(10)->get();

        return view('frontend.index2', compact(
            'topnewslist',
            'newscategory_one',
            'newscategory_two',
            'newscategory_three'
        ));
    }


    public function pageCategory($slug)
    {
        $category           = Category::where('slug', $slug)->first();
        $featurednewslist   = $category->newslist()
            ->where('status', 1)
            ->where('featured', 1)
            ->orderBy('source_date', 'desc')
            // ->take(5)
            // ->get();
            ->paginate(5);
        $newscategorylist   = $category->newslist()->where('status', 1)->where('featured', 0)->get();
        $advertisements     = Advertisement::where('type', 'category')->where('slug', $slug)->first();

        return view('frontend.pages.category2', compact('category', 'featurednewslist', 'newscategorylist', 'advertisements'));
    }

    public function pageNews($slug)
    {
        $newssingle = News::with('category')->where('slug', $slug)->first();

        $newssessionkey = 'news-' . $newssingle->id;
        if (!session()->has($newssessionkey)) {
            $newssingle->increment('view_count');
            session()->put($newssessionkey, 1);
        }

        return view('frontend.pages.single2', compact('newssingle'));
    }

    public function pageSearch()
    {
        $search = request()->input('search');

        // $newssearch = News::with('category')->where('title','like','%'.$search.'%')->whereHas('category')->where('status',1)->get();
        /*leftJoin('categories', function($join) {
            $join->on('news.category_id', '=', 'categories.id');
        })*/
        $newssearch = News::where('title', 'like', '%' . $search . '%')->whereHas('category')->where('news.status', 1)->get();

        return view('frontend.pages.search2', compact('newssearch'));
    }

    public function pageArchive()
    {
        $newsarchives = Category::with('newslist')->whereHas('newslist')->get();

        return view('frontend.pages.index', compact('newsarchives'));
    }

    public function pageTerms()
    {

        return view('frontend.pages.terms');
    }

    public function pagePrivacy()
    {


        return view('frontend.pages.privacy');
    }

    public function pageAbout()
    {

        return view('frontend.pages.about');
    }

    public function pageContact()
    {

        return view('frontend.pages.contact');
    }

    public function pageAllNews()
    {

        $allNewsList = News::orderBy('source_date', 'desc')->paginate(10);

        $sourcesList = Source::groupBy('site_name')->get();

        return view('frontend.pages.all-news', compact('allNewsList', 'sourcesList'));
    }

    public function filterNews(Request $request)
    {

        $date = $request->date;
        $source = $request->source;
        $pageSize = 10;        

        if (isset($_POST['reset'])) {
            echo "Hello";
        }
       
        if (isset($date) && isset($source)) {
            $newsList = News::where('sourceId', $source)->whereDate('source_date', '=', $date)->paginate($pageSize);
        } 

        if (isset($date)) {
            $newsList = News::whereDate('source_date', '=', $date)->paginate($pageSize);
        } 

        if (isset($source)) {
            $newsList = News::where('sourceId', $source)->orderBy('source_date', 'desc')->paginate($pageSize);
        }

        if ($source == '0') {
            $newsList = News::orderBy('source_date', 'desc')->paginate(30);
        }

        //        $view = view('example');
        //        echo $view->render(); // Hello, World!
        //        echo $view;  // Hello, World!

        $view = view('frontend.pages.news-list-fragment', compact('newsList'));
        return $view->render();


        //        foreach ($newsList as $news) {
        //            $result .= '<div class="single-latest-post row align-items-center">
        //            <div class="col-lg-5 post-left">
        //                <div class="feature-img relative">
        //                    <div class="overlay overlay-bg"></div>
        //                    <img class="img-fluid" src="img/l1.jpg" alt="">
        //                </div>
        //                <ul class="tags">
        //                    <li><a href=" ' . route("page.category", $news->category->slug) . '">' . $news->category->name . '</a></li>
        //                </ul>
        //            </div>
        //            <div class="col-lg-7 post-right">
        //                <a href=" ' . route("page.news", $news->slug) . '">
        //                    <h4>' . $news->title . '</h4>
        //                </a>
        //                <ul class="meta">
        //                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>' . $news->source_date . '</a></li>
        //                </ul>
        //                <p class="excert">
        //                    ' . $news->details . '
        //                </p>
        //            </div>
        //        </div>
        //        <div id="pagination" style="display: flex; justify-content: center">
        //            <div style="display: flex;">
        //                <!--?php echo $allNewsList->render(); ?-->
        //            </div>
        //        </div>' ;
        //        }


        // return $result;
    }

   
    public function loadMore(Request $request)
    {    
        if ($request->ajax()) {   
            $count = 1;                
            if ($request->id > 0) {
                $newsList = News::where('id', '<', $request->id)
                    ->orderBy('id', 'DESC')
                    ->where('source_date', '>=', Carbon::now()->startOfDay()->toDateTimeString())
                    ->limit(5)
                    ->get();
            } elseif ($request->id == "") {
                $newsList = News::orderBy('source_date', 'DESC')
                    ->where('source_date', '>=', Carbon::now()->startOfDay()->toDateTimeString())
                    ->limit(5)
                    ->get();                
            } else {
                $count++;
                $noDataFound = view('frontend.pages.no-data-found-fragment');
                return $noDataFound->render();
            }      
            
            if ($count > 1) {
                $noDataFound = view('frontend.pages.no-data-found-fragment');
                return $noDataFound->render();
            }

            $last_id = '';

            if (!$newsList->isEmpty()) {
                $result = view('frontend.pages.news-list-loadmore-fragment', compact('newsList', 'last_id'));
                return $result->render();
            } else {
                $noDataFound = view('frontend.pages.no-data-found-fragment');
                return $noDataFound->render();                
            }

    //             foreach ($data as $news) {
    //                 $output .= ' 
    //             <div class="single-latest-post row align-items-center">
    //         <div class="col-lg-5 post-left">
    //             <div class="feature-img relative">
    //                 <div class="overlay overlay-bg"></div>
    //                 <img class="img-fluid" src="img/l1.jpg" alt="">
    //             </div>
    //             <ul class="tags">
    //                 <li><a href="' . route("page.category", $news->category->slug) . '">' . $news->category->name . '</a></li>
    //             </ul>
    //         </div>
    //         <div class="col-lg-7 post-right">
    //             <a href="' . route("page.news", $news->slug) . '">
    //                 <h4>' . $news->title . '</h4>
    //             </a>
    //             <ul class="meta">                    
    //                 <li><a href="#"><span class="lnr lnr-calendar-full"></span>' . $news->source_date . '</a></li>                    
    //             </ul>
    //             <p class="excert">
    //                 ' . $news->details . '
    //             </p>
    //         </div>
    //     </div>';
        
    //                 $last_id = $news->id;
    //             }
    //             $output .= '
    //             <div class="load-more" id="remove-row">
    //             <button formmethod="post" onclick="loadMore(this)" data-id="' . $last_id . '" id="btn-more" class="primary-btn">Load more News</button>                
    //         </div>
    //    ';
    //         } else {
    //             $output .= '
    //  <div class="load-more" id="remove-row">
    //  <button formmethod="post" onclick="loadMore(this)" id="btn-more" class="primary-btn">No Data Found</button>    
    // </div>
    //  ';            
            // echo $output;
        }
    }
}
