<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// use Weidner\Goutte\GoutteServiceProvider;
use Goutte\Client;

class ScrapeScience extends Command
{
    const SCIENCE_NEWS_URL = "http://esciencenews.com/";
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:science';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grab science news';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected $collections = array(
        'astronomy.space',
        'biology.nature',
        'earth.climate',
        'health.medicine',
        'mathematics.economics',
        'paleontology.archaeology',
        'physics.chemistry',
        'psychology.sociology',
    );

    public function getCollection()
    {
        return $this->collections;
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $command = new ScrapeScience();
        $collections = $command->getCollection();
        foreach ($collections as $collection) {
            $this->scrape($collection);
        }
    }


    public static function scrape($collection)
    {
        $client = new Client();

        $proxies = self::getProxies();
        $guzzle = new \GuzzleHttp\Client(['proxy' => $proxies[rand()]]);
        $client->setClient($guzzle);

        // sending request to http://esciencenews.com
        $crawler = $client->request('GET', self::SCIENCE_NEWS_URL . 'topics/'.$collection.'/latest');

        // get status code of request
        $status_code = $client->getResponse();
        $status_code = $status_code->getStatusCode();

        // check status code
        if($status_code == 200){

            // grab page hrefs
            $pages_hrefs = $crawler->filter('#content div.pager span a')->each(function ($node){
                return $node->attr('href');
            });

            // grab href where we can steal content
            $content_hrefs = $crawler->filter('#content div.unit h2 a')->each(function ($node) {
                return $node->attr('href');
            });

            // grab titles of news
            $titles = $crawler->filter('#content > div > h2 > a')->each(function ($node) {
                return $node->text();
            });

            // follow the content_hrefs for grab full information about news
            $content_array = [];
            foreach ($content_hrefs as $href) {
                $crawler = $client->request('GET', $href, ['proxy' => $proxies[1]]);
                $content = $crawler->filter('#content > div > div.span-14.append-1 > p')->each(function ($node) {
                    return $node->text();
                });
                $content = implode("",$content);
                array_push( $content_array, $content);
            }
            print_r("status code 200");
        } else {
            print_r("status code " . $status_code);
        }

//        $pages = ($crawler->filter('#content > div.pager')->count() > 0)
//            ? $crawler->filter('#content > div.pager:nth-last-child(2)')->text()
//            : 0
//        ;
//
//        for ($i = 0; $i < $pages + 1; $i++) {
//            if ($i != 0) {
//                $crawler = $client->request('GET', env('FUNKO_POP_URL').'/'.$collection.'?page='.$i);
//            }
//
//            $temp = $crawler->filter('.column zn__column--idx-0')->each(function ($node) {
//                $sku = explode('#', $node->filter('.column zn__column--idx-0')->text())[1];
//                $title = trim($node->filter('.title a')->text());
//
//                print_r($sku.', '.$title);
//            });
//        }
//
//        return true;
    }

    public static function getProxies() {

        // initialize variables
        $ip_list = [];
        $proxies_list = [];
        $page_index = 2;

        $client = new Client();

        // site with proxies
        $proxy_source = "http://free-proxy.cz/ru/";

        // set proxy server for request
        $guzzle = new \GuzzleHttp\Client(['proxy' => '1.1.1.246:80']);
        $client->setClient($guzzle);

        // request use proxy
        $crawler = $client->request('GET', $proxy_source);

        // get status request status code
        $status_code = $client->getResponse();
        $status_code = $status_code->getStatusCode();

        // check status code
        if($status_code == 200){
            // grab base64 incode ip
            $ip_list_incode = $crawler->filter("#proxy_list > tbody > tr > td.left > script")->each(function ($node) {
                return $node->text();
            });

            // grab ports
            $ports_list = $crawler->filter("#proxy_list > tbody > tr > td > span")->each(function ($node) {
                return $node->text();
            });

            // get last page
            $last_page = $crawler->filter("body > div.main > div:nth-child(2) > div:nth-child(5) > a:nth-child(18)")->each(function ($node) {
                return $node->text();
            });

            for($page_index; $page_index <= 3 /* temporary use any number because last page is so big*/; $page_index++) {

                // construct page url
                $page_url = $proxy_source . 'proxylist/main/' . $page_index;

                // request page url
                $crawler = $client->request('GET', $page_url);

                // get status request status code
                $page_status_code = $client->getResponse();
                $page_status_code = $page_status_code->getStatusCode();

                if($page_status_code == 200) {

                    // grab base64 incode ip
                    $page_ip_list_incode = $crawler->filter("#proxy_list > tbody > tr > td.left > script")->each(function ($node) {
                        return $node->text();
                    });
                    // array_push($ip_list_incode, $page_ip_list_incode);

                    // grab ports
                    $page_ports_list = $crawler->filter("#proxy_list > tbody > tr > td > span")->each(function ($node) {
                        return $node->text();
                    });
                    // array_push($ports_list, $page_ports_list);

                    foreach ($page_ip_list_incode as $item) {
                        array_push($ip_list_incode, $item);
                    }

                    foreach ($page_ports_list as $item) {
                        array_push($ports_list, $item);
                    }

                    // time out 5 sec to avoid captcha
                    sleep(5);
                }
            }
        }

        // decode incode ip
        foreach ($ip_list_incode as $ip) {
            preg_match('/decode\("(.*)"\)\)/', $ip,$ip_incode);
            $res = base64_decode($ip_incode[1]);
            array_push($ip_list,$res); // $ip_list - decode ip array
        }

        // joining two arrays of decode ip and ports and get proxy adress
        $index = 0;
        foreach ($ports_list as $key_port => $port_item) {
            $proxy = $ip_list[array_keys($ip_list)[$index]] . ":" . $port_item;
            $index++;
            array_push($proxies_list, $proxy); // $proxy_list - array of proxy adresses
        }

        self::checkProxyAlive($proxies_list);

        return $proxies_list;
    }

    public static function checkProxyAlive($proxies_list) {

        $client = new Client();

        foreach ($proxies_list as $proxy) {
            $guzzle = new \GuzzleHttp\Client(['proxy' => $proxy]);
            $client->setClient($guzzle);
            $proxies_list[array_keys($proxies_list)];

            // request use proxy
            try {
                $start = microtime(true);
                $crawler = $client->request('GET', 'google.com');
                $end = microtime(true) - $start;
            } catch (Exception $e) {
                $guzzle = new \GuzzleHttp\Client(['proxy' => $proxy]);
                $client->setClient($guzzle);
            }


            $status_code = $client->getResponse();
            $status_code = $status_code->getStatusCode();

            if ($status_code == 200) {

            }
        }
    }
}
