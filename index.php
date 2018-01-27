<?php
  include_once 'header.php'
?>
  <?php

// $sql = "SELECT COUNT(*) FROM leden WHERE LastTimeSeen > DATE_SUB(NOW(), INTERVAL 1 MINUTE)"; 
// $rs = mysqli_query($conn, $sql); 
// $result = mysqli_fetch_array($rs); 
//  echo $result[0]; 
    //       if (isset($_SESSION['lid_id'])) {
    // $sql = "SELECT * FROM leden WHERE lid_uid = '" . $_SESSION['lid_uid'] . "'";
    // $result = mysqli_query($conn, $sql);
    
    // $row = mysqli_fetch_array($result);
    // echo 'Hello, ' . $row["lid_voornaam"] . ' (' . $row["lid_email"] . ').';
    //       } else {
    //         echo'
    //         <div class="hero-img">
    //           <div class="hero-content">
    //             <h1>Welkom bij
    //               <span>Benno&#39;s sportschool</span>
    //             </h1>
    //             <h4>
    //               <a href="signup.php" class="button">Meld je nu aan!</a>
    //             </h4>
    //           </div>
    //         </div>
    //         <a href="#abonnementen">
    //           <div class="more-info">
    //             <h6>MEER INFO</h6>
    //             <div class="line"></div>
    //           </div>
    //         </a>
    //         <div class="abonnementen" id="abonnementen">
    //         <div class="populair"><span>Populairste</span></div>
    //           <div class="card mini">
    //             <div class="card-section ">
    //               <h3>Mini</h3>
    //               <h2>€10 /
    //                 <span>maand</span>
    //               </h2>
    //               <a href="signup.php" class="button large">Schrijf je in!</a>
    //             </div>
    //           </div>
    //           <div class="card normal">
    //             <div class="card-section">
    //               <h3>Regular</h3>
    //               <h2>€20 /
    //                 <span>maand</span>
    //               </h2>
    //               <a href="signup.php" class="button large">Schrijf je in!</a>
    //             </div>
    //           </div>
    //           <div class="card big">
    //             <div class="card-section">
    //               <h3>Big</h3>
    //               <h2>€35 /
    //                 <span>maand</span>
    //               </h2>
    //               <a href="signup.php" class="button large">Schrijf je in!</a>
    //             </div>
    //           </div>
    //         </div>
    //     <div class="over-ons" id="overons">
    //       <h2>Over ons</h2>
    //     Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi repellendus ipsa harum impedit quaerat nostrum quia laudantium deleniti odio laborum. <br> <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit illo a nemo debitis aliquam! Inventore libero tempore enim nesciunt numquam? Maiores enim rerum iure animi id! <br> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed ab repudiandae quisquam molestiae dicta nostrum harum neque. Ullam neque dolores iure vitae ad, mollitia repudiandae fugiat quam aspernatur, reiciendis quod maiores accusantium doloremque enim non eveniet et officiis. Id, libero?'; 
    //       }
    ?>
    <div class="dashboard grid-padding-x">
        <div class="left">
          <div class="lid">
            <?php
          // Alle data van lid ophalen + naam weergeven
          $sql = "SELECT * FROM leden WHERE lid_uid = '" . $_SESSION['lid_uid'] . "'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_array($result);
          echo '<h4>' . $row["lid_voornaam"] . ' ' . $row["lid_tsnvoegsel"] . ' ' . $row["lid_achternaam"] . '</h4>';

          // Aantal dagen sinds laatste bezoek
          $sql = mysqli_fetch_assoc(mysqli_query($conn, "SELECT datum FROM resultaat"));
          $lastvisit = $sql['datum'];
          $date = new DateTime($lastvisit);
          $now = new DateTime();
          echo $date->diff($now)->format("<p>U heeft %d dagen geleden voor het laatst gesport.</p>");
          ?>
          <a href="update.php" class="button">Bewerken</a>
          </div>
          <div class="advies">
          <a href="advies.php" class="button">Advies aan een medwerker vragen</a>
          </div>
        </div>
        <div class="middle">
        <?php
        // Gemiddelden van laatste 30 dagen(loopband) ophalen
        $avgloopband = "SELECT FORMAT(AVG(cal),0) avg_cal_loopband, FORMAT(AVG(tijd),0) avg_tijd_loopband, FORMAT(AVG(afstand),0) avg_afst_loopband FROM resultaat WHERE DATEDIFF(CURDATE(),datum) between 0 AND 30 AND apparaat_id = 1 AND lid_id = '" . $_SESSION['lid_id'] . "'";
        $result = mysqli_query($conn, $avgloopband);
        $row = mysqli_fetch_array($result);
        ?>
         <div class="loopband">
         <h5>Loopband</h5>
         <?php
          echo '<p> Gem. calorieën verbrand: ' . $row['avg_cal_loopband'] . ' </p><br>';
          echo '<p> Gem. tijd gebruikt: ' . $row['avg_tijd_loopband'] . ' minuten.</p><br>';
          echo '<p> Gem. afstand afgelegd: ' . $row['avg_afst_loopband'] . ' meter.</p><br>';
         ?>
         </div>
        </div>
        <div class="right">
          <div class="stats">
            <p>Naam</p>
          </div>
          <div class="abonnement">
            <p>Abbo</p>
          </div>
        </div>
    </div>
    <?php
  include_once 'footer.php'
?>