<?php
  include_once 'header.php'
?>
<?php
    $sql = "SELECT * FROM leden WHERE lid_uid = '" . $_SESSION['lid_uid'] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    //Catch Post Data and Process
if(isset($_POST['edit'])){
    include 'dbh.inc.php';

    $voornaam = $_POST['lid_voornaam'];
    $uid = $_POST['lid_uid'];

    //Check if content is present
    if(!empty($voornaam)){

        //Update DB
        $query = mysql_query("UPDATE leden SET lid_voornaam='$voornaam' WHERE lid_uid = '$uid' LIMIT 1");
        //Create Debug Message
        if(!$query){
            mysqli_error();
        }
        //If query is good, head back to desired page.
        header("Location: ../update.php?update=success");
        exit();
    }else{
        //Create Empty Error Message
        $error = "Error! No Changes Made";
    }
}

?>
    <form action="" method="POST">
    <?php if(isset($error) != NULL):?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
        <div class="grid-x align-center">
            <div class="cell shrink form-card">
                <label>Voornaam
                    <input type="text" name="lid_voornaam" placeholder="<?php echo ''. $row["lid_voornaam"] .''?>" required>
                </label>
                <button type="submit" name="edit">Edit User</button>
            </div>
        </div>
    </form>
    <?php
  include_once 'footer.php'
?>