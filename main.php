<?php
function getPage(array $array = []) {
$start = '
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>
body{
background-color: #ECEEF2;
}
header{
background-color: white;
}
main{
display: flex;
flex-direction: row;
flex-wrap: wrap;
justify-content: center;
align-items: center;
}
img{
height: 160px;
border-radius: 2%;
}
div{
margin-bottom: 5px;
}
article{
border: 1px black;
border-radius: 2%;
width: 35%;
min-height: 280px;
padding: 5px;
margin: 0 auto;
margin-bottom: 25px;
background-color: white;
}
</style>
<title>Document</title>
</head>
<body>
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
<a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
<svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
<span class="fs-4">Новости</span>
</a>
</header>
<main>';
$end = '</main></body></html>';
$body = '';
foreach ($array as $value) {
$title = $value['title'];
$author = $value['author'];
$desc = $value['decription'];
$publishedAt = $value['publishedAt'];
$imgUrl = '"' . $value['urlToImage'] . '"';
$urlContent = '"' . $value['url'] . '"';
$article = "
<article>
<div>$title</div>
<div>Автор: $author</div>
<div>$desc</div>
<div class='div-img'><img src=$imgUrl></div>
<div>Опубликовано: $publishedAt</div>
<div><a href=$urlContent>Подробнее</a></div>
</article>";

$body = $body . $article;
}

return $start . $body . $end;
}
