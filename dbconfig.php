<?php
// error_reporting(0);
$host = "us-cdbr-east-06.cleardb.net";
$user = "b80e85098a90d4";
$password = "5af417f0";
// $datbase = "dbtuts";
$datbase = "heroku_d0e242e673f9bf8";
$link = mysqli_connect($host, $user, $password, $datbase);
// mysql_select_db($datbase);

// pie chart
// $connection = new mysqli(host: "localhost", username: "root", password: "", dbname: "db_C109193110");
$connection = new mysqli($host, $user, $password, $datbase);

if (!$connection) {
    die("Error in connection" . $connection->connect_error);
}

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
