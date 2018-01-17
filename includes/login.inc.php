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
                    $_SESSION['u_id'] = $row['lid_id'];
                    $_SESSION['u_voornaam'] = $row['lid_voornaam'];
                    $_SESSION['u_tsnvoegsel'] = $row['lid_tsnvoegsel'];
                    $_SESSION['u_achternaam'] = $row['lid_achternaam'];
                    $_SESSION['u_geboortedatum'] = $row['lid_geboortedatum'];
                    $_SESSION['u_email'] = $row['lid_email'];
                    $_SESSION['u_tel'] = $row['lid_tel'];
                    $_SESSION['u_uid'] = $row['lid_iud'];
                    //Update LastTimeSeen when logged in
                    $sql = "UPDATE leden SET LastTimeSeen = NOW() WHERE lid_uid = '$uid'"; 
                    mysqli_query($conn, $sql);

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