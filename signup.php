<?php
  include_once 'header.php'
?>
    <form action="includes/signup.inc.php" method="POST">
        <div class="form-bg">
            <div class="grid-x align-center">
                <div class="cell shrink form-card">
                    <label>Voornaam
                        <input type="text" name="lid_voornaam" placeholder="">
                    </label>
                    <label>Tussenvoegsel
                        <input type="text" name="lid_tsnvoegsel" placeholder="">
                    </label>
                    <label>Achternaam
                        <input type="text" name="lid_achternaam" placeholder="">
                    </label>
                    <label>Geboortedatum
                        <input type="date" name="lid_geboortedatum" placeholder="">
                    </label>
                    <label>Email
                        <input type="text" name="lid_email" placeholder="">
                    </label>
                    <label>Telefoonnummer
                        <input type="text" name="lid_tel" placeholder="">
                    </label>
                    <label>Gebruikersnaam
                        <input type="text" name="lid_uid" placeholder="">
                    </label>
                    <label>Wachtwoord
                        <input type="password" name="lid_pwd" placeholder="">
                    </label>
                    <button type="submit" name="submit">Voltooien</button>
                </div>
            </div>
        </div>
    </form>
    <?php
  include_once 'footer.php'
?>