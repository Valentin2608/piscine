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


 if ($erreur == "") 
 {
 	
 	$database = "EbayECE";
	$db_handle = mysqli_connect('localhost', 'root', 'root');
	$db_found = mysqli_select_db($db_handle, $database);
	if (isset($_POST["CreaCompt"]))
	{
		$sql="SELECT * FROM `Acheteur`";
 		$resultat=mysqli_query($db_handle,$sql);
 		$temp="ucvbn";
 		$ind=0;
 	while ($row=mysqli_fetch_array($resultat, MYSQLI_ASSOC))
    {
    	$temp=$row['Email'];
    	if($temp==$email)
    	{
    		$ind=1; 
    	} 
    	  
    }
		if($ind==0)
		{
		$sql="INSERT INTO `Acheteur`( `Nom`, `Prenom`, `Email`, `Adresse1`, `Adresse2`, `CodePostal`, `Pay`, `Tel`) VALUES ('$nom','$prenom','$email','$adresse1','$adresse2','$cp','$pay','$tel')";
		mysqli_query($db_handle,$sql); 
		header('Location: index.html');
		}
		else
		{ 
				
			
            header('Location: creerCompteAcheteur2.html'); 
			

			 
			
		}
	mysqli_close($link); 
	}
 }
 else {
 echo "Erreur : $erreur";
 }
 
?> 