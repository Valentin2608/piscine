<?php
$nom = isset($_POST["nom"])? $_POST["nom"] : ""; 
 $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
 $email = isset($_POST["email"])? $_POST["email"] : "";
 $adresse1 = isset($_POST["adresse1"])? $_POST["adresse1"] : "";
  $adresse2 = isset($_POST["adresse2"])? $_POST["adresse2"] : "";
  $cp = isset($_POST["cp"])? $_POST["cp"] : ""; 
 $pay = isset($_POST["pay"])? $_POST["pay"] : "";
  $tel = isset($_POST["tel"])? $_POST["tel"] : "";
   $id = isset($_POST["id"])? $_POST["id"] : "";
  
  
	$erreur = "";
	$database = "ECEEbay";
	$db_handle = mysqli_connect('localhost', 'root','');
	$db_found = mysqli_select_db($db_handle, $database);
	
	if ($_POST["buttonModif"]) 
	{
		 
		
		 if ($nom!= "") 
	{
		
		$sql ="UPDATE acheteur SET nom='$nom' WHERE ID='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification du Nom Réussie <br>"; 
        }
	
		
	}
	if ($prenom != "") 
 {
		$sql ="UPDATE acheteur SET prenom='$prenom' WHERE ID='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification du Prénom  Réussie <br>"; 
        }
 }
 if ($adresse1!= "") 
 {
		$sql ="UPDATE acheteur SET adresse1='$adresse1' WHERE ID='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification de l'adresse 1 Réussie <br>"; 
        }
 }
 		 if ($email!= "") 
 {
		$sql ="UPDATE acheteur SET email='$email' WHERE ID='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification de l'email Réussie <br>"; 
        }
 }
	
 if ($adresse2!= "") 
 {
		$sql ="UPDATE acheteur SET adresse2='$adresse2' WHERE ID='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification de l'adresse2 Réussie <br>"; 
        }
 }	
		

 if ($cp!= "") 
 {
$sql ="UPDATE acheteur SET CodePostal='$cp' WHERE ID='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification du Code Postal Réussie <br>"; 
        }
 }		 
 
if ($pay!= "") 
 {
		$sql ="UPDATE acheteur SET Pay='$pay' WHERE ID='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification du Pays Réussie <br>"; 
        }
 }	
		
if ($tel!= "") 
 {
		$sql ="UPDATE acheteur SET Tel='$tel' WHERE ID='$id'";

		
		if(mysqli_query($db_handle, $sql)){ 
		echo "Modification du Telephone Réussie <br>"; 
        }
 }		
	mysqli_close($db_handle);
	}
?> 