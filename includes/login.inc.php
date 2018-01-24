<?php

session_start();

if (isset($_POST['submit'])) {

    include 'dbh.inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //Error handlers
    //Check if inputs are empty
    if(empty($uid) || empty($pwd)) {
        header("Location: ../index.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM leden WHERE lid_uid='$uid' OR lid_email='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            header("Location: ../index.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                //De-hashing the password
                $hashedPwdCheck = password_verify($pwd, $row['lid_pwd']);
                if ($hashedPwdCheck == false) {
                    header("Location: ../index.php?login=error");
                    exit();
                } elseif ($hashedPwdCheck == true) {
                    //Log in the user
                    $_SESSION['lid_id'] = $row['lid_id'];
                    $_SESSION['lid_voornaam'] = $row['lid_voornaam'];
                    $_SESSION['lid_tsnvoegsel'] = $row['lid_tsnvoegsel'];
                    $_SESSION['lid_achternaam'] = $row['lid_achternaam'];
                    $_SESSION['lid_geboortedatum'] = $row['lid_geboortedatum'];
                    $_SESSION['lid_straatnaam'] = $row['lid_straatnaam'];
                    $_SESSION['lid_huisnr'] = $row['lid_huisnr'];
                    $_SESSION['lid_postcode'] = $row['lid_postcode'];
                    $_SESSION['lid_woonplaats'] = $row['lid_woonplaats'];
                    $_SESSION['lid_email'] = $row['lid_email'];
                    $_SESSION['lid_rekeningnr'] = $row['lid_rekeningnr'];
                    $_SESSION['lid_bank'] = $row['lid_bank'];
                    $_SESSION['lid_tel'] = $row['lid_tel'];
                    $_SESSION['lid_uid'] = $row['lid_uid'];

                    //Update LastVisit when logged in
                    $lastvisit = "UPDATE leden SET lid_lastvisit = NOW() WHERE lid_uid = '$uid'";
                    mysqli_query($conn, $lastvisit);

                    // //Update IsLoggedIn when logged in
                    // $loggedin = "UPDATE leden SET IsLoggedIn = 1 WHERE lid_uid = '$uid'";
                    // mysqli_query($conn, $loggedin);
                    
                    header("Location: ../index.php?login=success");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../index.php?login=error");
    exit();
}