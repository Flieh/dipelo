<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
<<<<<<< HEAD


		<link rel="stylesheet" href="css/styles.css">
		<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

=======
		
		
		<link rel="stylesheet" href="css/styles.css">
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
	</head>
	<body>
		<h1 class="center">Game by Game Update of Player Stats</h1>
		<?php require "menu.html"; ?>
		<div class="divThree">
			<h4>The Elo Based Rating System for Droidippy (ddelo)</h4>

			<p>The current system is based directly on the Judge Diplomacy Player Rating (JDPR). The calculator adds or deducts points from a player's rating based on the reletive strength of each of his opponents. There is an exponential modifier which means that higher rated players gain fewer and lose more points versus lower rated players and vice versa.</p>
		</div>
<<<<<<< HEAD

=======
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
<?php

	require "php/ddelofunc.php" ;
	/* require 'kint/Kint.class.php'; */
<<<<<<< HEAD



=======
	
	
	
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
	// Open json file with list of ddelo games and read into an array
	$gameList = readJsontoArray("json/ddeloGameList.json");
	$playerStats = array();


<<<<<<< HEAD

	//loop through each game, find result, current rating and number of games already played
	foreach ($gameList as $key => $val) {

?>
	<div class="divOne">
		<h3 class="center">Game Number<br/><br/><span class="numbers"><?php  echo $gameList[$key]->gameNumber ?></span></h3>

		<h4 class="center">
			<?php  echo ($key + 1), " of ", count($gameList); ?>
		</h4>
	</div>

	<div class="divThree">


=======
	
	//loop through each game, find result, current rating and number of games already played
	foreach ($gameList as $key => $val) {
	
?>
	<div class="divThree">
				<h3 class="center">Game Number&nbsp;&nbsp;
				<?php  echo $gameList[$key]->gameNumber; ?>
				</h3>
				
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
<?php

		$thisPlayers = array(
								strtolower(trim($gameList[$key]->aEmail)),
								strtolower(trim($gameList[$key]->eEmail)),
								strtolower(trim($gameList[$key]->fEmail)),
								strtolower(trim($gameList[$key]->gEmail)),
								strtolower(trim($gameList[$key]->iEmail)),
								strtolower(trim($gameList[$key]->rEmail)),
								strtolower(trim($gameList[$key]->tEmail))
								);
<<<<<<< HEAD
		$thisResults = array(
=======
		$thisResults = array(	
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
									$gameList[$key]->aResult,
									$gameList[$key]->eResult,
									$gameList[$key]->fResult,
									$gameList[$key]->gResult,
									$gameList[$key]->iResult,
									$gameList[$key]->rResult,
									$gameList[$key]->tResult
							);
<<<<<<< HEAD

		$thisRatings = array();
		$thisGamesPlayed = array();


		// search player list (stats) to find current rating and number of games played or signal new player

		$playerEmails = array();

=======
							
		$thisRatings = array();
		$thisGamesPlayed = array();
									
									
		// search player list (stats) to find current rating and number of games played or signal new player
		
		$playerEmails = array();
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d

		foreach ($playerStats as $k => $v) {
			$playerEmails[] = $playerStats[$k]["playerEmail"];
		}
		$newPlayers = array_diff($thisPlayers,$playerEmails);
<<<<<<< HEAD

		foreach ($newPlayers as $k => $v) {
			$playerStats[] = array("playerEmail"=>$newPlayers[$k],"playerGamesPlayed"=>0,"playerRating"=>1000);
		}

=======
		
		foreach ($newPlayers as $k => $v) {
			$playerStats[] = array("playerEmail"=>$newPlayers[$k],"playerGamesPlayed"=>0,"playerRating"=>1000);
		}
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		$playerStatsIndex = array();
		foreach ($playerStats as $k => $v) {
			$playerStatsIndex[] = $playerStats[$k]["playerEmail"];
		}
<<<<<<< HEAD

=======
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		$truncatedPlayerList = array();
		foreach ($thisPlayers as $k => $v) {
			$thisRatings[] = $playerStats[array_search($thisPlayers[$k],$playerStatsIndex)]["playerRating"];
			$thisGamesPlayed[] = $playerStats[array_search($thisPlayers[$k],$playerStatsIndex)]["playerGamesPlayed"];
			$thisPlayerTruncated = explode("@",$thisPlayers[$k]);
			$truncatedPlayerList[] = $thisPlayerTruncated[0];
		}
<<<<<<< HEAD

		//call get new ratings function
		$thisNewRatings = getNewRatings ($thisRatings, $thisGamesPlayed, $thisResults);

=======
		
		//call get new ratings function
		$thisNewRatings = getNewRatings ($thisRatings, $thisGamesPlayed, $thisResults);
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		//expose each players country, name, and rating before this game
?>
		<div class="divOne">
			<table>
					<th>Country</th>
					<th>Player</th>
					<th>Start Rating</th>
					<th>Result</th>
					<th>End Rating</th>
<?php
	foreach ($truncatedPlayerList as $k => $v) {
<<<<<<< HEAD

=======
		
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
?>
				<tr class="<?php echo getCountryName ($k);?>">
					<td><?php echo getCountryName ($k);?></td>
					<td><?php echo $truncatedPlayerList[$k]; ?></td>
					<td><?php echo $thisRatings[$k]; ?></td>
					<td><?php echo $thisResults[$k]; ?></td>
					<td><?php echo $thisNewRatings[$k]; ?></td>
				</tr>
<?php
	}
?>
			</table>
		</div>
	</div>
	<div class="clear"></div>
<<<<<<< HEAD

<?php

		// update player stats with new ratings
=======
	
<?php
			
		// update player stats with new ratings 
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
		$playerStatsIndex = array();
		foreach ($playerStats as $k => $v) {
			$playerStatsIndex[] = $playerStats[$k]["playerEmail"];
		}

		foreach ($thisPlayers as $k => $v) {
<<<<<<< HEAD
			// search the player list for each player in this game
=======
			// search the player list for each player in this game 
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
			$index = array_search($thisPlayers[$k],$playerStatsIndex);
			$playerStats[$index]["playerRating"] = $thisNewRatings[$k];
			$playerStats[$index]["playerGamesPlayed"]++;
		}
	}
?>
	</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> b8ffaccac4246d757d4a0869c88d0703b4f2857d
