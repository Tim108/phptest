<?php
include "database.php"; // contains useful database functions
include "update_function.php";

// update the rates
update_rates();

// start session to get session variables here
session_start();

// get required data
$companies = getCompanies();
$rates = getRates();
$inclines = getInclines();

// check if a user is logged in, otherwise just list all companies in default order
if (isset($_SESSION["username"])) {
    $order = getOrder($_SESSION["username"]);
} else {
    $order = range(1, count($companies), 1);
}


?>
<div class="container">
    <table class="table table=striped">

        <!--    make table headers -> company, rate, incline-->
        <thead>
        <tr>
            <th>Company</th>
            <th>Rate</th>
            <th>Incline</th>
        </tr>
        </thead>
        <tbody>

        <!--    make a row for each company in desired order-->
        <?php for ($i = 0; $i < count($order); $i++) { ?>
            <tr>
                <!--            company name-->
                <td><?php echo $companies[$order[$i]]; ?></td>

                <!--            rate-->
                <td><?php echo $rates[$order[$i]]; ?></td>

                <!--            incline, red or green-->
                <td><?php if (strpos($inclines[$order[$i]], "-") === 0) echo "<span style=\"color:red\">";
                    else echo "<span style=\"color:green\">";
                    echo $inclines[$order[$i]]; ?>%
                    </span></td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
