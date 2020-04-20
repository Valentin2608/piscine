<?php
	session_start();
	$ref =$_GET['ref'];
	$ida=$_GET['ida'];
	//on recupére les infos passé par l'url
	
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
	
    
    //on vérifie que l'article n'est pas déjà dans le panier 
    $sql="SELECT * FROM `Panier` WHERE `Ref`='$ref' AND `IDAcheteur`='$ida'";
    $resultat=mysqli_query($db_handle, $sql);
	if(mysqli_num_rows($resultat) == 0)
	{ 
		//on met à jour la BDD
		$sql="INSERT INTO `Panier`(`IDAcheteur`, `Ref`) VALUES ('$ida','$ref')";
		mysqli_query($db_handle, $sql);
	}
    
    echo"8642<br>";
    mysqli_close($db_handle);    
    header('Location:voirpanier.php');
	
?>