<?php
    //$test=$_POST['val'];
	$test="Rohit Vemula";
    $str2 = 'python trysam.py '.$test;
    $var=exec($str2);
    echo $var;
?>