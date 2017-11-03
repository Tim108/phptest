<?php
function checkUser($user)
{
    $exists = false;

    // connect with database
    $conn = connect();

    // fetches 1 if user exists or 0 if not
    $sql = "SELECT count(1) AS exist FROM employees e WHERE e.name = \"" . $user . "\";";

    // execute
    $result = $conn->query($sql);

    // interpret results
    if ($result->num_rows > 0) {
        // get first result
        $row = $result->fetch_assoc();
        $exists = $row["exist"];
    }
    return $exists;
}

function getCompanies()
{
    $companies = array();

    // connect with database
    $conn = connect();

    // fetch companies and put them in an array
    $sql = "SELECT * FROM companies;";

    // execute
    $result = $conn->query($sql);

    // interpret results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // make list with cid as index
            $companies[$row["cid"]] = $row["name"];
        }
    }

    // free result and close connection
    $result->free();
    $conn->close();

    return $companies;
}

// the order is a list of company id's
function getOrder($name)
{
    $order = array();

    // connect with database
    $conn = connect();

    // fetch companies and put them in an array
    $sql = "SELECT e.company_order FROM employees e WHERE e.name = \"" . $name . "\";";

    // execute
    $result = $conn->query($sql);

    // interpret results
    if ($result->num_rows > 0) {

        // put order into a string
        $row = $result->fetch_assoc();
        $order_string = $row["company_order"];

        // split the string to get an order of company id's
        $order = explode(",", $order_string);
    }

    // free result and close connection
    $result->free();
    $conn->close();

    return $order;
}

function setOrder($name, $newOrder)
{
    // connect with database
    $conn = connect();

    // set the new order for the user
    $sql = "UPDATE employees e SET e.company_order = \"" . $newOrder . "\" WHERE e.name = \"" . $name . "\";";

    // execute
    $conn->query($sql);

    // close connection
    $conn->close();
}

function getRates()
{
    $rates = array();

    // connect with database
    $conn = connect();

    // fetch rates and company id's
    $sql = "SELECT r.cid, r.c_rate FROM rates r";

    // execute
    $result = $conn->query($sql);

    // interpret results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // make list with cid as index
            $rates[$row["cid"]] = $row["c_rate"];
        }
    }

    // free result and close connection
    $result->free();
    $conn->close();

    return $rates;
}

function getInclines()
{
    $inclines = array();

    // connect with database
    $conn = connect();

    // fetch inclines and company id's
    $sql = "SELECT r.cid, ((r.c_rate - r.l_rate) / r.l_rate * 100) as percentage FROM rates r";

    // execute
    $result = $conn->query($sql);

    // interpret results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // make list with cid as index
            $inclines[$row["cid"]] = $row["percentage"];
        }
    }

    // free result and close connection
    $result->free();
    $conn->close();

    return $inclines;
}

function connect()
{
    //connect to database
    $servername = "localhost";
    $username = "root";
    $password = "aaaaaaaa";
    $dbname = "rates";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed");
    }
    return $conn;
}

