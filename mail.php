<?php
require_once("inc/open_access_page.inc");


if (isset($_POST['email']))
//if "email" is filled out, send email
{
	//send email
	$email = $_POST['email'] ;
	$subject = $_POST['subject'] ;
	$message = $_POST['message'] ;
	mail("funapps.es@gmail.com", $subject,
	$message, "From:" . $email);
	echo "Gracias por tu mensaje";
}
require_once("inc/footers.inc");
?>