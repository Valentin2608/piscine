<?php
	
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
	$ref = $_GET['ref'];
	$from = $_GET['from'];
	$ida=$_SESSION['ID'];
	$rep = isset($_POST["rep"])? $_POST["rep"] : "";//on recupère la valeur de checkbox 
	if($rep==1)
	{
		//on met à jour la base de donné et on va vérifié si l'acheteur a renseigner ses données bancaires
		$sql="SELECT * FROM `Nego` WHERE `Ref`='$ref'AND `IDAcheteur`='$ida'";
 		$resultat=mysqli_query($db_handle,$sql);
 		$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
 		$prop=$row['ContreProposition'];
		$sql="UPDATE `Nego` SET Proposition='$prop' WHERE `Ref`='$ref' AND `IDAcheteur`='$ida'";
		header('Location:verife.php?ida='.$ida.'&from='.$from.'&ref='.$ref);
	}
	else
	{
		//on récupére les donné du formulaire et on met à jour la BDD
		$prix = isset($_POST["prix"])? $_POST["prix"] : "";
		$sql="SELECT * FROM `Nego` WHERE `Ref`='$ref'";
		$resultat=mysqli_query($db_handle,$sql);
		$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
		$compte=$row['Compteur']+1;
		if($compte<10)//on verifie le compteur 
		{
			$sql="UPDATE `Nego` SET `Compteur`='$compte',`Proposition`='$prix' WHERE `Ref`='$ref' AND IDAcheteur='$ida'";     
			if(mysqli_query($db_handle, $sql))
			{ 
				echo "Record was updated successfully."; 
			}
			else 
			{
				echo"1742<br>";
				echo mysqli_error($db_handle); 
			}
		}
		header('Location:index.php');
	}
    
    
    echo"8642<br>";
    mysqli_close($db_handle); 
    
	
	?>
		