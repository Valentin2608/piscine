<?php
 $nom = isset($_POST["nom"])? $_POST["nom"] : ""; 
 $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
 $email = isset($_POST["email"])? $_POST["email"] : "";
 $pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
 $password = isset($_POST["password"])? $_POST["password"] : "";
 

 $erreur = "";
 if ($nom== "") 
 {
 $erreur .= "Nom est vide. <br>"; }
 if ($prenom == "") {
 $erreur .= "Prénom est vide. <br>"; }
 if ($email == "") {
 $erreur .= "Email est vide. <br>"; }
 if ($pseudo == "") {
 $erreur .= "pseudo est vide. <br>"; }
 if ($password == "") {
 $erreur .= "password est vide. <br>"; }



 if ($erreur == "") 
 {
 	$database = "EbayECE";
	$db_handle = mysqli_connect('localhost', 'root', 'root');
	$db_found = mysqli_select_db($db_handle, $database);
	if ($_POST["button1"]) 
	{
		
		$sql="INSERT INTO `Vendeur`( `Nom`, `Prenom`, `Email`, `Pseudo`, `MdP`) VALUES ('$nom','$prenom','$email','$pseudo','$password')";
		if(mysqli_query($db_handle, $sql)){ 
    	echo "Record was updated successfully."; 
		} else 
		{ 
    		echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($db_handle); 
		}  
	mysqli_close($link); 
	}
 }
 else {
 echo "Erreur : $erreur";
 }
?> 