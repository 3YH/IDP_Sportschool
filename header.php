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
    <title>Benno's Sportschool</title>
    <link rel="stylesheet" href="css/app.css">
  </head>

  <body <?php if (isset($_SESSION['lid_id'])) { echo'class="dashbg"'; }?>>
    <div id="home"></div>
    <div class="top-bar" data-sticky data-options="marginTop:0;">
      <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu>
          <li class="menu-text">Benno</li>
          <li>
            <a href="#home">Home</a>
          </li>
          <li>
            <a href="#abonnementen">Prijzen</a>
          </li>
          <li>
            <a href="#overons">Over ons</a>
          </li>
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
          <?php
          if (isset($_SESSION['lid_id'])) {
            echo'<li><form action="includes/logout.inc.php" method="POST">
                 <button class="button" type="submit" name="submit">Logout</button>
                 </form></li>';
          } else {
            echo'<li><form action="includes/login.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Gebruikersnaam/email" required></li>
                <li><input type="password" name="pwd" placeholder="Wachtwoord" required></li>
                <li><button class="button" type="submit" name="submit">Login</button>
                </form></li>';
          }
        ?>
        </ul>
      </div>
    </div>
    