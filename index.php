<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../favicon.ico">

    <title>Upolski</title>

    <!--    import ajax, bootstrap and a style sheet -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/Supernice.css" rel="stylesheet">

</head>

<?php
// start a session, need to check username later
session_start();

// import modals
include "user_modal.php";
include "reorder_modal.php";
?>

<body>

<!-- nice navbar-->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <div class="navbar-header">
            <!--company name-->
            <a class="navbar-brand" href="#">Upolski</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <!--if user is logged in, put a logout button and a reorder button-->
            <?php if (isset($_SESSION["username"])) { ?>
                <li><a id="button_reorder" href="" data-toggle="modal" data-target="#reorder_modal">Reorder</a></li>
                <li><a href="/logout.php">Logout</a></li>

                <!--otherwise a login button-->
            <?php } else { ?>
                <li><a id="button_login" href="" data-toggle="modal" data-target="#user_modal">Login</a></li>
            <?php } ?>

        </ul>
    </div>
</nav>

<!--main content pane-->
<div id="content"></div>

<!--import page refresher-->
<script type="text/javascript" src="js/refresher.js"></script>


</body>
</html>




