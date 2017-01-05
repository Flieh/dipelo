<?php

	require "php/ddelofunc.php" ;
	require "menu.html";

	// use the following file path  for window system
	// $filename = 'C:\Users\Sean\Downloads/Droidippy Elo Game Report.csv';

	// use the following file path for linux system
	$filename = 'csv/degr.csv';


	if (file_exists($filename)) {
		$file = fopen($filename,'r');
		echo "new file found" ;
	} else {
		die("no new csv file");
	}

	$mapedArray = array_map('str_getcsv', file($filename));
	fclose($file);

	rename($filename, getNextFileName("csv/reportarchive.csv"));

 	if (count($mapedArray) == 0) {
		die("no new records");
	}
	
	unset($mapedArray[0]);
	$oldGames = readJsontoArray('json/ddeloGameList.json');
	echo count($oldGames)."<br/>";
	
	foreach ($mapedArray as $ak => $av) {
		$oldGames[] = array	(	
								"gameNumber" => intval($mapedArray[$ak][2]),
								"gameFinished" => $mapedArray[$ak][3],
								"aEmail" => $mapedArray[$ak][4],
								"aResult" => $mapedArray[$ak][5],
								"eEmail" => $mapedArray[$ak][6],
								"eResult" => $mapedArray[$ak][7],
								"fEmail" => $mapedArray[$ak][8],
								"fResult" => $mapedArray[$ak][9],
								"gEmail" => $mapedArray[$ak][10],
								"gResult" => $mapedArray[$ak][11],
								"iEmail" => $mapedArray[$ak][12],
								"iResult" => $mapedArray[$ak][13],
								"rEmail" => $mapedArray[$ak][14],
								"rResult" => $mapedArray[$ak][15],
								"tEmail" => $mapedArray[$ak][16],
								"tResult" => $mapedArray[$ak][17]
								
							);
	}
	
	echo count($oldGames)."<br/>";
//	writeGameList($oldGames);
	
	
	//when script works remove test from following file name
	writeArraytoJson($oldGames, "json/ddeloGameList.json");
	

	
	
?>