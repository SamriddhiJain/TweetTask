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
	}

	if($string==" "){
		echo $demo_text;
	}else{
		echo $string;
	}
?>