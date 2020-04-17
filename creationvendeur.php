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



 if ($erreur == "") 
 {
 	
	
	
 	$database = "ECEEbay";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	if (isset($_POST["CreaCompt"]))
	{
		
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
		
		$sql="SELECT * FROM `Vendeur`";
		$resultat=mysqli_query($db_handle,$sql);
		$max=0;
		while ($row=mysqli_fetch_array($resultat, MYSQLI_ASSOC))
		{
        $min=$row['ID'];
        if($max<$min)
        {
            $max=$min;
        }
		}
		$max=$max+1;
		$max.="photo.jpeg";
		$sql="INSERT INTO `Vendeur`( `Nom`, `Prenom`, `Email`, `Adresse`, `MdP`, `PhotoP`) VALUES ('$nom','$prenom','$email','$adresse','$password','$max')";
		
		if(mysqli_query($db_handle, $sql)){ 
    	echo "Record was updated successfully."; 
		} else 
		{ 
    		echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($db_handle); 
		}
		// récupération et dl de la photo
         if (isset($_FILES['photo']['tmp_name'])) {
        $_FILES['photo']['name']= $max;
        $retour = copy($_FILES['photo']['tmp_name'],$max);
	mysqli_close($db_handle); 
	
		}
 
	}
 }
 }
 else {
 echo "Erreur : $erreur";
 }
?> 