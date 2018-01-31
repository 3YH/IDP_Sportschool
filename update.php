<?php
  include_once 'header.php'
?>
<?php
    $sql = "SELECT * FROM leden WHERE lid_id = '" . $_SESSION['lid_id'] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result)
?>
 <div class="grid-x align-center">
 <div class="cell shrink form-card">
<?php 
        echo '<form action="includes/update.inc.php" method="POST">';
        echo '<label>Voornaam<input type="text" name=u_voornaam value="' . $row["lid_voornaam"] . '" placeholder=""/></label>';
        echo '<label>Tussenvoegsel<input type="text" name=u_tsnvoegsel value="' . $row["lid_tsnvoegsel"] . '" placeholder=""/></label>';
        echo '<label>Achternaam<input type="text" name=u_achternaam value="' . $row["lid_achternaam"] . '" placeholder=""/></label>';
        echo '<label>Geboortedatum<input type="date" name=u_geboortedatum value="' . $row["lid_geboortedatum"] . '" placeholder=""/></label>';
        echo '<label>Gewicht<input type="text" name=u_gewicht value="' . $row["lid_gewicht"] . '" placeholder=""/></label>';
        echo '<label>Straatnaam<input type="text" name=u_straatnaam value="' . $row["lid_straatnaam"] . '" placeholder=""/></label>';
        echo '<label>Huisnummer<input type="number" name=u_huisnr value="' . $row["lid_huisnr"] . '" placeholder=""/></label>';
        echo '<label>Postcode<input type="text" name=u_postcode value="' . $row["lid_postcode"] . '" placeholder=""/></label>';
        echo '<label>Woonplaats<input type="text" name=u_woonplaats value="' . $row["lid_woonplaats"] . '" placeholder=""/></label>';
        echo '<label>Email<input type="text" name=u_email value="' . $row["lid_email"] . '" placeholder=""/></label>';
        echo '<label>Telefoonnummer<input type="text" name=u_tel value="' . $row["lid_tel"] . '" placeholder=""/></label>';
        echo '<label>Abonnement<br>
            <input hidden checked type="radio" name="u_abbo" id="mini" value="' . $row["lid_abbo"] . '">
            <input type="radio" name="u_abbo" id="mini" value="Mini"><label for="mini">Mini</label>
            <input type="radio" name="u_abbo" id="regular" value="Regular"><label for="regular">Regular</label>
            <input type="radio" name="u_abbo" id="big" value="Big"><label for="big">Big</label></label>';
        echo '<label>Rekeningnummer<input type="text" name=u_rekeningnr value="' . $row["lid_rekeningnr"] . '" placeholder=""/></label>';
        echo ' <label>Bank
        <select name="u_bank" value="' . $row["lid_bank"] . '">
        <option value="Rabobank">Rabobank</option>
        <option value="ING">ING</option>
        <option value="ABN Ambro">ABN Ambro</option>
        <option value="Triodos Bank">Triodos Bank</option>
        <option value="Deltra Lloyd">Delta Lloyd</option>
        <option value="AEGON Bank">AEGON Bank</option>
        <option value="NN Bank">NN Bank</option>
        </select>';
        echo '<input type="hidden" name="id" value="' . $row["lid_id"] . '"/>';
        echo '<input class="button" type="submit" value="Wijzigen"/>';
        echo'</form>';
    ?>
    </div>
    </div>
    <?php
  include_once 'footer.php'
?>