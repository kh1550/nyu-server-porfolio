<?php

//show errors
error_reporting(E_ALL);
ini_set("display_errors", 1);

//get the data the user entered into the form
$gender = $_POST['gender'];
$runt = $_POST['runt'];
$whiskers = $_POST['whiskers'];

//connect to the database server
$cxn = mysqli_connect(	"warehouse", 
						"kh1550", 
						"wtrxebze", 
						"kh1550_nutrition");


//assemble the query
$query = "UPDATE cat SET user = '" . $gender . "' WHERE num = 1;";
$queryRunt = "UPDATE cat SET user = '" . $runt . "' WHERE num = 2;";
$queryWhisk = "UPDATE cat SET user = '" . $whiskers . "' WHERE num = 3;";

//execute the query. 
$result = $cxn->query($query); 
$result = $cxn->query($queryRunt);
$result = $cxn->query($queryWhisk);

//redirect the browser to the main page
header("Location:result.php");

?>