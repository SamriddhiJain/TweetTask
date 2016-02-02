<?php
	$string= $_POST['val'];
	//$string= "Rohit Vemula";
	require_once("twitteroauth-master/twitteroauth/twitteroauth.php");
	/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
	
	$consumerkey = ""; 
	$consumersecret = ""; 
	$accesstoken = ""; 
	$accesstokensecret = "";
	$notweets = 20;

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
