<?php

	require "php/ddelofunc.php" ;
	require "kint/Kint.class.php";

	d(memory_get_usage());



	$fileName = 'test/sample2.csv';
	$file = fopen($fileName, 'r');
	d(memory_get_usage());


	if ($file !== FALSE) {
	    while (($data = fgetcsv($file)) !== FALSE) {

	        //$str .= json_encode($data); // add each json string to a string variable, save later
	        // or

	       $array[] = $data;
	    }
	}
	fclose($file);
	d(memory_get_usage());
	d($array);
	$jsonObject = json_encode($array);
	d($jsonObject);
	d(memory_get_usage());
	$assocArray = json_decode($jsonObject, $assoc = true);
	d($assocArray);

	
?>