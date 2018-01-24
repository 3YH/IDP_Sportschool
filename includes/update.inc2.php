<?php 
    include 'dbh.inc.php';

            $sql = "UPDATE leden SET lid_voornaam='$_POST[lid_voornaam]' WHERE lid_uid = '$uid'";
            mysqli_query($conn, $sql);

            header("Location: ../update.php?update=success");
            exit();