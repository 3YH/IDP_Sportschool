<?php

if (isset($_POST['submit'])) {
    
    include_once 'dbh.inc.php';

    $voornaam = mysqli_real_escape_string($conn, $_POST['lid_voornaam']);
    $tussenvoegsel = mysqli_real_escape_string($conn, $_POST['lid_tsnvoegsel']);
    $achternaam = mysqli_real_escape_string($conn, $_POST['lid_achternaam']);
    $geboortedatum = mysqli_real_escape_string($conn, $_POST['lid_geboortedatum']);
    $gewicht = mysqli_real_escape_string($conn, $_POST['lid_gewicht']);
    $straatnaam = mysqli_real_escape_string($conn, $_POST['lid_straatnaam']);
    $huisnr = mysqli_real_escape_string($conn, $_POST['lid_huisnr']);
    $postcode = mysqli_real_escape_string($conn, $_POST['lid_postcode']);
    $woonplaats = mysqli_real_escape_string($conn, $_POST['lid_woonplaats']);
    $email = mysqli_real_escape_string($conn, $_POST['lid_email']);
    $telefoonnummer = mysqli_real_escape_string($conn, $_POST['lid_tel']);
    $rekeningnr = mysqli_real_escape_string($conn, $_POST['lid_rekeningnr']);
    $bank = mysqli_real_escape_string($conn, $_POST['lid_bank']);
    $uid = mysqli_real_escape_string($conn, $_POST['lid_uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['lid_pwd']);

    //Error handlers
    //Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?signup=email");
        exit();
    } else {
        //Check if username is taken
        $sql = "SELECT * FROM leden WHERE lid_uid='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            header("Location: ../signup.php?signup=usertaken");
            exit();
        } else {
            //Hashing the password
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            //Instert the user into the database
            $sql = "INSERT INTO leden (lid_voornaam, lid_tsnvoegsel, lid_achternaam, lid_geboortedatum, lid_gewicht, lid_straatnaam, lid_huisnr, lid_postcode, lid_woonplaats, lid_email, lid_tel, lid_rekeningnr, lid_bank, lid_uid, lid_pwd, lid_registerdate) VALUES ('$voornaam', '$tussenvoegsel', '$achternaam', '$geboortedatum', '$gewicht', '$straatnaam', '$huisnr', '$postcode', '$woonplaats', '$email', '$telefoonnummer', '$rekeningnr','$bank', '$uid', '$hashedPwd', NOW());";
            mysqli_query($conn, $sql);

            header("Location: ../signup.php?signup=success");
            exit();
            }
        }
    } else {
    header("Location: ../signup.php");
    exit();
}