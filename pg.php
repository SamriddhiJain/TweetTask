<?php
    $url = "http://www.google.com/trends/hottrends/atom/feed?pn=p3";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch, CURLOPT_REFERER, 10.8.0.1);
    curl_setopt($ch, CURLOPT_PROXY, "10.8.0.1:8080");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $body = curl_exec($ch);
    curl_close($ch);

    $re = "/<title>(.+)<\/title>/"; 
     
    preg_match_all($re, $body, $matches);

    $results=$matches[1];

    echo json_encode($results);
?>