<?php
	session_start();
	// on recupère les information du formulaire 
	$nom = isset($_POST["nom"])? $_POST["nom"] : ""; 
	$ddebut = isset($_POST["ddebut"])? $_POST["ddebut"] : "";
	$dfin = isset($_POST["dfin"])? $_POST["dfin"] : "";
	
	$description = isset($_POST["description"])? $_POST["description"] : "";
	$categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
	$typedeVente = isset($_POST["typeVente"])? $_POST["typeVente"] : ""; 
	$IDVendeur = $_SESSION['ID'];
	$prix = isset($_POST["prix"])? $_POST["prix"] : "";
	//on verifie que les champs sont bien rempli
	$message = "";
	if ($nom== "") 
	{
		$message = 'Nom est vide.';
	echo '<script type="text/javascript">window.alert("'.$message.'");</script>'; }
	if ($description == "") {
		$message= "La Description est vide. "; 
	echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
	if ($categorie == "") {
		$message= "La catégorie est vide."; 
	echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
	if ($typedeVente == "") {
		$message= "Le Type de Vente est vide."; 
	echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
	if ($prix == "") {
		$message= "Le prix est vide."; 
	echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
	if($ddebut == $dfin)
	{
		$message="Entrez une nouvelle date de fin";
	}
	
	if ($message == "") 
	{
		//on mat la base de donné un jour 
		$database = "EbayECE";
		$db_handle = mysqli_connect('localhost', 'root', '');
		$db_found = mysqli_select_db($db_handle, $database);
		if ($_POST["soumettre"]) 
		{
			$sql="SELECT * FROM `Items`";
			$resultat=mysqli_query($db_handle,$sql);
			$max=0;
			while ($row=mysqli_fetch_array($resultat, MYSQLI_ASSOC))
			{
				$min=$row['Ref'];
				if($max<$min)
				{
					$max=$min;
				}
				echo"1742<br>";
			}
			$max=$max+1;
			$max.=".jpeg";//image     on nomme l'immage avec la reférence de l'objet à laquelle elle est rataché 
			//on insère l'iteme dans la base de donné 
			$sql="INSERT INTO `Items`(`Nom`, `Description`, `Images`, `Categorie`, `TypedeVente`, `IDVendeur`, `Prix`) VALUES ('$nom','$description','$max','$categorie','$typedeVente','$IDVendeur','$prix ')";
			$result=mysqli_query($db_handle,$sql);
			$sql2="SELECT * FROM Items";
			$resultat=mysqli_query($db_handle,$sql2);
			$ref=0;
			while ($row2=mysqli_fetch_array($resultat, MYSQLI_ASSOC))
			{
				$min=$row2['Ref'];
				if($ref<$min)
				{
					$ref=$min;
					
				}
				
			}
			if($typedeVente == 3)// si on a une enchère alors on insère l'iteme dans la base de donné 
			{
				$sql3="INSERT INTO Encheres (IDvendeur, ddebut,dfin, Ref, Prixmin, Prixactuel) VALUES ('$IDVendeur', '$ddebut', '$dfin', '$ref', '$prix', '$prix')";
				if(mysqli_query($db_handle, $sql3)){ 
					echo "Record was updated successfully."; 
				} else 
				{ 
					echo "ERROR: Could not able to execute $sql3. "  
					. mysqli_error($db_handle); 
				} 
			}
			
			
			// récupération et dl de la photo
			echo $max;
			if (isset($_FILES['photo']['tmp_name'])) {
				$_FILES['photo']['name']= $max;
				$retour = copy($_FILES['photo']['tmp_name'],$max);
				
				if($retour) {
					echo '<p>La photo a bien été envoyée.</p>';
					
					echo "<img src='$max'>";
				}
			}		
			mysqli_close($db_handle); 
		}
	}
	header('Location: index.php');
?> 