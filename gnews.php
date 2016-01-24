<?php
	$string= $_POST['val'];
	$start= $_POST['start'];
	$cnt=0;

	for($i=0;$i<7;$i+=8){

		$url = "https://ajax.googleapis.com/ajax/services/search/news?v=1.0&q=".urlencode($string)."&rsz=large&start=".$start;

		// sendRequest
		// note how referer is set manually
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($ch, CURLOPT_REFERER, 10.8.0.1);
		curl_setopt($ch, CURLOPT_PROXY, "10.8.0.1:8080");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$body = curl_exec($ch);
		curl_close($ch);

		// now, process the JSON string
		//echo $body;
		//var_dump(json_decode($body));
		$json = json_decode($body);
		//var_dump($json);
		//echo $body;
		if($body==""){
			echo "gvkhvk";
		}else{
			echo $body;
		}
		//echo "wevwe";
	}
?>