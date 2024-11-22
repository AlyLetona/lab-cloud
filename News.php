<?php
$city=$_GET['q'];
  
$data_file="http://news.yandex.ru/".$city."/index.rss"; // адрес xml файла 
$xml = simplexml_load_file($data_file); // раскладываем xml на массив

$number= rand(1,13); //генерируем порядковый номер новости

$news=$xml->channel->item[$number]->description; //новость
$title=$xml->channel->item[$number]->title; //заголовок
    

$content_news = trim(preg_replace('/\s{2,}/', ' ', $news));//удаляем весь хлам
$content_title = trim(preg_replace('/\s{2,}/', ' ', $title));//удаляем весь хлам

$text=$content_title." - ".$content_news;
$search = array('"','"',' ',')','(');
$replace   = array('');

$text = str_replace($search, $replace, $text);
$qs = http_build_query(array("format" => "mp3","lang" => "ru-RU","speaker" => "jane","key" => "SpeechKit_Cloud_API_Key","emotion" => "good", "text" => $text)); // параметры запроса
$ctx = stream_context_create(array("http"=>array("method"=>"GET","header"=>"Referer: \r\n")));
$soundfile = file_get_contents("https://tts.voicetech.yandex.net/generate?".$qs, false, $ctx); // запрос на генерацию mp3 файла
echo($soundfile);    
?>
