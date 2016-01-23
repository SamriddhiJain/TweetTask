<?php

	$demo_text = $_POST['val'];

    require_once 'alchemyapi.php';
    $alchemyapi = new AlchemyAPI('85ca1b3ff37b30f9b3380f69fa7d35871d2a168a');

    $response = $alchemyapi->entities('text',$demo_text, array('sentiment'=>1));

    $string="";

	if ($response['status'] == 'OK') {
		foreach ($response['entities'] as $entity) {
			$string .= $entity['text'];
			$string .= " ";
		}
	} else {
		echo 'Error in the entity extraction call: ', $response['statusInfo'];
	}
	//echo $demo_text;

	/*$url = "https://ajax.googleapis.com/ajax/services/search/news?" .
       "v=1.0&q=".$string."&userip=INSERT-USER-IP";

	// sendRequest
	// note how referer is set manually
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$body = curl_exec($ch);
	curl_close($ch);

	// now, process the JSON string
	$json = json_decode($body);*/
?>