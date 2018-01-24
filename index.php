<?php
  include_once 'header.php'
?>
  <?php
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
    <div class="dashboard">
        <div class="left">
          <div class="lid">
            <p>Naam</p>
          </div>
          <div class="logout">
            <p>Uitloggen</p>
          </div>
        </div>
        <div class="middle">
          <p>Apparaten</p>
        </div>
        <div class="right">
          <div class="stats">
            <p>Naam</p>
          </div>
          <div class="abonnement">
            <p>Uitloggen</p>
          </div>
        </div>
    </div>
    <?php
  include_once 'footer.php'
?>