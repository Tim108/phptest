<?php
// by TS24
// i made a few changes, because the functions to connect, query and close the database where deprecated (error)

function update_rates() {
    // Make a new DB connection.
    $conn = connect();

    // Fetch all the rates.
    $result = $conn->query("SELECT * FROM rates");

    // Loop through the rates and update them.
    while ($row = $result->fetch_assoc()) {
        // Make a new random deviation.
        $deviation = rand(-1000,1000) / 100 * 0.85;

        // Rates less than 0 are not possible. So we make a positive deviation.
        if (($row['c_rate'] + $deviation) < 0) {
            $deviation = rand(0,1000) / 100 * 0.85;
        }

        // New rate.
        $new_rate = $row['c_rate'] + $deviation;

        // Make the query.
        $query = "UPDATE rates SET " .
            "c_rate = " . $new_rate . ", " .
            "l_rate = " . $row['c_rate'] .
            " WHERE cid = '" . $row['cid'] . "'";

        $conn->query($query);
    }

    // Free the result.
    $result->free();

    // Close the DB connection.
    $conn->close();
}
