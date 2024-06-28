<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$success = false;
$failure = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include "partials/_dbconnect.php";

	$username = $_POST["username"];
	$password = $_POST["password"];

	$sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);
	echo $num;

	if ($num == 1) {
		$success = true;
		session_start();
		$_SESSION['loggedIn'] = true;
		$_SESSION['username'] = $username;
		header("location: welcome.php");
	} else {
		$failure = true;
	}
}


?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log In - MyLoginSystem</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
	<?php require "partials/_navbar.php" ?>
	<div style="max-width:500px" class="container">

		<h2 class="text-center mt-5">Log In.</h2>



		<form class="mt-5" action="/loginsystem/login.php" method="post">
			<?php
			if ($success) {
				echo '<div class="alert alert-success" role="alert">
                Success! You are logged in. 
            </div>';
			}

			if ($failure) {
				echo '<div class="alert alert-danger" role="alert">
                Invalid Credentials.  
            </div>';
			}

			?>
			<div class="mb-3">
				<label for="username" class="form-label">Username</label>
				<input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<input type="password" class="form-control" id="password" name="password">

			</div>

			<button type="submit" class="btn btn-primary">Login</button>
		</form>
	</div>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>