<?php
// Database connection parameters

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "db_lms";

// connection string function
$conn = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

// if db connection failed
if(!$conn){
    die("Database connection failed " . mysqli_error($conn));
}
?>