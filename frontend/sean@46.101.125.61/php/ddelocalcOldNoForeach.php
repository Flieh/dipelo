<?php

	// Kint debugging paramaters
	require '../kint/Kint.class.php';
	// Kint::dump( $_SERVER);
	// Kint::trace();



	// define number of players and find out how many are fully rated(powers)
	$numPow = 7;
	$numFull = 0;
	for ($i = 0 ; $i < 7 ; $i++) {
		if ($gamesPlayed[$i] > 6) {
			$numFull ++;
		}
	}


	// establish game modifiers (fully rated players, press options, variant options)
	$adjFull = 1 + ($numFull / $numPow);
	$adjPress = 1;
	$adjVar = 1;
	$gamVal = 7.5 * $adjFull * $adjPress * $adjVar;



	// calculate each players strength(based on rating) and the strength of the game (the sum of all player strengths)
	$totalStrength = 0;
	$strength = array();
	for ($i = 0 ; $i < 7 ; $i++) {
		$strength[$i] = pow (2.71828182846 , ( $rating[$i] / 500 ) );
		$totalStrength = $totalStrength + $strength[$i];
	}

	// calculate each players expected gains (based on player strength and game strength)
	$expected = array();
	for ($i = 0 ; $i < 7 ; $i++) {
		$expected[$i] = 7 * ($strength[$i] / $totalStrength) ;
	}
	
	//calculate each players experience based on number of games played
	$xp = array();
	for ($i = 0 ; $i < 7 ; $i++) {
		$xp[$i] = 1 + ( 40 / ( 10 + $gamesPlayed[$i] ) );
	}
	
	//find the number of winners 
	$numWinners = 0;
	for ($i = 0 ; $i < 7 ; $i++) {
		if ($result[$i] == "Win") {
			$numWinners++;
		}
	}
	
	//calculate each players delta and new rating based on result and expected gain
	$delta = array();
	for ($i = 0 ; $i < 7 ; $i++) {
		if ($result[$i]== "Win") {
			$delta[$i] = round($xp[$i] * $gamVal * ( ( $numPow / $numWinners ) - $expected[$i] ));
		} else {
			$delta[$i] = round($xp[$i] * $gamVal * (0 - $expected[$i]));
		}
	}

	//calculate each players new rating based on current rating 
	$newRating = array();
	for ($i = 0 ; $i < 7 ; $i++) {
		$newRating[$i] = $rating[$i] + $delta[$i];
	}
	//d($delta); d($newRating)


?>