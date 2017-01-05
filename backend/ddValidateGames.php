<?php

	require "menu.html";
	require "php/ddelofunc.php";

<<<<<<< HEAD

	$gameList = readJsontoArray("json/ddeloGameList.json");
	$errorExit = false;

=======
	
	$gameList = readJsontoArray("json/ddeloGameList.json");
	$errorExit = false;	
	
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
	// check for duplicate games
	$arrayCount = count($gameList);
	echo "There are currenty " , $arrayCount , " games in the Game List.</br>";
	for ($i = 0 ; $i < $arrayCount ; $i++) {
		for ($j = $i + 1 ; $j < $arrayCount ; $j++) {
			if ($gameList[$i]->gameNumber == $gameList[$j]->gameNumber) {
				echo "WARNING! Game Number ".$gameList[$i]->gameNumber." is 		duplicated.<br/>";
				$errorExit = true;
			}
		}
	}
<<<<<<< HEAD

=======
	
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
	// check that there is at least one winner per game
	foreach ($gameList as $ak => $av) {
		if ($gameList[$ak]->aResult=="Lose"&&
			$gameList[$ak]->eResult=="Lose"&&
			$gameList[$ak]->fResult=="Lose"&&
			$gameList[$ak]->gResult=="Lose"&&
			$gameList[$ak]->iResult=="Lose"&&
			$gameList[$ak]->rResult=="Lose"&&
			$gameList[$ak]->tResult=="Lose") {
				echo "WARNING! Game Number ".$gameList[$ak]->gameNumber." has no winner.<br/>";
				$errorExit = true;
			}
		}
<<<<<<< HEAD

	//terminate script if a game list error has been found
	if ($errorExit) {exit;}

=======
	
	//terminate script if a game list error has been found
	if ($errorExit) {exit;}
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
	// create an array filled with unique player names
	$playerList = array();
	foreach ($gameList as $a => $b) {
		$thisGamePlayers = array(
								strtolower(trim($gameList[$a]->aEmail)),
								strtolower(trim($gameList[$a]->eEmail)),
								strtolower(trim($gameList[$a]->fEmail)),
								strtolower(trim($gameList[$a]->gEmail)),
								strtolower(trim($gameList[$a]->iEmail)),
								strtolower(trim($gameList[$a]->rEmail)),
								strtolower(trim($gameList[$a]->tEmail))
								);
<<<<<<< HEAD

		// compare the players in the current game and the unique player list, avoid doubles
=======
									
		// compare the players in the current game and the unique player list, avoid doubles						
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		foreach ($thisGamePlayers as $c => $d) {
			foreach ($playerList as $e => $f) {
				if ($d == $f) {
					unset($thisGamePlayers[$c]);
				}
			}
		}
<<<<<<< HEAD

=======
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		//search the playerList for similarities
		$sim = 0;
		foreach ($playerList as $ak => $av) {
			foreach ($playerList as $bk => $bv) {
				if ($ak == $bk) {
					break;
				} else {
					if (similar_text($playerList[$ak],$playerList[$bk]) > $sim) {
						$sim = similar_text($playerList[$ak],$playerList[$bk]);
						echo $sim."<br/>";
						$playerOne = $playerList[$ak];
						echo $playerOne;
						$playerTwo = $playerList[$bk];
						echo $playerTwo;
					}
				}
			}
		}
<<<<<<< HEAD

=======
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		// write new players into player list
		$holder = null;
		foreach ($thisGamePlayers as $g => $h) {
			$playerList[] = $thisGamePlayers[$g];
		}
<<<<<<< HEAD


	}

	writeplayerList($playerList);

?>
=======
			
		
	}
	
	writeplayerList($playerList);

?>
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
