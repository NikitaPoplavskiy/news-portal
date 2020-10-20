<?php

namespace App\Http\Controllers;

use App\News;
use App\Source;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use Vedmant\FeedReader\Facades\FeedReader;
use DateTime;
use App\Category;
//use DiDom\Document;
use DiDom\Query;
// use HtmlNewsGrabber;

// use Vedmant\FeedReader\FeedReader;
// use Illuminate\Support\Facades\Log;


class NewsCollectorController extends Controller
{

    public function getNews()
    {
        $sources = Source::where('status', 1)->get();

        // Log::info('getNews');
        $newNewsCount = 0;
        // Счетчик новых новостей
        foreach ($sources as $source) {
            // Get news from source
            if ($source->type == "rss") {
                $newNewsCount += self::getRssNews($source);
            } elseif ($source->type == "html") {
                // throw new \Exception("Unknown source type $source->type");
                HtmlNewsGrabber::getNews($source->name);
            }
            else {
                throw new \Exception("Unknown source type $source->type");
            }
        }

        // Количество всех новостей в БД
        $newsCount = News::count();

        $return_array = compact('newsCount', 'newNewsCount');
        return json_encode($return_array);
    }

    public static function getRssNews($source) {
        $newNewsCount = 0;
        $feedReader = new FeedReader();
        $feed = $feedReader::read($source->url);
        $rssItems = $feed->get_items();

        $BATCH_SIZE = 50;
        $items = array();


        foreach ($rssItems as $rssItem) {
            $meta = array();
            $meta["permalink"] = $rssItem->get_permalink();
            $permalink = $rssItem->get_permalink();

            $id = $rssItem->get_id();

            // if (isset($permalink)) {

            //  Если новости про науку, тогда вызывается метод getScienceNews
            /*if ($source->from_site) {
                HtmlNewsGrabber::getNews($source->name, $permalink);
                $content = HtmlNewsGrabber::getScienceNews($permalink);
                // $posts = $document->find("//[@id='content']/div/div[1]/p", Query::TYPE_XPATH);
            } else {*/
                // В противном случае возьмется контент из xml
                $content = $rssItem->get_content();
            //}

            $title = $rssItem->get_title();
            $description = $rssItem->get_description();

            // $date_updated = $rssItem->get_updated();
            $date = new DateTime();
            $created_at = $date->format('Y-m-d H:i:s');

            $sourceDate = new DateTime();
            $sourceDate = $rssItem->get_date('Y-m-d H:i:s');

            $images = $rssItem->get_thumbnail();
            // $image_url = $rssItem->get_image_url();
            $image_url = null;
            if (is_array($images) && count($images) > 0)
                $image_url = array_values($images)[0];

            $category = $rssItem->get_category();
            /*if ($category) {
                $categoryTerm = $category->get_term();
                $categoryScheme = $category->get_scheme();
                $categoryLabel = $category->get_label();

                Category::insert(array(
                        'name' => $categoryTerm,
                        'slug' => str_slug($categoryTerm),
                        'image' => '',
                        'status' => 1,
                        'created_at' => $created_at
                    )
                );
            }*/

            $author = $rssItem->get_author();
            if ($author) {
                $authorName = $author->get_name();
                $authorEmail = $author->get_email();
                $authorLink = $author->get_link();
            }

            /*$caption = $rssItem->get_caption();
            if ($caption) {
                $captionEndTime = $author->get_endtime();
                $captionLanguage = $author->get_language();
                $captionText = $author->get_link();
            }*/

            $start = microtime(true);
            $hash = md5($source->url . $title . $description . $content);
            $time_elapsed_secs = microtime(true) - $start;

            if (!News::where('hash', $hash)->first()) {
                try {
                    $item = array(
                        'sourceId' => $source->id,
                        'source_url' => $permalink,
                        'hash' => $hash,
                        'title' => $rssItem->get_title(),
                        'slug' => str_slug($rssItem->get_title()),
                        'details' => $rssItem->get_description(),
                        'content' => $content,
                        'category_id' => $source->category_id,
                        'image' => $image_url, // $rssItem->get_thumbnail(),
                        'status' => 1,
                        'featured' => 1,
                        'source_date' => $sourceDate,
                    );
                    array_push($items, $item);
                    $length = count($items);
                    if (count($items) > $BATCH_SIZE) {
                        News::insert($items);
                        unset($items);
                        $items = array();
                    }
                    // News::create($item);
                    $newNewsCount++;
                } catch (Exception $e) {
                    $err = $e;
                }

            }
        }

        News::insert($items);
        unset($items);
        $items = array();

        return $newNewsCount;
    }

