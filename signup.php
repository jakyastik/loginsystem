<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "partials/_dbconnect.php";

    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPass = $_POST["confirmPass"];

    $exists = false;
    $success = false;
    $failure = false;

    $existsSql = "SELECT * FROM `users` WHERE 'username'= '$username'";
    $result = mysqli_query($conn, $existsSql);
    $num = mysqli_num_rows($result);

    if (($password == $confirmPass) && ($num == 0)) {
        $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password');";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $success = true;
        }
    } else {
        $failure = true;
        $exists = true;
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up - MyLoginSystem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require "partials/_navbar.php" ?>
    <div style="max-width:500px" class="container">

        <h2 class="text-center mt-5">Sign up to our website.</h2>



        <form class="mt-5" action="/loginsystem/signup.php" method="post">
            <?php
            if ($success) {
                echo '<div class="alert alert-success" role="alert">
                Success. Account Created. Log In. 
            </div>';
            }

            if ($failure) {
                echo '<div class="alert alert-danger" role="alert">
                Confirm Password Mismatch.  
            </div>';
            }

            if ($exists) {
                echo '<div class="alert alert-danger" role="alert">
                User already exists.   
            </div>';
            }

            ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input maxlength="10" type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input maxlength="20" type="password" class="form-control" id="password" name="password">
                <div id="emailHelp" class="form-text">8 Characters. Include symbols, upper, lower cases.</div>
            </div>
            <div class="mb-3">
                <label for="confirmPass" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPass" name="confirmPass">
            </div>

            <button type="submit" class="btn btn-primary">Create Account</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>