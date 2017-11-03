<?php
// import database functions
include "database.php";

// set username in session if someone that is in the database logged in
if (isset($_POST["username"]) && checkUser($_POST["username"])) {

    // start a new session for the user
    session_start();

    // set username;
    $_SESSION["username"] = $_POST["username"];
}

// redirect to index
header("Location: index.php");
exit;