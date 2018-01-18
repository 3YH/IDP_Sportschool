<?php
if (isset($_POST['submit'])) {
session_start();

// include 'dbh.inc.php';
// $uid = mysqli_real_escape_string($conn, $_SESSION['u_id']);

// // $loggedout = ("UPDATE leden SET IsLoggedIn = 0 WHERE lid_uid = '$uid'") or die(mysqli_error($db));;
// //                 mysqli_query($conn, $loggedout);

session_unset();
session_destroy();
header("Location: ../index.php");
exit();
}