<?php
 $nom = isset($_POST["nom"])? $_POST["nom"] : ""; 
 
 $description = isset($_POST["description"])? $_POST["description"] : "";
 $image = isset($_POST["image"])? $_POST["image"] : "";
  $categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
  $typeVente = isset($_POST["typeVente"])? $_POST["typeVente"] : ""; 
 $IDVendeur = "0";
  $prix = isset($_POST["prix"])? $_POST["prix"] : "";


 $erreur = "";
 if ($nom== "") 
 {
 $erreur .= "Nom est vide. <br>"; }
 if ($description == "") {
 $erreur .= "La Description est vide. <br>"; }
 if ($image == "") {
 $erreur .= "L'image est vide. <br>"; }
 if ($categorie == "") {
 $erreur .= "La catégorie est vide. <br>"; }
 if ($typeVente == "") {
 $erreur .= "Le Type de Vente est vide. <br>"; }
 if ($prix == "") {
 $erreur .= "Le prix est vide. <br>"; }


 if ($erreur == "") 
 {
 	$database = "EbayECE";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	if ($_POST["button1"]) 
	{
		
		$sql="INSERT INTO `items`(`Nom`, `Description`, `Images`, `Categorie`, `TypedeVente`, `IDVendeur`, `Prix`) VALUES ('$nom','$description','$image','$categorie','$typeVente','$IDVendeur','$prix ')";
		
		if(mysqli_query($db_handle, $sql)){ 
    	echo "Record was updated successfully."; 
		} else 
		{ 
    		echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($db_handle); 
		}  
	mysqli_close($db_handle); 
	}
 }
 else {
 echo "Erreur : $erreur";
 }
?> 