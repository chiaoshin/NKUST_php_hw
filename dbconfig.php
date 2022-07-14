<?php
// error_reporting(0);
$host = "localhost";
$user = "root";
$password = "";
// $datbase = "dbtuts";
$datbase = "db_C109193110";
$link = mysqli_connect($host, $user, $password, $datbase);
// mysql_select_db($datbase);

// pie chart
// $connection = new mysqli(host: "localhost", username: "root", password: "", dbname: "db_C109193110");
$connection = new mysqli($host, $user, $password, $datbase);

if (!$connection) {
    die("Error in connection" . $connection->connect_error);
}
