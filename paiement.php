<?php
	
	if (isset($_POST["button1"])) {
	//on récupaire les informations du formulaire 
		$ida =$_GET['ida'];
		$from=$_GET['from'];
		$card = isset($_POST["creditCard"])? $_POST["creditCard"] :"";
		$numeroC = isset($_POST["numeroC"])? $_POST["numeroC"] : "";
		$nomC= isset($_POST["nomC"])? $_POST["nomC"] :"";
		$dateE = isset($_POST["dateE"])? $_POST["dateE"] : "";
		$crypto = isset($_POST["crypto"])? $_POST["crypto"] : "";
		$erreur = "";
		
		//on verifie que tous les champs soit bien rempli 
		if ($numeroC== "") 
		{
		$erreur .= "numeroC est vide. <br>"; }
		if ($card== "") 
		{
		$erreur .= "card est vide. <br>"; }
		
		if ($nomC == "") {
		$erreur .= "nomC est vide. <br>"; }
		if ($dateE== "") {
		$erreur .= "dateE est vide. <br>"; }
		if ($crypto == "") {
		$erreur .= "crypto est vide. <br>"; }
		
		echo $from; 
		if ($erreur == "") 
		{
			//on met à jour la BDD
			$database = "EbayECE";
			$db_handle = mysqli_connect('localhost', 'root', '');
			$db_found = mysqli_select_db($db_handle, $database);
			$sql="INSERT INTO `payement`( `IDAcheteur`, `Typecart`,`Numero`,  `Nom`, `Date`, `Crypto`) VALUES ('$ida','$card','$numeroC','$nomC','$dateE','$crypto')";
			mysqli_query($db_handle, $sql);
			if($from==1)//on dicerne les cas pour renvoyer l'acheteur la ou il était avant la vérification
				{
					header('Location:voirpanier.php');
				}
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
			mysqli_close($db_handle);     
		
		
		}
		else
		{
			echo "Erreur : $erreur";
		}
	}
?>		