<?php
 $nom = isset($_POST["nom"])? $_POST["nom"] : ""; 
 $ddebut = isset($_POST["date-start"])? $_POST["date-start"] : "";
 $dfin = isset($_POST["date-fin"])? $_POST["date-fin"] : "";
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
 $message= "La Description est vide. "; 
 echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
 //if ($image == "") {
// $message= "L'image est vide. <br>"; 
// echo '<script type="text/javascript">alert("'.$message.'");</script>';
 //}
 if ($categorie == "") {
 $message= "La catégorie est vide."; 
 echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
 if ($typeVente == "") {
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
 	$database = "Ebayece";
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
		$max.=".jpeg";
		$sql="INSERT INTO `Items`(`Nom`, `Description`, `Images`, `Categorie`, `TypedeVente`, `IDVendeur`, `Prix`) VALUES ('$nom','$description','$max','$categorie','$typeVente','$IDVendeur','$prix ')";
		$sql2="SELECT MAX(Ref) FROM Items";
		$ref=mysqli_query($db_handle,$sql2);
		if($typedeVente == "enchere")
		{
			$sql="INSERT INTO Encheres (IDVendeur, ddebut, dfin, Ref, Prixmin) VALUES ('$IDVendeur', '$ddebut', '$dfin', '$ref', '$prix')";
		}
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

        if($retour) {
            echo '<p>La photo a bien été envoyée.</p>';

            echo "<img src='$max'>";
        }
    }		
	mysqli_close($db_handle); 
	}
 }
 //header('Location: index.php');
?> 