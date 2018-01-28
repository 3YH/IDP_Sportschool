<?php

// If url field is empty (no spammer)
if(isset($_POST['url']) && $_POST['url'] == ''){

	// Benno email
	$youremail = 'yannickhj@gmail.com';

	// The standard email format
	$body = "Een klant heeft advies aangevraagd:
	Name:  $_POST[name]
	E-Mail: $_POST[email]
	Message: $_POST[message]";

	// Use the submitters email if supplied
	// Otherwise send from own email address.
	if( $_POST['email'] && !preg_match( "/[\r\n]/", $_POST['email']) ) {
	  $headers = "From: $_POST[email]";
	} else {
	  $headers = "From: $youremail";
	}

	// Send the email
	mail($youremail, 'Advies aanvraag', $body, $headers );

}

// If invisible field is filled in, let spammer think that they got their message through

?>
<?php
include_once 'header.php'
?>
<div class="text-center">
<h1>Bedankt voor uw bericht!</h1>
<a href="../index.php">Terug naar het dashboard</a>
</div>
<?php
  include_once 'footer.php'
?>
