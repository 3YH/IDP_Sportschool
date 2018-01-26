<?php
  include_once 'header.php'
?>
<?php
if (isset($_REQUEST['email']))  {
    //Email information
    $admin_email = "yannickhj@gmail.com";
    $name = $_REQUEST['name'];
    $subject = $_REQUEST['subject'];
    $comment = $_REQUEST['comment'];
    //send email
    mail($admin_email, "$subject", $comment, "From:" . $email);
    //Email response
    echo "Bedankt voor uw bericht.";
    }
    //if "email" variable is not filled out, display the form
    else  {
  ?>
  
  <?php
  $sql = "SELECT * FROM leden WHERE lid_uid = '" . $_SESSION['lid_uid'] . "'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result)
  ?>
   <div class="grid-x align-center">
 <div class="cell shrink form-card">
   <form method="post">
   <label> Uw naam
    <input name="name" type="text" value="<?php echo '' . $row["lid_voornaam"] . ' ' . $row["lid_achternaam"] . ''?>"/>
    <label> Onderwerp
    <input name="subject" type="text" value="Advies medewerker"/>
    </label>
    <label> Uw bericht
    <textarea name="comment" rows="15" cols="40" placeholder="Laat hier uw vraag of bericht achter voor één van onze medewerkers. "></textarea>
    </label>
    <input class="button" type="submit" value="Verzenden" />
    </form>
    </div>
    </div>
  <?php
    }
  ?>
      <?php
  include_once 'footer.php'
?>