
<?php
 $nom = isset($_POST["nom"])? $_POST["nom"] : ""; 
 $description = isset($_POST["description"])? $_POST["description"] : "";
/*<form method="post" enctype="multipart/form-data" action="vendreitem.php" >
            <input type="file" name="photo">
            <input type="submit" name ="button1" value="Mettre Photo">
       </form> */
  $categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
  $typeVente = isset($_POST["typeVente"])? $_POST["typeVente"] : ""; 
 $IDVendeur = "0";
  $prix = isset($_POST["prix"])? $_POST["prix"] : "";
 
  
if (isset($_POST['button1'])) {
	


 $message = "";
 if ($nom== "") 
 {
 $message = 'Nom est vide.';
echo '<script type="text/javascript">window.alert("'.$message.'");</script>'; }
 if ($description == "") {
 $message= "La Description est vide. <br>"; 
 echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
 if ($categorie == "") {
 $message= "La catégorie est vide. <br>"; 
 echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
 if ($typeVente == "") {
 $message= "Le Type de Vente est vide. <br>"; 
 echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
 if ($prix == "") {
 $message= "Le prix est vide. <br>"; 
 echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}


 if ($message == "") 
 {
 echo '<p>La photo2 a bien été envoyée.</p>';
 	$database = "ECEEbay";
	
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
		 
		 // récupération et dl de la photo
		 if (isset($_FILES['photo']['tmp_name'])) {
		$_FILES['photo']['name']="alain.jpeg";
		$retour = copy($_FILES['photo']['tmp_name'],"alain.jpeg");
		
        if($retour) {
            echo '<p>La photo a bien été envoyée.</p>';
            
			echo '<img src="alain.jpeg">';
        }
    }	
	
		$sql="INSERT INTO `items`(`Nom`, `Description`, `Images`, `Categorie`, `TypedeVente`, `IDVendeur`, `Prix`) VALUES ('$nom','$description','caca','$categorie','$typeVente','$IDVendeur','$prix ')";
		
		if(mysqli_query($db_handle, $sql)){ 
    	echo "Record was updated successfully."; 
		} else 
		{ 
    		echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($db_handle); 
		}  
	mysqli_close($db_handle); 
}
 
 
 
 
}

?> 