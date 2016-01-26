<?php

	$str=$_POST['val'];
	$re = "/(.*)http/s"; 
	preg_match($re, $str, $matches);

	$test="";
	if($matches[1]==""){
		$test=$str;
	}else{
		$test=$matches[1];
	}
	//echo $test;

	$str2 = 'python s4test.py '.$test;
	$var=exec($str2);
	//echo $var;
	$re2 = "/u'keyphrasesTfIdf': \\[(.+)\\], u'entities'/"; 
	preg_match_all($re2, $var, $matches2);

	$re3 = "/u'(.+)'/"; 
	
	$array=explode(',', $matches2[1][0]);
	$fval="";
	foreach ($array as &$val) {
		preg_match_all($re3, $val, $matches3);
		$fval.=$matches3[1][0]." ";
	}

	echo $fval;
?>