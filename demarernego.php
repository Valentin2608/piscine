<?php
	session_start();
	$ref =$_GET['ref'];
	$ida=$_SESSION['ID'];
	
	//on recupére les infos du formulaire 
	$prix = isset($_POST["prix"])? $_POST["prix"] : "";
	
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
	
    //On met à jour la base de donnée
    $sql="SELECT * FROM `Items` WHERE `Ref`='$ref'";
    $resultat=mysqli_query($db_handle,$sql);
    $row=mysqli_fetch_array($resultat, MYSQLI_ASSOC); 
    $idv=$row['IDVendeur'];
    $prixo=$row['Prix'];
    $idv=$row['IDVendeur'];
    $sql="INSERT INTO `Nego`(`IDvendeur`, `IDAcheteur`, `Ref`, `Compteur`, `Proposition`, `ContreProposition`, `Accepter`) VALUES ('$idv','$ida','$ref',1,'$prix','$prixo',0)";
	if(mysqli_query($db_handle, $sql))
	{ 
		echo "Record was updated successfully."; 
	}
	else 
	{ 
		echo mysqli_error($db_handle); 
	}
    
    mysqli_close($db_handle); 
    header('Location:index.php');
	
?>
