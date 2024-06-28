<?php
session_start();

$loggedIn = false;

if (isset($_SESSION['loggedIn'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/loginsystem/welcome.php">MyLoginSystem</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/loginsystem/welcome.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/loginsystem/login.php">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/loginsystem/signup.php">Sign Up</a>
                </li>


            </ul>
            <?php

            if ($loggedIn == true) {
                echo "Welcome, " . $_SESSION['username'];
            } else {
                echo "";
            }
            ?>
        </div>
    </div>
</nav>