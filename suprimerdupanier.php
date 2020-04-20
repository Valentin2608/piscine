<?php
	session_start();
	$ref =$_GET['ref'];
	$ida =$_GET['ida'];
	//$ida=$_SESSION['ID'];
	// on supprime un item du panier d'un acheteur
	//on recupére tout ce qui peut concerné l'item dna sla base de donnée 
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
	$sql="SELECT * FROM `Items` WHERE `Ref`='$ref'";
	$resultat2=mysqli_query($db_handle,$sql);
	$row2=mysqli_fetch_array($resultat2, MYSQLI_ASSOC);
	$prix=$row2['Prix'];
	$nom=$row2['Nom'];
	$description=$row2['Description']; 
	$categorie=$row2['Categorie'];
	$type=$row2['TypedeVente'];
	$idv=$row2['IDVendeur'];
	$img=$row2['Images'];
	if($type==4)// si il est aussi à la négaciation alors on recupére les information dans la table 
	{
		$sql="SELECT * FROM `Nego` WHERE `Ref`='$ref'";
		$resultat=mysqli_query($db_handle,$sql);
		$tab=array();
		if(mysqli_num_rows($resultat) > 0)
		{
			
			while($row2=mysqli_fetch_array($resultat, MYSQLI_ASSOC))
			{
				
				$ida=$row2['IDAcheteur'];
				array_push($tab, $ida);
				$compte=$row2['Compteur'];
				array_push($tab, $compte);
				$prop=$row2['Proposition']; 
				array_push($tab, $prop);
			$cp=$row2['ContreProposition'];
			array_push($tab, $cp);
			$acc=$row2['Accepter'];
			array_push($tab, $acc);
			}}}
			
			// on supprime l'objet
			$sql="DELETE FROM `Items` WHERE `Ref`='$ref'";
			if(mysqli_query($db_handle, $sql))
			{ //on reconstruit ensuite la BDD à l'identique sauf pour le panier 
        	$sql2="INSERT INTO `Items`(`Ref`, `Nom`, `Description`, `Images`, `Categorie`, `TypedeVente`, `IDVendeur`, `Prix`) VALUES ('$ref','$nom','$description','$img','$categorie','$type','$idv','$prix')";
        	mysqli_query($db_handle, $sql2);
        	$num=count($tab);
        	for ($it = 0; $it < $num; $it++)
        	{
			$ida=$tab[$it];
			$it=$it+1;
			$compte=$tab[$it];
			$it=$it+1;
			$prop=$tab[$it];
			$it=$it+1;
			$cp=$tab[$it];
			$it=$it+1;
			$acc=$tab[$it];
			$sql3="INSERT INTO `Nego`(`IDVendeur`, `IDAcheteur`, `Ref`, `Compteur`, `Proposition`, `ContreProposition`, `Accepter`) VALUES ('$idv','$ida','$ref','$compte','$prop','$cp','$acc')";
			mysqli_query($db_handle, $sql3);
        	}
			}
			else 
			{
            echo"1742<br>"; 
            echo mysqli_error($db_handle); 
			}
			echo"8642<br>";
			mysqli_close($db_handle);    
			header('Location:voirpanier.php');
			
			?>			