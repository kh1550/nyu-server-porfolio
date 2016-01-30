<!DOCTYPE html>

<html>
	<head>
		<title>AniDB Home</title>
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
		<br />
		
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
		$query = "SELECT * FROM anime;";
		
		if(isset($_POST["Filter"]) && $_POST["Filter"] == "Filter") {
			// grab selections
			$sortType = $_POST["sortType"];
			$sortOrder = $_POST["sortOrder"];
			
			$query = "SELECT * FROM seasons ORDER BY " . $sortType . " " . $sortOrder . ";";
			
			//execute the query. 
			$result = $cxn->query($query);
		}
		
		//execute the query. 
		$result = $cxn->query($query); 
		?>

		<h3>Select anime :</h3>
		<form method="POST">
			<label>Sort :</label>
			<select name = "sortType">
				<option value="name">Alphabetical</option>
				<option value="seasons">Season Count</option>
				<option value="total">Total Episodes</option>
			</select>
			
			<label>Order :</label>
			<select name = "sortOrder">
				<option value="ASC">Ascending</option>
				<option value="DESC">Descending</option>
			</select>
			
			<input type="submit" value="Filter" name="Filter" />
		</form>
		<br>
		
		<?php while($row = mysqli_fetch_array($result)) : ?>
			<li>
				<?php echo $row["name"]; ?> :
				<a href="epinfo.php?anime_id=<?php echo $row['name'];?>">View</a>
			</li>
		<?php endwhile; ?>
			<br />
			<br />
			
		</form>

	</body>
</html>