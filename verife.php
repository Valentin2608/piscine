<?php
	session_start();
	$ida =$_GET['ida'];
	//$ida=$_SESSION['ID'];
	
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
	//on verifie si l'acheteur a deja des donné bancaire renseigner 
    
    $from=$_GET['from'];
    $sql="SELECT * FROM `Payement` WHERE `IDAcheteur`='$ida'";
    $resultat=mysqli_query($db_handle, $sql);
	if(mysqli_num_rows($resultat) == 0)
	{ 
		if($from==1)// on distingue les cas pour pouvoir revenir sur la page de vente 
		{header('Location:paiement1.php?ida='.$ida.'&from='.$from);}
		if($from==2 || $from==3)
		{
	$ref =$_GET['ref'];
			header('Location:paiement1.php?ida='.$ida.'&from='.$from.'&ref='.$ref);
			}
		
	}
	else //si le coordonné existe alors on redirige vers les pages de finalisation de l'achat 
	{
		if($from==1)
		{header('Location:comfirmerpanier.php?ida='.$ida);}
		if($from==2)
		{
            $ref=$_GET['ref'];
            header('Location:comfirmernego.php?ida='.$ida.'&ref='.$ref);
		}
		if($from==3)
		{
            $ref=$_GET['ref'];
            header('Location:comfirmerenchere.php?ref='.$ref);
		}
	}


mysqli_close($db_handle); 


?>