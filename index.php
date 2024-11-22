<?php
include './main.php';
function getAPI(): string
{
$url = 'https://newsapi.org/v2/everything?q=Apple&from=2024-11-19&sortBy=popularity&apiKey=f11cbef9d83644cdb87321f1c7098c58';
// массив для переменных, которые будут переданы с запросом
$header = [
'Accept-Language: en-US,en;q=0.5',
'Cache-Control: no-cache',
'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0',
'X-MicrosoftAjax: Delta=true'
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$result = curl_exec($ch);
var_dump(curl_error($ch));
curl_close($ch);

return $result;
}

function handler($event, $context)
{
$response = json_decode(getAPI(), true);

return [
"statusCode" => 200,
"body" => getPage($response['articles']),
];
}
