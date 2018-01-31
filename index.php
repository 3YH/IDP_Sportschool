<?php
  include_once 'header.php'
?>
  <?php 
          if (isset($_SESSION['lid_id'])) {
            echo '
            <div class="dashboard grid-padding-x">
            <div class="left">
            <div class="lid">';
           
          // Alle data van lid ophalen + naam weergeven
          $sql = "SELECT * FROM leden WHERE lid_uid = '" . $_SESSION['lid_uid'] . "'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_array($result);
          echo '<h4>' . $row["lid_voornaam"] . ' ' . $row["lid_tsnvoegsel"] . ' ' . $row["lid_achternaam"] . '</h4>';

          // Aantal dagen sinds laatste bezoek bericht
          $sql = mysqli_fetch_assoc(mysqli_query($conn, "SELECT datum FROM resultaat WHERE lid_id = '" . $_SESSION['lid_id'] . "'"));
          $lastvisit = $sql['datum'];
          $date = new DateTime($lastvisit);
          $now = new DateTime();
          //Check of er al resultaten zijn
          if(!empty($lastvisit)) { 
            echo $date->diff($now)->format("<p>U heeft %d dagen geleden voor het laatst gesport.</p>");
          } else {
            echo '<p>U heeft nog niet gesport.</p>'; 
          }
        echo'
         <a href="update.php" class="button valign-center">
         <i class="material-icons">mode_edit</i>Bewerken</a>
            </div>
            <div class="advies">
          <a href="advies.php" class="button">Advies aan een medwerker vragen</a>
        </div>
            </div>
            <div class="middle">
        <div class="header">
          <p>Laatste 30 dagen</p>
        </div>
        <div class="apparaten">';

        // Gemiddelden van laatste 30 dagen(loopband) ophalen
        $avgloopband = "SELECT FORMAT(AVG(cal),0) avg_cal_loopband, FORMAT(AVG(tijd),0) avg_tijd_loopband, FORMAT(AVG(afstand),0) avg_afst_loopband FROM resultaat WHERE DATEDIFF(CURDATE(),datum) between 0 AND 30 AND apparaat_id = 1 AND lid_id = '" . $_SESSION['lid_id'] . "'";
        $result = mysqli_query($conn, $avgloopband);
        $row = mysqli_fetch_array($result);
        echo'
            <div class="loopband">
              <div class="top">
              <div class="icon">
              <i class="material-icons valign-center">directions_run</i>
              </div>
              <div class="title">
              <b>Loopband</b>
              <p>Gem. resultaten</p>
              </div>
              </div>
              ';
              echo '<p> Calorieën verbrand: <b>' . $row['avg_cal_loopband'] . '</b> </p>';
              echo '<p> Tijd gebruikt: <b>' . $row['avg_tijd_loopband'] . '</b> minuten.</p>';
              echo '<p> Afstand afgelegd: <b>' . $row['avg_afst_loopband'] . '</b> meter.</p>
              </div>
              ';
              // Gemiddelden van laatste 30 dagen(roeien) ophalen
        $avgroeien = "SELECT FORMAT(AVG(cal),0) avg_cal_roeien, FORMAT(AVG(tijd),0) avg_tijd_roeien, FORMAT(AVG(afstand),0) avg_afst_roeien FROM resultaat WHERE DATEDIFF(CURDATE(),datum) between 0 AND 30 AND apparaat_id = 2 AND lid_id = '" . $_SESSION['lid_id'] . "'";
        $result = mysqli_query($conn, $avgroeien);
        $row = mysqli_fetch_array($result);
        echo'
        <div class="roeien">
            <div class="top">
            <div class="icon">
            <i class="material-icons valign-center">rowing</i>
            </div>
            <div class="title">
            <b>Roeien</b>
            <p>Gem. resultaten</p>
            </div>
            </div>
            ';
            echo '<p> Calorieën verbrand: <b>' . $row['avg_cal_roeien'] . '</b> </p>';
          echo '<p> Tijd gebruikt: <b>' . $row['avg_tijd_roeien'] . '</b> minuten.</p>';
          echo '<p> Afstand afgelegd: <b>' . $row['avg_afst_roeien'] . '</b> meter.</p>
          </div>
          ';
           // Gemiddelden van laatste 30 dagen(fietsen) ophalen
        $avgfietsen = "SELECT FORMAT(AVG(cal),0) avg_cal_fietsen, FORMAT(AVG(tijd),0) avg_tijd_fietsen, FORMAT(AVG(afstand),0) avg_afst_fietsen FROM resultaat WHERE DATEDIFF(CURDATE(),datum) between 0 AND 30 AND apparaat_id = 3 AND lid_id = '" . $_SESSION['lid_id'] . "'";
        $result = mysqli_query($conn, $avgfietsen);
        $row = mysqli_fetch_array($result);
        echo'
        <div class="fietsen">
        <div class="top">
        <div class="icon">
        <i class="material-icons valign-center">directions_bike</i>
        </div>
        <div class="title">
        <b>Fietsen</b>
        <p>Gem. resultaten</p>
        </div>
        </div> 
        ';
        echo '<p> Calorieën verbrand: <b>' . $row['avg_cal_fietsen'] . '</b></p>';
        echo '<p> Tijd gebruikt: <b>' . $row['avg_tijd_fietsen'] . '</b> minuten.</p>';
        echo '<p> Afstand afgelegd: <b>' . $row['avg_afst_fietsen'] . '</b> meter.</p>
        </div>
        ';
              echo'
              </div> 
              </div>
           <div class="right">
      <div class="abonnement">
      <h4>Abonnement</h4>
           ';
        $sql = "SELECT * FROM leden WHERE lid_uid = '" . $_SESSION['lid_uid'] . "'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        echo '<p> Soort: <b>' . $row["lid_abbo"] . '</b></p>';
        echo '<p>Aanmelddatum: <b>' . $row["lid_registerdate"] . '</b></p>';
          } else {
            echo'
            <div class="hero-img">
              <div class="hero-content">
                <h1>Welkom bij
                  <span>Benno&#39;s</span> sportschool
                </h1>
                <h4>
                  <a href="signup.php" class="button">Meld je nu aan!</a>
                </h4>
              </div>
            </div>
            <a href="#abonnementen">
              <div class="more-info">
                <h6>MEER INFO</h6>
                <div class="line"></div>
              </div>
            </a>
            <div class="abonnementen" id="abonnementen">
            <div class="populair"><span>Populairste</span></div>
              <div class="card mini">
                <div class="card-section ">
                  <h3>Mini</h3>
                  <h2>€13 /
                    <span>maand</span>
                  </h2>
                  <a href="signup.php" class="button large">Schrijf je in!</a>
                </div>
              </div>
              <div class="card normal">
                <div class="card-section">
                  <h3>Flex</h3>
                  <h2>€26 /
                    <span>maand</span>
                  </h2>
                  <a href="signup.php" class="button large">Schrijf je in!</a>
                </div>
              </div>
              <div class="card big">
                <div class="card-section">
                  <h3>Easy</h3>
                  <h2>€32 /
                    <span>maand</span>
                  </h2>
                  <a href="signup.php" class="button large">Schrijf je in!</a>
                </div>
              </div>
            </div>
            <div class="parallax-window" data-parallax="scroll" data-speed="0.5" data-image-src="img/pushup.jpg"></div>
        <div class="over-ons" id="overons">
          <h2>Over ons</h2>
        <p><b>Visie</b> <br> Benno’s sportscholen dient zich te richten op de toegevoegde waarde die zij leveren aan de klant. De klant is tenslotte een verzameling van primaire stakeholders die belang hebben bij de ontwikkeling van de sportscholen, zonder klanten kan er namelijk geen winst behaald wat de continuïteit en de ontwikkeling van de sportscholen tenietdoet. 
        De klant dient dus overtuigd te worden om te komen sporten bij een van Benno’s sportfaciliteiten en niet bij de een van Benno’s concurrenten, Benno’s sportscholen dient dus naar de behoefte van de klanten te kijken.</p>
        <br>
        <p> <b>Missie</b> <br> Onze missie is simpelweg, zo veel mogelijk klanten aan trekken door zoveel mogelijk activiteiten te organiseren. Wij zijn als sportschool ook gericht op alle leeftijden van jong tot oud. We hebben de beste coaches, met minimaal 10 jaar ervaring, die voor juist dit soort activiteiten een speciale opleiding hebben gevolgd. Daarnaast hebben we een lijst vol met aparte programma’s, van hard workout tot dieet programma’s.</p>
        </div>
        '; 
          }
    ?>
    <?php
  include_once 'footer.php'
?>