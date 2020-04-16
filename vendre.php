
<?php
 $nom = isset($_POST["nom"])? $_POST["nom"] : ""; 
 
 $description = isset($_POST["description"])? $_POST["description"] : "";
 //$image = isset($_POST["image"])? $_POST["image"] : "";
  $categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
  $typeVente = isset($_POST["typeVente"])? $_POST["typeVente"] : ""; 
 $IDVendeur = 0;
  $prix = isset($_POST["prix"])? $_POST["prix"] : "";


 $message = "";
 if ($nom== "") 
 {
 $message = 'Nom est vide.';
echo '<script type="text/javascript">window.alert("'.$message.'");</script>'; }
 if ($description == "") {
 $message= "La Description est vide. <br>"; 
 echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
 /*if ($image == "") {
 $message= "L'image est vide. <br>"; 
 echo '<script type="text/javascript">alert("'.$message.'");</script>';
 }*/
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
 	$database = "EbayECE";
	$db_handle = mysqli_connect('localhost', 'root', 'root');
	$db_found = mysqli_select_db($db_handle, $database);
	if ($_POST["soumettre"]) 
	{
		
		// récupération et dl de la photo
         if (isset($_FILES['photo']['tmp_name'])) {
        $_FILES['photo']['name']="alain.jpeg";
        $retour = copy($_FILES['photo']['tmp_name'],"alain.jpeg");

        if($retour) {
            echo '<p>La photo a bien été envoyée.</p>';

            echo '<img src="alain.jpeg">';
        }
    }
		$sql="INSERT INTO `Items`(`Nom`, `Description`, `Images`, `Categorie`, `TypedeVente`, `IDVendeur`, `Prix`) VALUES ('$nom','$description','gh','$categorie','$typeVente','$IDVendeur','$prix ')";
		
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
 //header('Location: index.php');
?> 