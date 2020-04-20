<?php
	//récupérer les infos du formulaire 
	$nom = isset($_POST["nom"])? $_POST["nom"] : ""; 
	$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
	$email = isset($_POST["email"])? $_POST["email"] : "";
	$adresse1 = isset($_POST["adresse1"])? $_POST["adresse1"] : "";
	$adresse2 = isset($_POST["adresse2"])? $_POST["adresse2"] : "";
	$cp = isset($_POST["cp"])? $_POST["cp"] : ""; 
	$pay = isset($_POST["pay"])? $_POST["pay"] : "";
	$tel = isset($_POST["tel"])? $_POST["tel"] : "";
	$password = isset($_POST["password"])? $_POST["password"] : "";
	
	//on vérifie que tous les champs soit bien rempli 
	$erreur = "";
	if ($nom== "") 
	{
	$erreur .= "Nom est vide. <br>"; }
	
	if ($password== "") 
	{
	$erreur .= "Password est vide. <br>"; }
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
	
	
	if ($erreur == "") 
	{
	
	
	
 	$database = "EbayECE";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	if (isset($_POST["CreaCompt"]))
	{
	//on met a jour la BDD 
	$sql="SELECT * FROM `Acheteur`";
	$resultat=mysqli_query($db_handle,$sql);
	$temp="ucvbn";
	$ind=0;
 	while ($row=mysqli_fetch_array($resultat, MYSQLI_ASSOC))
    {
	$temp=$row['Email'];
	;
	if($temp==$email)
	{
	$ind=1; 
	} 
	
    }
	if($ind==0)
	{
	$sql="INSERT INTO `Acheteur`( `Nom`, `Prenom`, `Email`, `Adresse1`, `Adresse2`, `CodePostal`, `Pays`, `Tel`,`MdP`) VALUES ('$nom','$prenom','$email','$adresse1','$adresse2','$cp','$pay','$tel','$password')";
	if(mysqli_query($db_handle, $sql)){ 
	echo "Record was updated successfully."; 
	} else 
	{ 
	echo "ERROR: Could not able to execute $sql. "  
	. mysqli_error($db_handle); 
	}  
	sleep(1);
	header('Location: connexionCompteAcheteur.html');// on retourne à la connexion 
	}
	else
	{ 
	
	
	header('Location: creerCompteAcheteur.html'); 
	
	
	
	
	}
	mysqli_close($db_handle); 
	}
	}
	else {
	echo "Erreur : $erreur";
	}
	
	?> 	