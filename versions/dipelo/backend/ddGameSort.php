
<?php

	require "php/ddelofunc.php" ;
	require "menu.html";
	require "kint/Kint.class.php";
	
	$gameList = readJsontoAssocArray("json/ddeloGameList.json");

	$sort = array();
	foreach ($gameList as $key => $val) {
		$sort['gameFinished'][$key] = $val['gameFinished'];
		$sort['gameNumber'][$key] = $val['gameNumber'];		
	}


	array_multisort($sort['gameFinished'], SORT_ASC, $sort['gameNumber'], SORT_ASC, $gameList);

	writeArraytoJson($gameList, 'json/ddeloGameList.json');
		
?>