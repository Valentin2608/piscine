<?php
session_start();
	$nom = isset($_POST["nom"])? $_POST["nom"] : ""; 
	$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
	$email = isset($_POST["email"])? $_POST["email"] : "";
	$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
	$password = isset($_POST["password"])? $_POST["password"] : "";
	$id =$_SESSION['ID'];
	$erreur = "";
	$database = "EbayECE";
	$db_handle = mysqli_connect('localhost', 'root','');
	$db_found = mysqli_select_db($db_handle, $database);
		echo $_SESSION['Prenom'] ;
	if($email=="") 
					{
						
						$email=$_SESSION['Email'];
					}
	
	if ($_POST["buttonModif"]) 
	{
		 
		
		 if ($nom!= "") 
		{
		
		$sql ="UPDATE Vendeur SET nom='$nom' WHERE IDVendeur='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification du Nom Réussie <br>"; 
        }
	
		
		}
		if ($prenom != "") 
		{
		$sql ="UPDATE Vendeur SET prenom='$prenom' WHERE IDVendeur='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification du Prénom  Réussie <br>"; 
        }
		}
		if ($adresse!= "") 
		{
		$sql ="UPDATE Vendeur SET adresse1='$adresse' WHERE IDVendeur='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification de l'adresse  Réussie <br>"; 
        }
		}
 		 if ($email!= "") 
		{
		$sql ="UPDATE Vendeur SET email='$email' WHERE IDVendeur='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification de l'email Réussie <br>"; 
        }
		}
	
		if ($password!= "") 
		{	
		$sql ="UPDATE Vendeur SET MdP='$password' WHERE IDVendeur='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification du password Réussie <br>"; 
        }
		}	
		
					echo $_SESSION['PhotoP'];
					unset($_SESSION['Nom']);
					unset($_SESSION['Prenom']);
					unset($_SESSION['Email']);
					unset($_SESSION['Adresse']);
					unset($_SESSION['password']);
					$sql = "SELECT * FROM Vendeur WHERE Email = '$email'";
					$result = mysqli_query($db_handle, $sql);
					$data = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$_SESSION['Nom'] = $data['Nom'];
					$_SESSION['Prenom'] = $data['Prenom'];
					$_SESSION['Email'] = $data['Email'];
					$_SESSION['Adresse'] = $data['Adresse'];
					$_SESSION['password']=$data['MdP'];
					// récupération et dl de la photo
					if (isset($_FILES['photo']['tmp_name'])) 
					{
					echo "Modification de l'adresse2 Réussie <br>";
					echo $_SESSION['PhotoP'];
					$_FILES['photo']['name']= $_SESSION['PhotoP'];
					$retour = copy($_FILES['photo']['tmp_name'],$_SESSION['PhotoP']);
					
        }

	
	sleep(1);
	header('Location: moncomptevendeur.php');
	mysqli_close($db_handle);
	}
					
					
					
					
?> 