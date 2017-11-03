<?php
// import database
include "database.php";

// make a new array for the new order
$newOrder = array();

// put each company id in the new order
$i = 0;
foreach ($_POST['line'] as $value) {
    $newOrder[$i] = $value;
    $i++;
}

// make it a string for in the database
$newOrderStr = implode(",", $newOrder);

// also need a username
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    exit;
}

// put it in the database
setOrder($username, $newOrderStr);