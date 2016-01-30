<!DOCTYPE html>
<html>
	<head>
		<title>Results</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Your Results</h1>
		<p><a href="quiz.php">Click here</a> to retake the quiz.</p>
		<br>
<?php

//show errors
error_reporting(E_ALL);
ini_set("display_errors", 1);

//connect to the database server
$cxn = mysqli_connect(	"warehouse", 
						"kh1550", 
						"wtrxebze", 
						"kh1550_nutrition");

//assemble the query
$query = "SELECT * FROM cat";

$count = 0;
$inc = 1;

//execute the query. 
$result = $cxn->query($query); 

?>
<?php while($row = mysqli_fetch_array($result)) : ?>
		<?php echo $row["question"]; ?>
		<br>
		Your Answer: <?php echo $row["answer"]; ?>
		<br>
		Correct Answer: <?php echo $row["user"]; ?>
		<br>
		<br>
		
<?php 
	$answer = $row["answer"];
	$user = $row["user"];
	if ($answer == $user) {
		$count = $count + $inc; // increment number of correct answers
	}
?>
<?php endwhile; ?>
Your Score: <?php echo $count  ?>/ 3 !
	</body>
</html>





