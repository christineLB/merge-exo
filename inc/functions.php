<?php

	function getUser($pdo, $mail)
	    {
	        $sql = 'SELECT id, mail, lastname, firstname, password, nb_tries, last_pass_change FROM Users WHERE mail = :mail';
	        $stmt = $pdo->prepare($sql);
	        $stmt->bindParam(':mail', $mail);
	        $stmt->execute();
	        return $stmt->fetch();
	    }

?>