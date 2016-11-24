<?php 
	 require 'vendor/autoload.php';
	 require_once 'inc/functions.php';
if (isset($_POST['submit'])) {
	$sujet=$_POST['subject'];
	$mail=$_POST['mail'];
	/*envoiMail();*/

	echo 'Votre mail a été envoyer';
}

  ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Formulaire</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Contactez-nous</h1>
	<label>Formulaire de contact : <form action="#" method="POST">
		<label>Votre sujet : <input type="text" name="subject"></label>
		<label>Votre adresse mail : <input type="mail" name="mail"></label>
		<input type="submit" name="submit" value="Envoyer">
	</form></label>
</body>
</html>