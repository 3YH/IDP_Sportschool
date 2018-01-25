<?php 
 include 'dbh.inc.php';

    $voornaam = mysqli_real_escape_string($conn, $_POST['lid_voornaam']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    
    $sql = "UPDATE leden SET lid_voornaam='$_POST[u_voornaam]' WHERE lid_id='$_POST[id]'";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../update.php?update=success");
            exit();
        } else {
            echo "Not updated";
        }
    ?>