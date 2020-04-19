

<?php
session_start();
 $login = isset($_POST["login"])? $_POST["login"] : ""; //if then else
 $password = isset($_POST["password"])? $_POST["password"] : "";


//identifier votre BDD
$database = "ECEEbay";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//Partie 1:recherche login et mot de passe dans la BDD
//*****************************

if (isset($_POST['Connect'])) {
	if ($db_found) {
		$sql = "SELECT * FROM Vendeur";
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
					
					$sql = "SELECT * FROM Vendeur WHERE Email = '$login'";
					$result = mysqli_query($db_handle, $sql);
					$compter=0;
					$data = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$_SESSION['ID'] = $data['ID'];
					$_SESSION['Nom'] = $data['Nom'];
					$_SESSION['Prenom'] = $data['Prenom'];
					$_SESSION['Email'] = $data['Email'];
					$_SESSION['Adresse'] = $data['Adresse'];
					$_SESSION['password'] = $data['MdP'];
					$_SESSION['PhotoP']=$data['PhotoP'];
					$_SESSION['admin']=$data['admin'];					
					$id=$_SESSION['ID'];
					if ($_SESSION['admin']=="1")
					{
					$i="3";
					}
					else
					{
						$i="2";
					}
					echo $i;
					$_SESSION['type']= $i;
					
					$sql = "SELECT * FROM items WHERE IDVendeur ='$id'";
					$result = mysqli_query($db_handle, $sql);
					while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
					{
						$compter=$compter+1;
						
					}
					$_SESSION['NombreO'] =$compter;
				
					sleep(1);
					header('Location: Moncomptevendeur.php');
					
					mysqli_close($db_handle); 

						}
}
	else {
		echo "Compte non trouvé";
		mysqli_close($db_handle); 
			}
}
?> 

