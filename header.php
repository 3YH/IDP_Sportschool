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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto" rel="stylesheet"> 
  </head>

  <body <?php if (isset($_SESSION['lid_id'])) { echo'class="dashbg"'; }?>>
    <div id="home"></div>
    <div class="top-bar" data-sticky data-options="marginTop:0;">
      <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu>
          <li class="menu-text">Benno's sportshool</li>
          <?php
          if (isset($_SESSION['lid_id'])) {
            
            echo'
            <li>
            <a href="index.php">Dashboard</a>
          </li>
          ';
          } else {
            echo'<li>
            <a href="#home">Home</a>
          </li>
          <li>
            <a href="#abonnementen">Prijzen</a>
          </li>
          <li>
            <a href="#overons">Over ons</a>
          </li>';
          }
        ?>
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
          <?php
          if (isset($_SESSION['lid_id'])) {
            $sql = "SELECT COUNT(*) FROM leden WHERE IsLoggedIn = 'true'"; 
            $rs = mysqli_query($conn, $sql); 
            $result = mysqli_fetch_array($rs); 
            if($result[0] == '0') {
            echo'<li class="count">Er is niemand aan het sporten.</li>';
          } elseif ($result[0] == '1') {
            echo '<li class="count">Er is ' . $result[0] . ' persoon aan het sporten.</li>';
          } else {
            echo'<li class="count">Er zijn ' . $result[0] . ' mensen aan het sporten.</li>';
          }
            echo'
            <li><form action="includes/logout.inc.php" method="POST">
                 <button class="button" type="submit" name="submit">Uitloggen</button>
                 </form></li>';
          } else {
            echo'<li><form action="includes/login.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Gebruikersnaam/email" required></li>
                <li><input type="password" name="pwd" placeholder="Wachtwoord" required></li>
                <li><button class="button" type="submit" name="submit">Inloggen</button>
                </form></li>';
          }
        ?>
        </ul>
      </div>
    </div>
    
