<?php
  include_once 'header.php'
?>
<?php
    $sql = "SELECT * FROM leden WHERE lid_uid = '" . $_SESSION['lid_uid'] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result)
?>
 <div class="grid-x align-center">
<?php 
        echo '<form action="includes/update.inc.php" method="POST">';
        echo '<input type="text" name=u_voornaam value="' . $row["lid_voornaam"] . '" placeholder=""/>';
        echo '<input type="hidden" name="id" value="' . $row["lid_id"] . '"/>';
        echo '<input type="submit" value="Submit"/>';
        echo'</form>';
    ?>
    </div>
    <?php
  include_once 'footer.php'
?>