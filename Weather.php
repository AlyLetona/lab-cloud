<?php
  $id=$_GET["q"]; // id города
  $url="http://export.yandex.ru/weather-ng/forecasts/".$id.".xml"; // url xml файла 
    $xml = simplexml_load_file($url); // интерпретируем XML-файл в объект
    //параметры:
    $city=$xml['city']; //город
    $temp=$xml->fact->temperature; // температура
    $weather_type=$xml->fact->weather_type; // тип погоды
    $humidity=$xml->fact->humidity; // влажность
    $wind_direction=$xml->fact->wind_direction; // направление ветра
    $wind_speed=$xml->fact->wind_speed; // скорость ветра
    $pressure=$xml->fact->pressure; // давление
       
   
 $znak="плюс";
 if($wind_direction=="e") { $wind_direction_text="восточный";}
 if($wind_direction=="w") { $wind_direction_text="западный";}
 if($wind_direction=="s") { $wind_direction_text="южный";}
 if($wind_direction=="n") { $wind_direction_text="северный";}
 if($wind_direction=="se") { $wind_direction_text="юго-восточный";}
 if($wind_direction=="ne") { $wind_direction_text="северо-восточный";} 
 if($wind_direction=="sw") { $wind_direction_text="юго-западный";}
 if($wind_direction=="nw") { $wind_direction_text="северо-западный";} 
            
 $minus_arry=preg_match("/(-)/", $temp, $minus_out);
 if (!empty($minus_out[1]))
 { $znak="минус";
  $temp=str_replace("-","",$temp);
 }
       
  //градус
   if( $temp=="1" or $temp=="21" or $temp=="31" or $temp=="41" or $temp=="51" or $temp=="61" or $temp=="71" or $temp=="81" or $temp=="91" or $temp=="101") 
   {
     $text="градус";
   } 
   else 
   {
 //градуса 
   if(   $temp=="2"  or $temp=="3"  or $temp=="4"
     or $temp=="22" or $temp=="23" or $temp=="24" 
     or $temp=="32" or $temp=="33" or $temp=="34" 
     or $temp=="42" or $temp=="43" or $temp=="44" 
     or $temp=="52" or $temp=="53" or $temp=="54"
     or $temp=="62" or $temp=="63" or $temp=="64" 
     or $temp=="72" or $temp=="73" or $temp=="74" 
     or $temp=="82" or $temp=="83" or $temp=="84" 
     or $temp=="92" or $temp=="93" or $temp=="94"
     or $temp=="102" or $temp=="103"
    ) {$text="градуса";} else {$text="градусов";}             
        
   }
           
           
           
   //процент
     
   if( $humidity=="1" or $humidity=="21" or $humidity=="31" or $humidity=="41" or $humidity=="51" or $humidity=="61" or $humidity=="71" or $humidity=="81" or $humidity=="91" or $humidity=="101") 
   {
    $humidity_text="процент";
   } 
   else 
   {
  //процента 
    if(   $humidity=="2"  or $humidity=="3"  or $humidity=="4"
      or $humidity=="22" or $humidity=="23" or $humidity=="24" 
      or $humidity=="32" or $humidity=="33" or $humidity=="34" 
      or $humidity=="42" or $humidity=="43" or $humidity=="44" 
      or $humidity=="52" or $humidity=="53" or $humidity=="54"
      or $humidity=="62" or $humidity=="63" or $humidity=="64" 
      or $humidity=="72" or $humidity=="73" or $humidity=="74" 
      or $humidity=="82" or $humidity=="83" or $humidity=="84" 
      or $humidity=="92" or $humidity=="93" or $humidity=="94"
      or $humidity=="102" or $humidity=="103"
    ) {$humidity_text="процента";} else {$humidity_text="процентов";}             
          
   } 
           
           
    //миллиметр
   if( $pressure=="701" or $pressure=="721" or $pressure=="731" or $pressure=="741" or $pressure=="751" or $pressure=="761" or $pressure=="771" or $pressure=="781" or $pressure=="791" or $pressure=="801") 
   {
    $pressure_text="милиметр ртутного столба";
   } 
   else 
   {
  //миллиметра 
    if(   $pressure=="702" or $pressure=="703" or $pressure=="704"
      or $pressure=="722" or $pressure=="723" or $pressure=="724" 
      or $pressure=="732" or $pressure=="733" or $pressure=="734" 
      or $pressure=="742" or $pressure=="743" or $pressure=="744" 
      or $pressure=="752" or $pressure=="753" or $pressure=="754"
      or $pressure=="762" or $pressure=="763" or $pressure=="764" 
      or $pressure=="772" or $pressure=="773" or $pressure=="774" 
      or $pressure=="782" or $pressure=="783" or $pressure=="784" 
      or $pre
