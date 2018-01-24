<?php 
if (isset($_POST['submit'])) {
    
    include 'dbh.inc.php';

    $voornaam = mysqli_real_escape_string($conn, $_POST['lid_voornaam']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    

    $update = "UPDATE leden SET lid_voornaam='$uvoornaam' WHERE lid_uid = '$uid'";
                    mysqli_query($conn, $update);

            header("Location: ../update.php?update=success");
            exit();

    } else {
    header("Location: ../update.php");
    exit();
}