    public static function getScienceNews($permalink)
    {
        $document = new Document($permalink, true);
        $posts = $document->find('p');

        $info = array();
        $i = 0;
        foreach ($posts as $post) {
            $info[$i] = $post->text();
            $i++;
        }
        $content = json_encode($info);

        return $content;
    }

    /*public static function checkDivContent($dom, $contents)
    {
        libxml_use_internal_errors(true);
        $dom->loadHTML($contents);
        libxml_use_internal_errors(false);
        $xpath = new \DOMXPath($dom);

        //$divCNNContent = $xpath->query('//article[@class="pg-rail-tall pg-rail--align-right "]//div//div[@class="pg-rail-tall__wrapper"]//div//div[@class="pg-rail-tall__body"]//section[@class="zn zn-body-text zn-body zn--idx-0 zn--ordinary zn-has-multiple-containers zn-has-61-containers"]//div[@class="l-container"]');

        $result = $xpath->evaluate('//[@id="content"]/div/div[1]/p');
        /*foreach ($xpath->evaluate('//[@id="content"]/div/div[1]/p//node()') as $childNode) {
            $result .= $dom->saveHtml($childNode);
        }*/
    //*[@id="content"]/div/div[1]/p//node()
    // $info = $xpath->evaluate('string(//article[@class="pg-rail-tall pg-rail--align-right "]//div//div[@class="pg-rail-tall__wrapper"]//div//div[@class="pg-rail-tall__body"]//section[@class="zn zn-body-text zn-body zn--idx-0 zn--ordinary zn-has-multiple-containers zn-has-61-containers"])');

    //article[@class="pg-rail-tall pg-rail--align-right "]//div//div[@class="pg-rail-tall__wrapper"]//div//div[@class="pg-rail-tall__body"]//section[@class="zn zn-body-text zn-body zn--idx-0 zn--ordinary zn-has-multiple-containers zn-has-61-containers"]//div[@class="l-container"]//node()
    // $result = trim($info," \t\n\r\0\x0B");

    // $result = str_replace(' ', '', $info);

    /*$temp2 = mb_strlen($trim);
        echo $temp2;


        return $result;
    }*/


    public function create()
    {
        $categories = Category::latest()->select('id', 'name')->where('status', 1)->get();

        return view('backend.news.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|unique:news|max:255',
            'details'       => 'required',
            'category_id'   => 'required',
            'image'         => 'required|image|mimes:jpg,png,jpeg'
        ]);

        if (isset($request->status)) {
            $status = true;
        } else {
            $status = false;
        }

        if (isset($request->featured)) {
            $featured = true;
        } else {
            $featured = false;
        }

        if ($request->hasFile('image')) {
            $imageName = 'news-' . time() . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
        }

        News::create([
            'title'         => $request->title,
            'slug'          => str_slug($request->title),
            'details'       => $request->details,
            'category_id'   => $request->category_id,
            'image'         => $imageName,
            'status'        => $status,
            'featured'      => $featured
        ]);

        return redirect()->route('admin.news.index')->with(['message' => 'News created successfully!']);
    }

    public function edit(News $news)
    {
        $categories = Category::latest()->select('id', 'name')->where('status', 1)->get();
        $news       = News::findOrFail($news->id);

        return view('backend.news.edit', compact('categories', 'news'));
    }
}
