<?php
// access the session and destroy it
session_start();
session_destroy();

// redirect to index
header("Location: index.php");
exit;