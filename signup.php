<?php
  include_once 'header.php'
?>
    <form action="includes/signup.inc.php" method="POST">
        <div class="grid-x align-center">
            <div class="cell shrink form-card">
            <?php 
            function get_code() {
                $random_nr_length = 10; 
                $uniqueId= mt_rand().''.time();
                $uniqueId = substr($uniqueId,0,$random_nr_length); 
                echo $uniqueId;
            }
           ?>
            <h4>Aanmelden</h4>
                    <input hidden name="pas_code" value="<?= get_code(); ?>" required>
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
                    <input type="radio" name="lid_abbo" id="mini" value="Mini" required><label for="mini">Mini</label>
                    <input type="radio" name="lid_abbo" id="regular" value="Flex" required><label for="regular">Flex</label>
                    <input type="radio" name="lid_abbo" id="big" value="Easy" required><label for="big">Easy</label>
                </label>
                <label>Rekeningnummer
                    <input type="text" name="lid_rekeningnr" placeholder="" required>
                </label>
                <label>Bank
                    <select name="lid_bank" required>
                    <option value="Rabobank">Rabobank</option>
                    <option value="ING">ING</option>
                    <option value="ABN Ambro">ABN Ambro</option>
                    <option value="Triodos Bank">Triodos bank</option>
                    <option value="Deltra Lloyd">Delta Lloyd</option>
                    <option value="AEGON Bank">AEGON bank</option>
                    <option value="NN Bank">NN Bank</option>
                    </select>
                </label>
                <label>Gebruikersnaam
                    <input type="text" name="lid_uid" placeholder="" required>
                </label>
                <label>Wachtwoord
                    <input type="password" name="lid_pwd" placeholder="" required>
                </label>
                <button class="button" type="submit" name="submit">Voltooien</button>
            </div>
        </div>
    </form>
    <?php
  include_once 'footer.php'
?>