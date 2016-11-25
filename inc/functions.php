<?php

function getUser($pdo, $mail)
{
	$sql = 'SELECT id, mail, lastname, firstname, password, nb_tries, last_pass_change FROM Users WHERE mail = :mail';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':mail', $mail);
	$stmt->execute();
	return $stmt->fetch();
}



function envoiMail(){

	$mail = new PHPMailer();

    $mail->isSMTP();                                      	// On va se servir de SMTP
    $mail->Host = 'smtp.gmail.com';  						// Serveur SMTP
    $mail->SMTPAuth = true;                               	// Active l'autentification SMTP
    $mail->Username = 'wf3.mailer@gmail.com';             	// SMTP username
    $mail->Password = '$NJ27^^4q7';                   		// SMTP password
    $mail->SMTPSecure = 'tls';                            	// TLS Mode
    $mail->Port = 587;                                    	// Port TCP à utiliser
    $mail->CharSet = 'UTF-8';

    $mail->SMTPDebug = 2;

    $mail->setFrom('wf3.mail@gmail.com', 'Mon programme PHP', false);
    $mail->addAddress('mk@bwets.net', 'Joe User');     		// Ajouter un destinataire
    $mail->addAddress('ellen@example.com');               	// Le nom est optionnel
    $mail->addReplyTo('contact@monsite.fr', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    $mail->isHTML(true);                                  	 // Set email format to HTML

    $mail->Subject = 'Nouveau sujet';
    $mail->Body    = 'Message au format html : <h1>Bonjour</h1>';
    $mail->AltBody = 'Le message en texte brut, pour les clients qui ont désactivé l\'affichage HTML';

    if(!$mail->send()) {
    	echo 'Le message n\'a pas pu être envoyé';
    	echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
    	echo 'Le message a été envoyé';
    }
}
 
$articles = "SELECT * FROM ARTICLES ORDER BY date DESC LIMIT 3";


