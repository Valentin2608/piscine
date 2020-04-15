<?php
 $nom = isset($_POST["nom"])? $_POST["nom"] : ""; 
 $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
 $email = isset($_POST["email"])? $_POST["email"] : "";
 $adresse1 = isset($_POST["adresse1"])? $_POST["adresse1"] : "";
  $adresse2 = isset($_POST["adresse2"])? $_POST["adresse2"] : "";
  $cp = isset($_POST["cp"])? $_POST["cp"] : ""; 
 $pay = isset($_POST["pay"])? $_POST["pay"] : "";
  $tel = isset($_POST["tel"])? $_POST["tel"] : "";


 $erreur = "";
 if ($nom== "") 
 {
 $erreur .= "Nom est vide. <br>"; }
 if ($prenom == "") {
 $erreur .= "Prénom est vide. <br>"; }
 if ($email == "") {
 $erreur .= "Email est vide. <br>"; }
 if ($adresse1 == "") {
 $erreur .= "Adresse 1 est vide. <br>"; }
 if ($cp == "") {
 $erreur .= "Code Postal est vide. <br>"; }
 if ($pay == "") {
 $erreur .= "Pay est vide. <br>"; }
 if ($tel == "") {
 $erreur .= "Tel est vide. <br>"; }


 if ($erreur == "" && $_POST["buttonCreer"] ) 
 {
 	$database = "EbayECE";
	$db_handle = mysqli_connect('localhost', 'root', 'root');
	$db_found = mysqli_select_db($db_handle, $database);
	
		
		$sql="INSERT INTO `Acheteur`( `Nom`, `Prenom`, `Email`, `Adresse1`, `Adresse2`, `CodePostal`, `Pay`, `Tel`) VALUES ('$nom','$prenom','$email','$adresse1','$adresse2','$cp','$pay','$tel')";
		if(mysqli_query($db_handle, $sql)){ 
    	echo "Record was updated successfully."; 
		} else 
		{ 
    		echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($db_handle); 
		}  
	mysqli_close($link); 
	
 }
 else if ($erreur == "" && $_POST["buttonSuppr"] )
 {
	$database = "EbayECE";
	$db_handle = mysqli_connect('localhost', 'root', 'root');
	$db_found = mysqli_select_db($db_handle, $database);
	
		
		$sql="DELETE FROM `Acheteur` WHERE ID=2";
		if(mysqli_query($db_handle, $sql)){ 
    	echo "Suppression réussi."; 
		} else 
		{ 
    		echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($db_handle); 
		}  
	mysqli_close($link); 
	
 }
 else {
 echo "Erreur : $erreur";
 }
?> 