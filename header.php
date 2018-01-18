<?php
  session_start();
  include 'includes/dbh.inc.php'
?>

  <!doctype html>
  <html class="no-js" lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
    <link rel="stylesheet" href="css/app.css">
  </head>

  <body>
    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu>
          <li class="menu-text">Benno's Sportschool</li>
          <li>
            <a href="#">One</a>
            <ul class="menu vertical">
              <li>
                <a href="#">One</a>
              </li>
              <li>
                <a href="#">Two</a>
              </li>
              <li>
                <a href="#">Three</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">Two</a>
          </li>
          <li>
            <a href="#">Three</a>
          </li>
        </ul>
      </div>
      <div class="top-bar-right nav-login">
        <?php
          if (isset($_SESSION['lid_id'])) {
            echo'<form action="includes/logout.inc.php" method="POST">
                 <button type="submit" name="submit">Logout</button>
                 </form>';
          } else {
            echo'<form action="includes/login.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Gebruikersnaam/email">
                <input type="password" name="pwd" placeholder="Wachtwoord">
                <button type="submit" name="submit">Login</button>
                <a href="signup.php">Aanmelden</a>
                </form>';
          }
        ?>
      </div>
    </div>