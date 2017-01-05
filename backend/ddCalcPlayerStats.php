<?php

	require "php/ddelofunc.php" ;
	require "menu.html";
<<<<<<< HEAD
	require './kint/Kint.class.php';
=======
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d


	// Open json file with list of ddelo games and read into an array
	$gameList = readJsontoArray("json/ddeloGameList.json");
	$playerStats = array();


	
	//loop through each game, find result, current rating and number of games already played
<<<<<<< HEAD
	foreach ($gameList as $key => $val) {

		echo($gameList[$key]->gameFinished);
		echo('<br>');
		$thisPlayers = array(
								strtolower(trim($gameList[$key]->aEmail)),
								strtolower(trim($gameList[$key]->eEmail)),
								strtolower(trim($gameList[$key]->fEmail)),
								strtolower(trim($gameList[$key]->gEmail)),
								strtolower(trim($gameList[$key]->iEmail)),
								strtolower(trim($gameList[$key]->rEmail)),
								strtolower(trim($gameList[$key]->tEmail))
								);
		$thisResults = array(	
									$gameList[$key]->aResult,
									$gameList[$key]->eResult,
									$gameList[$key]->fResult,
									$gameList[$key]->gResult,
									$gameList[$key]->iResult,
									$gameList[$key]->rResult,
									$gameList[$key]->tResult
=======
	foreach ($gameList as $k => $v) {
		$thisPlayers = array(
								strtolower(trim($gameList[$k]->aEmail)),
								strtolower(trim($gameList[$k]->eEmail)),
								strtolower(trim($gameList[$k]->fEmail)),
								strtolower(trim($gameList[$k]->gEmail)),
								strtolower(trim($gameList[$k]->iEmail)),
								strtolower(trim($gameList[$k]->rEmail)),
								strtolower(trim($gameList[$k]->tEmail))
								);
		$thisResults = array(	
									$gameList[$k]->aResult,
									$gameList[$k]->eResult,
									$gameList[$k]->fResult,
									$gameList[$k]->gResult,
									$gameList[$k]->iResult,
									$gameList[$k]->rResult,
									$gameList[$k]->tResult
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
							);
							
		$thisRatings = array();
		$thisGamesPlayed = array();
									
									
		// search player list (stats) to find current rating and number of games played or signal new player
		
		$playerEmails = array();
		

		foreach ($playerStats as $k => $v) {
			$playerEmails[] = $playerStats[$k]["playerEmail"];
		}
		$newPlayers = array_diff($thisPlayers,$playerEmails);
		
		foreach ($newPlayers as $k => $v) {
			$playerStats[] = array("playerEmail"=>$newPlayers[$k],"playerGamesPlayed"=>0,"playerRating"=>1000);
		}
		
		$playerStatsIndex = array();
		foreach ($playerStats as $k => $v) {
			$playerStatsIndex[] = $playerStats[$k]["playerEmail"];
		}
		
		foreach ($thisPlayers as $k => $v) {
			$thisRatings[] = $playerStats[array_search($thisPlayers[$k],$playerStatsIndex)]["playerRating"];
			$thisGamesPlayed[] = $playerStats[array_search($thisPlayers[$k],$playerStatsIndex)]["playerGamesPlayed"];
		}
		
		//call get new ratings function
		$thisNewRatings = getNewRatings ($thisRatings, $thisGamesPlayed, $thisResults);

		// update player stats with new ratings
		$playerStatsIndex = array();
		foreach ($playerStats as $k => $v) {
			$playerStatsIndex[] = $playerStats[$k]["playerEmail"];
		}

		foreach ($thisPlayers as $k => $v) {
			// search the player list for each player in this game 
			$index = array_search($thisPlayers[$k],$playerStatsIndex);
			$playerStats[$index]["playerRating"] = $thisNewRatings[$k];
			$playerStats[$index]["playerGamesPlayed"]++;
<<<<<<< HEAD
			$playerStats[$index]["lastGamePlayed"] = $gameList[$key]->gameFinished;
=======
			
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		}
	}
	
	writeArraytoJson($playerStats, "json/ddeloPlayerStats.json");
	
	
	exit("player stats generated in json/ddeloPlayerStats.json");
		
?>