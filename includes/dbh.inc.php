<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "idpsportschool";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Connection check
// if (mysqli_connect_error()) {
//     die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
//   }

//   echo 'Connected successfully.';

//   $mysqli->close();