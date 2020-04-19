<?php
session_start();
$nom = isset($_POST["nom"])? $_POST["nom"] : ""; 
 $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
 $email = isset($_POST["email"])? $_POST["email"] : "";
 $adresse1 = isset($_POST["adresse1"])? $_POST["adresse1"] : "";
  $adresse2 = isset($_POST["adresse2"])? $_POST["adresse2"] : "";
  $cp = isset($_POST["cp"])? $_POST["cp"] : ""; 
 $pay = isset($_POST["pay"])? $_POST["pay"] : "";
  $tel = isset($_POST["tel"])? $_POST["tel"] : "";
  $password = isset($_POST["password"])? $_POST["password"] : "";
   $id =$_SESSION['ID'];
  
	$erreur = "";
	$database = "EbayECE";
	$db_handle = mysqli_connect('localhost', 'root','');
	$db_found = mysqli_select_db($db_handle, $database);
	if($email=="") 
					{
						echo $_SESSION['Email'];
						$email=$_SESSION['Email'];
						echo $email;
						echo "123";
					}
	
	if ($_POST["buttonModif"]) 
	{
		 
		
		 if ($nom!= "") 
	{
		
		$sql ="UPDATE acheteur SET nom='$nom' WHERE IDAcheteur='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification du Nom Réussie <br>"; 
        }
	
		
	}
	if ($prenom != "") 
 {
		$sql ="UPDATE acheteur SET prenom='$prenom' WHERE IDAcheteur='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification du Prénom  Réussie <br>"; 
        }
 }
 if ($adresse1!= "") 
 {
		$sql ="UPDATE acheteur SET adresse1='$adresse1' WHERE IDAcheteur='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification de l'adresse 1 Réussie <br>"; 
        }
 }
 		 if ($email!= "") 
 {
		$sql ="UPDATE acheteur SET email='$email' WHERE IDAcheteur='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification de l'email Réussie <br>"; 
        }
 }
	
 if ($adresse2!= "") 
 {
		$sql ="UPDATE acheteur SET adresse2='$adresse2' WHERE IDAcheteur='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification de l'adresse2 Réussie <br>"; 
        }
 }	
		

 if ($cp!= "") 
 {
$sql ="UPDATE acheteur SET CodePostal='$cp' WHERE IDAcheteur='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification du Code Postal Réussie <br>"; 
        }
 }		 
 
if ($pay!= "") 
 {
		$sql ="UPDATE acheteur SET Pay='$pay' WHERE IDAcheteur='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification du Pays Réussie <br>"; 
        }
 }	
		
if ($tel!= "") 
 {
		$sql ="UPDATE acheteur SET Tel='$tel' WHERE IDAcheteur='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification du Telephone Réussie <br>"; 
        }
 }
if ($password!= "") 
 {
		$sql ="UPDATE acheteur SET MdP='$password!' WHERE IDAcheteur='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification du Telephone Réussie <br>"; 
        }
 }	 
	
	unset($_SESSION['Nom']);
					unset($_SESSION['Prenom']);
					unset($_SESSION['Email']);
					unset($_SESSION['Adresse1']);
					unset($_SESSION['Adresse2']);
					unset($_SESSION['Tel']);
					unset($_SESSION['Pays']);
					unset($_SESSION['CodePostal']);
					unset($_SESSION['password']);
					
					$sql = "SELECT * FROM Acheteur WHERE Email = '$email'";
					$result = mysqli_query($db_handle, $sql);
					$data = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$_SESSION['Nom'] = $data['Nom'];
					$_SESSION['Prenom'] = $data['Prenom'];
					$_SESSION['Email'] = $data['Email'];
					$_SESSION['Adresse1'] = $data['Adresse1'];
					$_SESSION['Adresse2'] = $data['Adresse2'];
					$_SESSION['Tel'] = $data['Tel'];
					$_SESSION['Pays'] = $data['Pays'];
					$_SESSION['CodePostal'] = $data['CodePostal'];
					$_SESSION['password'] = $data['MdP'];
	sleep(1);
	header('Location: moncompte.php');
	mysqli_close($db_handle);
	}
					
					
					
					
?> 