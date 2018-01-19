<?php
  include_once 'header.php'
?>


  <?php 
  if (isset($_SESSION['lid_id'])) {
    echo "You are logged in!";
  }
?>

  <div class="grid-container">
    <div class="grid-x">
    </div>
  </div>

  <?php
  include_once 'footer.php'
?>