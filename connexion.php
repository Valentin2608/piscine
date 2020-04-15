<?php

 $login = isset($_POST["login"])? $_POST["login"] : ""; //if then else
 $password = isset($_POST["password"])? $_POST["password"] : "";


//identifier votre BDD
$database = "ECEEbay";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//Partie 1:recherche login et mot de passe dans la BDD
//*****************************

if (isset($_POST['button1'])) {
	if ($db_found) {
		$sql = "SELECT * FROM acheteur";
		if ($login != "") {
			$sql .= " WHERE Email LIKE '$login'";
			if ($password != "") {
				$sql .= " AND MdP LIKE '$password'";
								}
							}
		$result = mysqli_query($db_handle, $sql);
		//regarder s'il y a de résultat
		if (mysqli_num_rows($result) == 0) {
			echo "Compte non trouvé";
				}
				else {
						
					
					sleep(1);
					header('Location: index.html');
					
					mysqli_close($db_handle); 

						}
}
	else {
		echo "Compte non trouvé";
		mysqli_close($db_handle); 
			}
}
?> 