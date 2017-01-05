<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<link rel="stylesheet" href="fonts/PRISTINA/font.css">
	<link rel="stylesheet" href="fonts/KALLS/font.css">
	<link rel="stylesheet" href="fonts/WorstveldSlingExtra/font.css">
	<link rel="stylesheet" href="fonts/centabel/font.css">
	
	<link rel="stylesheet" href="css/styles.css">
   
</head>
<body>
<?php
	require 'kint/Kint.class.php';
	require 'php/ddelofunc.php';
	require "menu.html";

	
	$playerStats = readJsontoArray('json/ddeloPlayerStats.json');
	$playerRating = array();
	foreach ($playerStats as $k => $v) {
		$playerRating[] = $playerStats[$k]->playerRating;
	}
	array_multisort($playerRating, SORT_DESC, $playerStats);
	
?>	
<div class="divOne border">	
	<h1 class="center">Elo Results</h1>
	<table class="table">
		<tr><th class="underline">User Name</th><th class="underline">Rating</th><th class="underline">Games Played</th></tr>
		
<?php
	foreach ($playerStats as $k => $v) {
		$name = $playerStats[$k]->playerEmail;
		$name = explode("@",$name);

		// display statistics for anyone who has finished a game in the last two months
		$sinceLast = time() - strtotime($playerStats[$k]->lastGamePlayed);
		
		// 
		$cutoff = 5356800 ; // 2678400 is equal to 31 days
		if ( $sinceLast < $cutoff ) {
		echo '<tr><td class="left">'.$name[0].'</td><td class="right">'.$playerStats[$k]->playerRating.'</td><td class="right">'.$playerStats[$k]->playerGamesPlayed.'</td></tr>';
		}
	}
?>	

	</table>
</div>
<p>Thank you, and good night.</p>
</body>
</html>
	
