<?php 
 include 'dbh.inc.php';
    
    $sql = "UPDATE leden SET lid_voornaam='$_POST[u_voornaam]',lid_tsnvoegsel='$_POST[u_tsnvoegsel]',lid_achternaam='$_POST[u_achternaam]',lid_geboortedatum='$_POST[u_geboortedatum]',lid_gewicht='$_POST[u_gewicht]',lid_straatnaam='$_POST[u_straatnaam]',lid_huisnr='$_POST[u_huisnr]',lid_postcode='$_POST[u_postcode]',lid_woonplaats='$_POST[u_woonplaats]',lid_email='$_POST[u_email]',lid_tel='$_POST[u_tel]',lid_abbo='$_POST[u_abbo]',lid_rekeningnr='$_POST[u_rekeningnr]',lid_bank='$_POST[u_bank]',lid_uid='$_POST[u_uid]' WHERE lid_id='$_POST[id]'";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../update.php?update=success");
            exit();
        } else {
            echo "Not updated";
        }
    ?>