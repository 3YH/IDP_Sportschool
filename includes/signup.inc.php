<?php

if (isset($_POST['submit'])) {
    
    include_once 'dbh.inc.php';

    $voornaam = mysqli_real_escape_string($conn, $_POST['lid_voornaam']);
    $tussenvoegsel = mysqli_real_escape_string($conn, $_POST['lid_tsnvoegsel']);
    $achternaam = mysqli_real_escape_string($conn, $_POST['lid_achternaam']);
    $geboortedatum = mysqli_real_escape_string($conn, $_POST['lid_geboortedatum']);
    $email = mysqli_real_escape_string($conn, $_POST['lid_email']);
    $telefoonnummer = mysqli_real_escape_string($conn, $_POST['lid_tel']);
    $uid = mysqli_real_escape_string($conn, $_POST['lid_uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['lid_pwd']);

    //Error handlers
    //Check for empty fields
    if (empty($voornaam) || empty($tussenvoegsel) || empty($achternaam) || empty($geboortedatum) || empty($email) || empty($telefoonnummer) || empty($uid) || empty($pwd)) {
        header("Location: ../signup.php?signup=empty");
        exit();
    } else {
        //Check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $voornaam) || !preg_match("/^[a-zA-Z]*$/", $tussenvoegsel) || !preg_match("/^[a-zA-Z]*$/", $achternaam)) {
            header("Location: ../signup.php?signup=invalid");
            exit();
        } else {
            //Check if email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?signup=email");
                exit();
            } else {
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
                    $sql = "INSERT INTO leden (lid_voornaam, lid_tsnvoegsel, lid_achternaam, lid_geboortedatum, lid_email, lid_tel, lid_uid, lid_pwd) VALUES ('$voornaam', '$tussenvoegsel', '$achternaam', '$geboortedatum', '$email', '$telefoonnummer', '$uid', '$hashedPwd');";
                    mysqli_query($conn, $sql);
                    header("Location: ../signup.php?signup=success");
                    exit();
                    }
                }
            }
        }
    } else {
    header("Location: ../signup.php");
    exit();
}