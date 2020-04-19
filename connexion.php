

<?php
session_start();
 $login = isset($_POST["login"])? $_POST["login"] : ""; //if then else
 $password = isset($_POST["password"])? $_POST["password"] : "";


//identifier votre BDD
$database = "EbayECE";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//Partie 1:recherche login et mot de passe dans la BDD
//*****************************

if (isset($_POST['Connect'])) {
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
						
					
					$sql = "SELECT * FROM Acheteur WHERE Email = '$login'";
					$result = mysqli_query($db_handle, $sql);
					$data = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$_SESSION['ID'] = $data['IDAcheteur'];
					$_SESSION['Nom'] = $data['Nom'];
					$_SESSION['Prenom'] = $data['Prenom'];
					$_SESSION['Email'] = $data['Email'];
					$_SESSION['Adresse1'] = $data['Adresse1'];
					$_SESSION['Adresse2'] = $data['Adresse2'];
					$_SESSION['Tel'] = $data['Tel'];
					$_SESSION['Pays'] = $data['Pays'];
					$_SESSION['CodePostal'] = $data['CodePostal'];
					$_SESSION['password'] = $data['MdP'];
					$id=$_SESSION['ID'];
					$i="1";
					$_SESSION['type']= $i;
					
					$sql = "SELECT * FROM payement WHERE IDclient ='$id'";
					$result = mysqli_query($db_handle, $sql);
					$data = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$_SESSION['Typecart'] = $data['Typecart'];
					$_SESSION['Numero'] = $data['Numero'];
					$_SESSION['Nom2'] = $data['Nom'];
					$_SESSION['Date'] = $data['Date'];
					$_SESSION['Crypto'] = $data['Crypto'];
				
					sleep(1);
					header('Location: moncompte.php');
					
					mysqli_close($db_handle); 

						}
}
	else {
		echo "Compte non trouvé";
		mysqli_close($db_handle); 
			}
}
?> 

