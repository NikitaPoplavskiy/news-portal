<?

namespace App\Http\Controllers;

use DiDom\Document;

class HtmlNewsGrabber extends Controller {

    public static function getNews($name) {
        $class_name = get_called_class();
        $function_name = self::toMethodName($name);
        return forward_static_call(array($class_name, $function_name));
    }

    public static function toMethodName($name) {
        // science news -> getScienceNews()
        // cnn -> getCnnNews()
        // reddit -> getRedditNews()

        $res =  ucwords($name);
        $res = "get" . str_replace(' ', '', $res);
        return $res;
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
}


?>
