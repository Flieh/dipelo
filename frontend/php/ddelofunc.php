<?php
	
	//receive a json filepath and send back an array with the data
	function readJsontoArray($filepath) {
		$file = fopen($filepath,"r");
		$array = json_decode(file_get_contents($filepath),$assoc = false);
		fclose($file);
		return $array;
	}
<<<<<<< HEAD

	function readJsontoAssocArray($filepath) {
		$file = fopen($filepath,"r");
		$array = json_decode(file_get_contents($filepath),$assoc = true);
		fclose($file);
		return $array;
	}
=======
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
	
	//CREATE receive an array and a filepath and create a json file with the array data accept a boolean to sort or not
	function writeArraytoJson ($array, $filepath) {
		$file = fopen($filepath,"w");
		file_put_contents($filepath, json_encode($array,false));
		fclose($file);		
	}

		// sort the list of unique players and crush write it
	function writePlayerList($array) {
		sort($array);
		$file = fopen("json/ddeloPlayerList.json","w");
		file_put_contents("json/ddeloPlayerList.json", json_encode($array,false));
		fclose($file);
	}
	
		//encode the array and save it as the game list
	function writeGameList($array) {
		sort($array);
		$file = fopen("json/ddeloGameList.json","w");
		file_put_contents("json/ddeloGameList.json", json_encode($array,false));
		fclose($file);
	}
	
	
	function getNewRatings($rating,$gamesPlayed,$result) {
		
		// define number of players and find out how many are fully rated(powers)
		$numPow = 7;
		$numFull = 0;
		foreach ($gamesPlayed as $k => $v) {
			if ($v > 6) { $numFull++;}
		}
		
			
		
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
				$delta[] = round($xp[$k] * $gamVal * ( ( $numPow / $numWinners ) - $expected[$k] ));
			} else {
				$delta[] = round($xp[$k] * $gamVal * (0 - $expected[$k]));
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
		
		// define number of players and find out how many are fully rated(powers)
		$numPow = 7;
		$numFull = 0;
		foreach ($gamesPlayed as $k => $v) {
			if ($v > 6) { $numFull++;}
		}
		
		?>
		
			<div class = "legend">There are <span class="numbers"><?php echo $numPow; ?></span> players of whom <span class="numbers"><?php echo $numFull; ?></span> are fully rated (at least 7 games prior to this one).<br/><br/>
			
			
		<?php
			
		
		// establish game modifiers (fully rated players, press options, variant options)
		$adjFull = 1 + ($numFull / $numPow);
		$adjPress = 1;
		$adjVar = 1;
		$gamVal = 7.5 * $adjFull * $adjPress * $adjVar;
		
		?>
		
			
								The modifiers for the game are:<br/>
								&nbsp;&nbsp;&nbsp;&nbsp;Adjustment for fully rated players : 
								<span class="numbers"><?php echo $adjFull; ?><br/></span>
								&nbsp;&nbsp;&nbsp;&nbsp;Adjustment for press type :
								<span class="numbers"><?php echo $adjPress; ?><br/></span>
								&nbsp;&nbsp;&nbsp;&nbsp;Adjustment for game variant :
								<span class="numbers"><?php echo $adjVar; ?><br/></span>
								&nbsp;&nbsp;&nbsp;&nbsp;Giving a game value of (7.5 times the modifiers): 
								<span class="numbers"><?php echo $gamVal; ?><br/><br/></span>
			
		<?php
								



		// calculate each players strength(based on rating) and the strength of the game (the sum of all player strengths)
		$strength = array();
		foreach ($rating as $k => $v) {
			$strength[] = pow (2.71828182846 , ( $v / 500 ) );
		}
		
		?>
		
		<p>
		Each player is assigned a relative strength based<br/>
		on his rating. The formula is strength equals<br/>
		e raised to the power of (rating divided by 500)<br/>
		</p>
		<?php 
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
		
		foreach ($expected as $k => $v) {
		?>
			&nbsp;&nbsp;&nbsp;&nbsp;<span class="<?php echo getCountryName ($k);?>"><?php echo getCountryName ($k);?></span> : <span class='numbers'><?php echo $expected[$k];?></span><br/>
		<?php
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
				$delta[] = round($xp[$k] * $gamVal * ( ( $numPow / $numWinners ) - $expected[$k] ));
			} else {
				$delta[] = round($xp[$k] * $gamVal * (0 - $expected[$k]));
			} 
		}

		//calculate each players new rating based on current rating 
		$newRating = array();
		foreach ($delta as $k =>$v) {
			$newRating[] = $v + $rating[$k];
		}
		
		?>
		</div>
		<?php
		return $newRating;

		
	}
	
	

	//funtion to receive a file path check if it exits then return the next non existing filepath
	function getNextFileName ($filePath) {
		//$filePath="json/test.json";
		$filePathElements = explode(".",$filePath);
		$index = "";
		
		while (file_exists($filePathElements[0].$index.".".$filePathElements[1])) {
			$index++;
			$oldFile = $filePathElements[0].$index.".".$filePathElements[1];
		}
		
		return ($filePathElements[0].$index.".".$filePathElements[1]);
	}
	
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
?>