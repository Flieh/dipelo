<!doctype html>
<html>
<head>
<<<<<<< HEAD

	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="css/styles.css">

=======
	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<link rel="stylesheet" href="fonts/PRISTINA/font.css">
	<link rel="stylesheet" href="fonts/KALLS/font.css">
	<link rel="stylesheet" href="fonts/WorstveldSlingExtra/font.css">
	<link rel="stylesheet" href="fonts/centabel/font.css">
	
	<link rel="stylesheet" href="css/styles.css">
   
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
</head>
<body>
<?php
	require 'kint/Kint.class.php';
	require 'php/ddelofunc.php';
	require "menu.html";

<<<<<<< HEAD

=======
	
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
	$playerStats = readJsontoArray('json/ddeloPlayerStats.json');
	$playerRating = array();
	foreach ($playerStats as $k => $v) {
		$playerRating[] = $playerStats[$k]->playerRating;
	}
	array_multisort($playerRating, SORT_DESC, $playerStats);
<<<<<<< HEAD

?>
<div class="divOne border">
	<h1 class="center title">Elo Results</h1>
	<table class="table">
		<tr><th class="underline">User Name</th><th class="underline">Rating</th><th class="underline">Games Played</th></tr>

=======
	
?>	
<div class="divOne border">	
	<h1 class="center">Elo Results</h1>
	<table class="table">
		<tr><th class="underline">User Name</th><th class="underline">Rating</th><th class="underline">Games Played</th></tr>
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
<?php
	foreach ($playerStats as $k => $v) {
		$name = $playerStats[$k]->playerEmail;
		$name = explode("@",$name);
<<<<<<< HEAD

		// display statistics for anyone who has finished a game in the last two months
		$sinceLast = time() - strtotime($playerStats[$k]->lastGamePlayed);

		//
		$cutoff = 5356800 ; // 2678400 is equal to 31 days
		if ( $sinceLast < $cutoff ) {
		echo '<tr><td class="left">'.$name[0].'</td><td class="right">'.$playerStats[$k]->playerRating.'</td><td class="right">'.$playerStats[$k]->playerGamesPlayed.'</td></tr>';
		}
	}
?>
=======
		echo '<tr><td class="left">'.$name[0].'</td><td class="right">'.$playerStats[$k]->playerRating.'</td><td class="right">'.$playerStats[$k]->playerGamesPlayed.'</td></tr>';
	}
?>	
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d

	</table>
</div>
<p>Thank you, and good night.</p>
</body>
</html>
<<<<<<< HEAD

=======
	
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
