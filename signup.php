<?php
  include_once 'header.php'
?>
    <form action="includes/signup.inc.php" method="POST">
        <div class="grid-x align-center">
            <div class="cell shrink form-card">
                <label>Voornaam
                    <input type="text" name="lid_voornaam" placeholder="" required>
                </label>
                <label>Tussenvoegsel
                    <input type="text" name="lid_tsnvoegsel" placeholder="">
                </label>
                <label>Achternaam
                    <input type="text" name="lid_achternaam" placeholder="" required>
                </label>
                <label>Geboortedatum
                    <input type="date" name="lid_geboortedatum" placeholder="" required>
                </label>
                <label>Gewicht
                    <input type="number" name="lid_gewicht" placeholder="" required>
                </label>
                <label>Straatnaam
                    <input type="text" name="lid_straatnaam" placeholder="" required>
                </label>
                <label>Huisnummer
                    <input type="number" name="lid_huisnr" placeholder="" required>
                </label>
                <label>Postcode
                    <input type="text" name="lid_postcode" placeholder="" required>
                </label>
                <label>Woonplaats
                    <input type="text" name="lid_woonplaats" placeholder="" required>
                </label>
                <label>Email
                    <input type="text" name="lid_email" placeholder="" required>
                </label>
                <label>Telefoonnummer
                    <input type="text" name="lid_tel" placeholder="" required>
                </label>
                <label>Rekeningnummer
                    <input type="text" name="lid_rekeningnr" placeholder="" required>
                </label>
                <label>Bank
                    <input type="text" name="lid_bank" placeholder="" required>
                </label>
                <label>Gebruikersnaam
                    <input type="text" name="lid_uid" placeholder="" required>
                </label>
                <label>Wachtwoord
                    <input type="password" name="lid_pwd" placeholder="" required>
                </label>
                <button type="submit" name="submit">Voltooien</button>
            </div>
        </div>
    </form>
    <?php
  include_once 'footer.php'
?>