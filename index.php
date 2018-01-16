<?php
  include_once 'header.php'
?>
  <form>
    <div class="form-bg">
      <div class="grid-x align-center">
        <div class="cell shrink form-card">
          <label>Gebruikersnaam
            <input type="text" placeholder="">
          </labael>
          <label>Wachtwoord
            <input type="password" placeholder="">
          </label>
          <button type="submit" name="submit">Login</button>
          <a href="signup.php">Aanmelden</a>
        </div>
      </div>
    </div>
  </form>
<?php
  include_once 'footer.php'
?>