<?php
  include_once 'header.php'
?>


<?php 
  if (isset($_SESSION['u_id'])) {
    echo "You are logged in!";
  }
  
  //Count logged in users every 1 min.
  $sql = "SELECT COUNT(*) FROM leden WHERE LastTimeSeen > DATE_SUB(NOW(), INTERVAL 1 MINUTE)";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  
  echo $result[0];
?>

 
<?php
  include_once 'footer.php'
?>