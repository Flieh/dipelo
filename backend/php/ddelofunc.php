<?php
<<<<<<< HEAD

=======
	
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
	//receive a json filepath and send back an array with the data
	function readJsontoArray($filepath) {
		$file = fopen($filepath,"r");
		$array = json_decode(file_get_contents($filepath),$assoc = false);
		fclose($file);
		return $array;
	}

	function readJsontoAssocArray($filepath) {
		$file = fopen($filepath,"r");
		$array = json_decode(file_get_contents($filepath),$assoc = true);
		fclose($file);
		return $array;
	}
<<<<<<< HEAD

=======
	
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
	//CREATE receive an array and a filepath and create a json file with the array data accept a boolean to sort or not
	function writeArraytoJson ($array, $filepath) {
		$file = fopen($filepath,"w");
		file_put_contents($filepath, json_encode($array,false));
<<<<<<< HEAD
		fclose($file);
=======
		fclose($file);		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
	}

		// sort the list of unique players and crush write it
	function writePlayerList($array) {
		sort($array);
		$file = fopen("json/ddeloPlayerList.json","w");
		file_put_contents("json/ddeloPlayerList.json", json_encode($array,false));
		fclose($file);
	}
<<<<<<< HEAD

=======
	
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		//encode the array and save it as the game list
	function writeGameList($array) {
		sort($array);
		$file = fopen("json/ddeloGameList.json","w");
		file_put_contents("json/ddeloGameList.json", json_encode($array,false));
		fclose($file);
	}
<<<<<<< HEAD


	function getNewRatings($rating,$gamesPlayed,$result) {

=======
	
	
	function getNewRatings($rating,$gamesPlayed,$result) {
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		// define number of players and find out how many are fully rated(powers)
		$numPow = 7;
		$numFull = 0;
		foreach ($gamesPlayed as $k => $v) {
			if ($v > 6) { $numFull++;}
		}
<<<<<<< HEAD



=======
		
			
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		// establish game modifiers (fully rated players, press options, variant options)
		$adjFull = 1 + ($numFull / $numPow);
		$adjPress = 1;
		$adjVar = 1;
		$gamVal = 7.5 * $adjFull * $adjPress * $adjVar;
<<<<<<< HEAD


=======
		
								
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d



		// calculate each players strength(based on rating) and the strength of the game (the sum of all player strengths)
		$strength = array();
		foreach ($rating as $k => $v) {
			$strength[] = pow (2.71828182846 , ( $v / 500 ) );
		}
<<<<<<< HEAD

=======
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d


		// calculate each players expected gains (based on player strength and game strength)
		$expected = array();
		foreach ($strength as $k => $v) {
			$expected[] = 7 * ( $v / array_sum($strength));
		}
<<<<<<< HEAD


=======
		
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		//calculate each players experience based on number of games played
		$xp = array();
		foreach ($gamesPlayed as $k => $v) {
			$xp[] = 1 + ( 40 / ( 10 + $v ));
		}
<<<<<<< HEAD

		//find number of winners
		$numWinners = 0;
=======
		
		//find number of winners
		$numWinners = 0;	
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		foreach ($result as $k => $v) {
			if ($v == "Win") {$numWinners++;}
		}

		//calculate each players delta and new rating based on result and expected gain
		$delta = array();
		foreach ($result as $k => $v) {
			if ($v == "Win") {
				$delta[] = round($xp[$k] * $gamVal * ( ( $numPow / $numWinners ) - $expected[$k] ));
			} else {
				$delta[] = round($xp[$k] * $gamVal * (0 - $expected[$k]));
<<<<<<< HEAD
			}
		}

		//calculate each players new rating based on current rating
=======
			} 
		}

		//calculate each players new rating based on current rating 
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		$newRating = array();
		foreach ($delta as $k =>$v) {
			$newRating[] = $v + $rating[$k];
		}
