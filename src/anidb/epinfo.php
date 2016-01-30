<!DOCTYPE html>
<html>
	<head>
		<title>Episode Synopsis</title>
		<meta charset="utf-8" />
		<style>
			li.menu {
				float: left;
				margin-right: 20px;
				list-style-type: none;
			}
			
			body {
				margin: auto;
				width: 80%;
			}
		</style>
	</head>
	
	<body>
		<ul>
			<li class="menu"><a href="index.php">Home</a></li>
			<li class="menu"> | </li>
			<li class="menu"><a href="../index.html">Database Hw</a></li>
		</ul>
		<br>
		<h1>AniDB</h1>
		<p>A database for ongoing anime episode synopses!</p>
		<br>
<?php

//show errors
error_reporting(E_ALL);
ini_set("display_errors", 1);

//connect to the database server
$cxn = mysqli_connect(	"warehouse", 
						"kh1550", 
						"wtrxebze", 
						"kh1550_anime");

//assemble the query
$animeId = $_GET['anime_id'];
$seasons = "SELECT * FROM seasons WHERE name= '" . $animeId . "';";

$i = 1;
$w = 1;
//execute the query. 
$result = $cxn->query($seasons);

while($row = mysqli_fetch_array($result)) {
	if ($row["name"] == $animeId ) {
		$seasonNum = $row["seasons"];
		$seasonOne = $row["season_one"];
		$seasonTwo = $row["season_two"];
		$seasonThree = $row["season_three"];
	}
}

$linkQuery = "SELECT * FROM link WHERE name= '" . $animeId . "';";
$linkTable = $cxn->query($linkQuery);

while($record = mysqli_fetch_array($linkTable)) {
	if ($record["name"] == $animeId) {
		$hyperlink = $record["wiki"];
		$image = $record["image"];
	}
}


?>
		<h2><?php echo $animeId; ?></h2>
		<a href="<?php echo $hyperlink ?>"><img src="<?php echo $image ?>"></a>
		<p><?php echo $animeId; ?> has <?php echo $seasonNum; ?> season(s)! Season 1 has <?php echo $seasonOne;?> episodes. <?php if ($seasonTwo != 0) {?> Season 2 has <?php echo $seasonTwo; ?> episodes. <?php} if ($seasonThree != 0) { ?> Season 3 has <?php echo $seasonThree; ?> episodes.<?php } ?> Please select season and episode below. You may click the above image to access the wikipedia page.</p>
		<br>
		
		<!-- Processing the information in the same page -->
		<?php if(isset($_POST["search"]) && $_POST["search"] == "Search") {
			// grab selections
			$seasonSelect = $_POST['seasonSelect'];
			$episodeSelect = $_POST['episodeSelect'];
			
			$queryAnime = "SELECT * FROM anime WHERE name='" . $animeId . "';";
			$answer = $cxn->query($queryAnime);
			while ($row = mysqli_fetch_array($answer)) {
				if ($row["name"] == $animeId) {
					$tableId = $row["table_name"];
				}
			} // grabbing table name to access table id;
			
			$queryTable = "SELECT * FROM " . $tableId . ";";
			$answer = $cxn->query($queryTable);
			while ($row = mysqli_fetch_array($answer)) {
				if ($row["season"] == $seasonSelect && $row["curr_ep_num"] == $episodeSelect) {
					$total = $row["total_ep_num"];
					$titleEn = $row["title_en"];
					$titleJpn = $row["title_jpn"];
					$synopsis = $row["synopsis"];
					$airdate = $row["airdate"];
					$bluraydvd = $row["bluraydvd"];
					$opId = $row["op_id"];
				}
			} // now we have all the info about the episode
			
			// check that we have data
			if (empty($titleEn)) {
				$titleEn = " ";
				$titleJpn = " ";
				$total = 0;
				$synopsis = "There is no episode for this selection.";
				$airdate = " ";
				$bluraydvd = FALSE;
				$opId = " ";
			} else {
				// get op and ed information from second table
				$querySong = "SELECT * FROM song WHERE op_id = '" . $opId . "';";
				$songTable = $cxn->query($querySong);
				while ($row = mysqli_fetch_array($songTable)) {
					if ($row["op_id"] == $opId) {
						$opId = "Opening Song: " . $row["song_name"] . " by " . $row["artist"];
					}
				}
			}
			
			// display info ?>
			<h3>Season <?php echo $seasonSelect; ?>, Episode <?php echo $episodeSelect; ?>: <?php echo $titleEn; ?> (<?php echo $titleJpn; ?> )</h3>
			<p>Aired: <?php echo $airdate; ?></p>
			<br>
			<p><?php echo $synopsis; ?></p>
			<br>
			<p><?php echo $opId; ?></p>
			<?php if ($bluraydvd == FALSE) {
				echo "Not yet available on Bluray/DVD.";
			} else {
				echo "Available on Bluray/DVD.";
			} 
		} ?>
			
		<form method="POST">
			<label>Season :</label>
			<select name="seasonSelect">
				<?php while ($i <= $seasonNum) : ?>
					<option value="<?php echo $i; ?>"><?php echo $i ; ?></option>
				<?php $i++; endwhile; ?>
			</select>
			<br />
			<br />
			
			<label>Episode :</label>
			<select name="episodeSelect"> <!-- since it seems you need jquery to change the select options of one box based on another, I will display options for the highest number of episodes a season for each anime -->
				<?php while ($w <= $seasonOne) : ?> 
					<option value="<?php echo $w; ?>"><?php echo $w ; ?></option>
				<?php $w++; endwhile; ?>
			</select>
			<br />
			<br />

			<input type="submit" value="Search" name="search" />
		</form>
	</body>
</html>
