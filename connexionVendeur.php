<?php
session_start();
 $email = isset($_POST["email"])? $_POST["email"] : ""; //if then else
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
		$sql = "SELECT * FROM Vendeur";
		if ($email != "") {
			$sql .= " WHERE Email LIKE '$email'";
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
						
					
					$sql = "SELECT ID, Nom, Prenom, Email, MdP FROM Vendeur WHERE Email = '$login'";
					$result = mysqli_query($db_handle, $sql);
					$data = mysqli_fetch_array($result, MYSQLI_ASSOC);
					 $_SESSION['ID'] = $data['ID'];
					$_SESSION['Nom'] = $data['Nom'];
						$_SESSION['Prenom'] = $data['Prenom'];
				$_SESSION['Email'] = $data['Email'];
				
					sleep(1);
					header('Location: index.php');
					
					mysqli_close($db_handle); 

						}
}
	else {
		echo "Compte non trouvé";
		mysqli_close($db_handle); 
			}
}
?> 