<<<<<<< HEAD

		return $newRating;


	}

	function getNewRatingsWeighted($rating,$gamesPlayed,$result) {

		// define number of players and find out how many are fully rated(powers)
		$numPow = 7;
		$numFull = 0;
		foreach ($gamesPlayed as $k => $v) {
			if ($v > 6) { $numFull++;}
		}
		$countryWeights = array(1.2, 1.0, 0.8, 1.0, 1.2, 0.8, 1.0);


		// establish game modifiers (fully rated players, press options, variant options)
		$adjFull = 1 + ($numFull / $numPow);
		$adjPress = 1;
		$adjVar = 1;
		$gamVal = 7.5 * $adjFull * $adjPress * $adjVar;





		// calculate each players strength(based on rating) and the strength of the game (the sum of all player strengths)
		$strength = array();
		foreach ($rating as $k => $v) {
			$strength[] = pow (2.71828182846 , ( $v / 500 ) );
		}



		// calculate each players expected gains (based on player strength and game strength)
		$expected = array();
		foreach ($strength as $k => $v) {
			$expected[] = 7 * ( $v / array_sum($strength));
		}


		//calculate each players experience based on number of games played
		$xp = array();
		foreach ($gamesPlayed as $k => $v) {
			$xp[] = 1 + ( 40 / ( 10 + $v ));
		}

		//find number of winners
		$numWinners = 0;
		foreach ($result as $k => $v) {
			if ($v == "Win") {$numWinners++;}
		}

		//calculate each players delta and new rating based on result and expected gain
		$delta = array();
		foreach ($result as $k => $v) {
			if ($v == "Win") {
				$delta[] = round($countryWeights[$k] * $xp[$k] * $gamVal * ( ( $numPow / $numWinners ) - $expected[$k] ));
			} else {
				$delta[] = round((1/$countryWeights[$k]) * $xp[$k] * $gamVal * (0 - $expected[$k]));
			}
		}

		//calculate each players new rating based on current rating
		$newRating = array();
		foreach ($delta as $k =>$v) {
			$newRating[] = $v + $rating[$k];
		}

		return $newRating;


	}

	function getNewRatingsVerbose($rating,$gamesPlayed,$result) {

=======
		
		return $newRating;

		
	}
	
	function getNewRatingsVerbose($rating,$gamesPlayed,$result) {
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		// define number of players and find out how many are fully rated(powers)
		$numPow = 7;
		$numFull = 0;
		foreach ($gamesPlayed as $k => $v) {
			if ($v > 6) { $numFull++;}
		}
<<<<<<< HEAD

		?>

			<div class = "legend">There are <span class="numbers"><?php echo $numPow; ?></span> players of whom <span class="numbers"><?php echo $numFull; ?></span> are fully rated (at least 7 games prior to this one).<br/><br/>


		<?php


=======
		
		?>
		
			<div class = "legend">There are <span class="numbers"><?php echo $numPow; ?></span> players of whom <span class="numbers"><?php echo $numFull; ?></span> are fully rated (at least 7 games prior to this one).<br/><br/>
			
			
		<?php
			
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		// establish game modifiers (fully rated players, press options, variant options)
		$adjFull = 1 + ($numFull / $numPow);
		$adjPress = 1;
		$adjVar = 1;
		$gamVal = 7.5 * $adjFull * $adjPress * $adjVar;
<<<<<<< HEAD

		?>


								The modifiers for the game are:<br/>
								&nbsp;&nbsp;&nbsp;&nbsp;Adjustment for fully rated players :
=======
		
		?>
		
			
								The modifiers for the game are:<br/>
								&nbsp;&nbsp;&nbsp;&nbsp;Adjustment for fully rated players : 
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
								<span class="numbers"><?php echo $adjFull; ?><br/></span>
								&nbsp;&nbsp;&nbsp;&nbsp;Adjustment for press type :
								<span class="numbers"><?php echo $adjPress; ?><br/></span>
								&nbsp;&nbsp;&nbsp;&nbsp;Adjustment for game variant :
								<span class="numbers"><?php echo $adjVar; ?><br/></span>
<<<<<<< HEAD
								&nbsp;&nbsp;&nbsp;&nbsp;Giving a game value of (7.5 times the modifiers):
								<span class="numbers"><?php echo $gamVal; ?><br/><br/></span>

		<?php

=======
								&nbsp;&nbsp;&nbsp;&nbsp;Giving a game value of (7.5 times the modifiers): 
								<span class="numbers"><?php echo $gamVal; ?><br/><br/></span>
			
		<?php
								
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d



		// calculate each players strength(based on rating) and the strength of the game (the sum of all player strengths)
		$strength = array();
		foreach ($rating as $k => $v) {
			$strength[] = pow (2.71828182846 , ( $v / 500 ) );
		}
<<<<<<< HEAD

		?>

=======
		
		?>
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		<p>
		Each player is assigned a relative strength based<br/>
		on his rating. The formula is strength equals<br/>
		e raised to the power of (rating divided by 500)<br/>
		</p>
<<<<<<< HEAD
		<?php
=======
		<?php 
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		foreach ($strength as $k => $v) {
		?>
				&nbsp;&nbsp;&nbsp;&nbsp;<span class="<?php echo getCountryName ($k);?>"><?php echo getCountryName ($k);?></span> : <span class='numbers'><?php echo $strength[$k];?></span><br/>
<?php
		}
?>

		<p>
		Calculate each players expected gains based on<br/>
		relative strength<br/>
		</p>
<?php

		// calculate each players expected gains (based on player strength and game strength)
		$expected = array();
		foreach ($strength as $k => $v) {
			$expected[] = 7 * ( $v / array_sum($strength));
		}
<<<<<<< HEAD

=======
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		foreach ($expected as $k => $v) {
		?>
			&nbsp;&nbsp;&nbsp;&nbsp;<span class="<?php echo getCountryName ($k);?>"><?php echo getCountryName ($k);?></span> : <span class='numbers'><?php echo $expected[$k];?></span><br/>
		<?php
		}
<<<<<<< HEAD

=======
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		//calculate each players experience based on number of games played
		$xp = array();
		foreach ($gamesPlayed as $k => $v) {
			$xp[] = 1 + ( 40 / ( 10 + $v ));
		}
<<<<<<< HEAD

		//find number of winners
		$numWinners = 0;
=======
		
		//find number of winners
		$numWinners = 0;	
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		foreach ($result as $k => $v) {
			if ($v == "Win") {$numWinners++;}
		}

		//calculate each players delta and new rating based on result and expected gain
		$delta = array();
		foreach ($result as $k => $v) {
			if ($v == "Win") {
				$delta[] = round($xp[$k] * $gamVal * ( ( $numPow / $numWinners ) - $expected[$k] ));
			} else {
				$delta[] = round($xp[$k] * $gamVal * (0 - $expected[$k]));
<<<<<<< HEAD
			}
		}

		//calculate each players new rating based on current rating
=======
			} 
		}

		//calculate each players new rating based on current rating 
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		$newRating = array();
		foreach ($delta as $k =>$v) {
			$newRating[] = $v + $rating[$k];
		}
<<<<<<< HEAD

=======
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		?>
		</div>
		<?php
		return $newRating;

<<<<<<< HEAD

	}


=======
		
	}
	
	
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d

	//funtion to receive a file path check if it exits then return the next non existing filepath
	function getNextFileName ($filePath) {
		//$filePath="json/test.json";
		$filePathElements = explode(".",$filePath);
		$index = "";
<<<<<<< HEAD

=======
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		while (file_exists($filePathElements[0].$index.".".$filePathElements[1])) {
			$index++;
			$oldFile = $filePathElements[0].$index.".".$filePathElements[1];
		}
<<<<<<< HEAD

		return ($filePathElements[0].$index.".".$filePathElements[1]);
	}

=======
		
		return ($filePathElements[0].$index.".".$filePathElements[1]);
	}
	
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
	//getCountryName function receives an index and returns a string with the name of a country
	function getCountryName ($i) {
		switch ($i) {
			case 0 :
				return 'Austria';
			case 1 :
				return 'England';
			case 2 :
				return 'France';
			case 3 :
				return 'Germany';
			case 4 :
				return 'Italy';
			case 5 :
				return 'Russia';
			case 6 :
				return 'Turkey';
			default:
				return 'ERROR';
		}
	}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
