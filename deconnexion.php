<?php
	// On appelle la session
	session_start();
	
	// On écrase le tableau de session
	$_SESSION = array();
	
	// On détruit la session
	session_destroy();
	sleep(1);
	echo "Vous etes Deconnecte";
	header('Location:index.php');//retour à l'index 
?>