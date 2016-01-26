<?php
	$string= $_POST['val'];
	//$string= "Rohit Vemula";
	require_once("twitteroauth-master/twitteroauth/twitteroauth.php");
	/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
	
	$consumerkey = "s32ku8Q9COXIZc84MoE71j9wK"; 
	$consumersecret = "6yKHtC4onmBx5vBenEj4uQwCXwL9omwKeX2dRqBy9PC6WeDXG5"; 
	$accesstoken = "4733276482-5JSpMp8KqjhhiELjez8FpIdy2ZzClnUVaL7ru54"; 
	$accesstokensecret = "BcUvJ6U4frtu5ITbgOzYmNY4dU0RDiSinRNXUK7DV8nlX";
	$notweets = 10;

	function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
	  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
	  return $connection;
	}

	$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

	$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=".urlencode($string)."&count=".$notweets);
	$json=$tweets->statuses;	
	$id="";
	
	$stack = array();

	foreach ($json as $key) {
		$id=$key->id_str;
		$tweets = $connection->get("https://api.twitter.com/1.1/statuses/oembed.json?id=".$id."&omit_script=true");
		$results = $tweets->html;
		array_push($stack, $results);
	}

	echo json_encode($stack);

?>