<?php
  include_once 'header.php'
?>
    <form action="includes/signup.inc.php" method="POST">
        <div class="grid-x align-center">
            <div class="cell shrink form-card">
            <div class="h4">Aanmelden</div>
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
                <label>Abonnement
                <br>
                    <input type="radio" name="lid_abbo" id="mini" value="Mini"><label for="mini">Mini</label>
                    <input type="radio" name="lid_abbo" id="regular" value="Regular"><label for="regular">Regular</label>
                    <input type="radio" name="lid_abbo" id="big" value="Big"><label for="big">Big</label>
                </label>
                <label>Rekeningnummer
                    <input type="text" name="lid_rekeningnr" placeholder="" required>
                </label>
                <label>Bank
                    <select name="lid_bank" required>
                    <option value="husker">Rabobank</option>
                    <option value="starbuck">ING</option>
                    <option value="hotdog">ABN Ambro</option>
                    <option value="apollo">Triodos</option>
                    <option value="apollo">Delta Lloyd</option>
                    <option value="apollo">AEGON bank</option>
                    <option value="apollo">NN Bank</option>
                    </select>
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