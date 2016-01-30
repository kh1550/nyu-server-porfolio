<!DOCTYPE html>
<html>
	<head>
		<title>Cat Quiz</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Cat Quiz</h1>

		<form method="POST" action="process_create.php">
			<label>Most calico cats are what gender? </label>
			<br />
			<input type="radio" name="gender" value="Female" />Female
			<br />
			<input type="radio" name="gender" value="Male" />Male
			<br />
			<br />

			<label>The runt of a litter is the ____________ of the litter.</label>
			<br />
			<input type="radio" name="runt" value="Youngest" />Youngest
			<br />
			<input type="radio" name="runt" value="Smallest" />Smallest
			<br />
			<input type="radio" name="runt" value="Most Disabled" />Most Disabled
			<br />
			<br />

			<label>Cats have how many whiskers?</label>
			<br />
			<input type="radio" name="whiskers" value="8" />8
			<br />
			<input type="radio" name="whiskers" value="16" />16
			<br />
			<input type="radio" name="whiskers" value="24" />24
			<br />
 			<br />

			<input type="submit" value="Save" />

		</form>
	</body>
</html>
