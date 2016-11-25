<?php

session_start();

require_once 'inc/dbConnection.php';
require_once 'inc/functions.php';

if(isset($_POST['connect'])) {
    // J'essaie de me connecter

    $user = getUser($pdo, $_POST['mail']);

    if(!empty($user)) {
        if ($_POST['pass'] == $user['password']) {
            $connected = true;
            // Ajouter en session l'utilisateur

            $_SESSION['user_logged'] = array(
                'id' => $user['id'],
                'mail' => $user['mail'],
                'lastname' => $user['lastname'],
                'firstname' => $user['firstname'],
            );
            $_SESSION['log_time'] = time();
        } else {
            $connected = false;
        }
    }
}

?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Connexion</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php if(isset($connected)) : ?>
        <?php if($connected == true) : ?>
            Connecté en tant que <?= $user['firstname'] ?> <?= $user['lastname'] ?><br>
            <a href="content.php">Le contenu est accessible</a>
        <?php else : ?>
            Identification impossible
        <?php endif ?>
    <?php endif ?>

    <form id="connect" action="#" method="POST">
        <header>
            <h1>Connexion</h1>
        </header>
        <div class="field">
            <input type="text" name="mail" placeholder="E-mail"><br>
        </div>
        <div class="field">
            <input type="password" name="pass" placeholder="Mot de passe"><br>
        </div>
        <div class="field">
            <input type="submit" id="connect-btn" name="connect" value="Connexion">
        </div>
    </form>
    
</body>
</html>