<?php
	$nom = isset($_POST["nom"])? $_POST["nom"] : ""; 
	$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
	$email = isset($_POST["email"])? $_POST["email"] : "";
	$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
	$password = isset($_POST["password"])? $_POST["password"] : "";
	
	
	$erreur = "";
	
	if ($nom== "") 
	{
	$erreur .= "Nom est vide. <br>"; }
	if ($prenom == "") {
	$erreur .= "Prénom est vide. <br>"; }
	if ($email == "") {
	$erreur .= "Email est vide. <br>"; }
	if ($adresse == "") {
	$erreur .= "L'adresse est vide. <br>"; }
	if ($password == "") {
	$erreur .= "Password est vide. <br>"; }
	
	echo "0123</br>";
	
	if ($erreur == "") 
	{
		
		
		echo "123</br>";
		$database = "EbayECE";
		$db_handle = mysqli_connect('localhost', 'root', '');
		$db_found = mysqli_select_db($db_handle, $database);
		if (isset($_POST["CreaCompt"]))
		{
			echo "1234</br>";
			$sql="SELECT * FROM `Vendeur`";
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
		echo "1235</br>";
		$sql="SELECT * FROM `Vendeur`";
		$resultat=mysqli_query($db_handle,$sql);
		$max=0;
		while ($row=mysqli_fetch_array($resultat, MYSQLI_ASSOC))
		{
        $min=$row['IDVendeur'];
        if($max<$min)
        {
		$max=$min;
        }
		}
		$max=$max+1;
		$max.="photo.jpeg";
		$sql="INSERT INTO `Vendeur`( `Nom`, `Prenom`, `Email`, `Adresse`, `MdP`, `PhotoP`,`Admin`) VALUES ('$nom','$prenom','$email','$adresse','$password','$max','0')";
		echo "1236</br>";
		if(mysqli_query($db_handle, $sql)){ 
    	echo "Record was updated successfully."; 
		} else 
		{ 
		echo "ERROR: Could not able to execute $sql. "  
		. mysqli_error($db_handle); 
		}
		// récupération et dl de la photo
		if (isset($_FILES['photo']['tmp_name'])) {
		echo "1237</br>";
        $_FILES['photo']['name']= $max;
        $retour = copy($_FILES['photo']['tmp_name'],$max);
		
        if($retour) {
		echo '<p>La photo a bien été envoyée.</p>';
		
		echo "<img src='$max'>";
        }
		}
		mysqli_close($db_handle); 
		
		}
		
		else
		{ 
		
		
		header('Location: creationcomptevendeur.html'); 
		
		
		
		
		}
		}
		}
		
		else {
		echo "Erreur : $erreur";
		}
		sleep(1);
		header('Location: connexionvendeur.html');
		?> 		