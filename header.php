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
    <?php
          if (isset($_SESSION['lid_id'])) {
    $sql = "SELECT * FROM leden WHERE lid_uid = '" . $_SESSION['lid_uid'] . "'";
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_array($result);
    echo 'Hello, ' . $row["lid_voornaam"] . ' (' . $row["lid_email"] . ').';
          } else {
            echo'
    <div class="hero-img">
      <div class="hero-content">
        <h1>Bennos Sportschool</h1>
        <h4>Lorem ipsum dolor sit amet.<a href="signup.php">Meld je aan</a></h4>
      </div>
    </div>'; 
          }
    ?>