<?php
  include_once 'header.php'
?>
  <?php
  $sql = "SELECT * FROM leden WHERE lid_uid = '" . $_SESSION['lid_uid'] . "'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result)
  ?>
   <div class="grid-x align-center">
 <div class="cell shrink form-card">
   <form method="post" action="includes/mail.inc.php">
   <label> Uw naam
    <input name="name" type="text" value="<?php echo '' . $row["lid_voornaam"] . ' ' . $row["lid_tsnvoegsel"] . ' ' . $row["lid_achternaam"] . ''?>"/>
    </label>
    <input name="name" type="hidden" value="<?php echo '' . $row["lid_email"] . ''?>"/>
    <label> Onderwerp
    <input name="subject" type="text" value="Advies medewerker"/>
    </label>
    <label> Uw bericht
    <textarea name="message" rows="10" cols="40" placeholder="Laat hier een bericht achter voor een van onze medewerkers. "></textarea>
    </label>
    <p class="antispam">
	<br /><input name="url" /></p>
    <input class="button" type="submit" value="Verzenden" />
    </form>
    </div>
    </div>
      <?php
  include_once 'footer.php'
?>
