<?php
session_start();
if(empty($_SESSION['type']))
{
$_SESSION['type']=0;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Mon compte</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styleIndex.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>


<body>
<div class="global">
<div class="container-fluid"> 
<div class="row" style="height:80px; background-color:#007179; border: solid; border-color:#808080;">
	<div class="col-lg" ></div>
	<div class="col-lg" style="text-align:center" ><img src="logo.png" alt="" height="70px;"></div>
	<div class="col-lg" ></div>
</div>


<div class="row"style="height:60px; background-color:#007179; border-bottom: solid;border-left:solid; border-right:solid; border-color:#808080;">
<nav class="navbar navbar-expand-lg">
	
	<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
			 	<span class="navbar-toggler-icon"></span>
	</button>
	
			 <div class="collapse navbar-collapse" id="main-navigation">
				 <ul class="navbar-nav">
				 
				 <div class="col-lg-3">
					 <li class="nav-item"><a class="nav-link" href="index.php" style="color:white;">Accueil</a></li>
				</div>
				<div class="col-lg-3">
					 <li class="nav-item">
					 <div class="dropdown">
						<p data-toggle="dropdown" style="color:white; margin-top:7px; margin-left:5px;">Catégorie</p>
						<div class="dropdown-menu">
						<a class="nav-link" href="listeFerrailleTresor.html">
							<div class="dropdown-item">
							Ferraille ou Trésor
							</div></a>
							<a class="nav-link" href="listeBonMusée.html">
							<div class="dropdown-item">
							Bon pour le musée
							</div></a>
							<a class="nav-link" href="listeAccessoireVIP.html">
							<div class="dropdown-item">
							Accessoire VIP
							</div></a>
						</div>
					</div>
					</li>
				</div>
				<div class="col-lg-3">
					 <li class="nav-item">
					 <div class="dropdown">
						<p data-toggle="dropdown" style="color:white; margin-top:7px; margin-left:5px;">Achat</p>
						<div class="dropdown-menu">
						<a class="nav-link" href="listeEnchere.html">
							<div class="dropdown-item">
							Enchère
							</div></a>
							<a class="nav-link" href="listeAchatImmediat.html">
							<div class="dropdown-item">
							Achat immédiat
							</div></a>
							<a class="nav-link" href="listeMeilleureOffre.html">
							<div class="dropdown-item">
							Meilleure offre
							</div></a>
						</div>
					</div>
					</li>
				</div>
				
				<?php
				    
					if(empty($_SESSION['ID']))
					{
					echo'<div class="col-lg-3">';
					 echo '<li class="nav-item"><a class="nav-link" href="connexionVendeur.html"style="color:white;">Vendre</a></li>';
					 echo'</div>';
					 echo'<div class="col-lg-3">';
					 echo '<li class="nav-item"><a class="nav-link" href="connexionCompteAcheteur.html"style="color:white;">Compte</a></li>';
					 echo'</div>';
					 echo'<div class="col-lg-3">';
					echo '<li class="nav-item"><a class="nav-link" href="connexionCompteAcheteur.html"style="color:white;">Panier</a></li>';
					 echo'</div>';
					 echo'<div class="col-lg-3">';
					  echo '<li class="nav-item"><a class="nav-link" href="connexionCompteAdmin.html"style="color:white;">Admin</a></li>';
					 echo'</div>';
					
					 
					 
					}
					
					if(($_SESSION['type'])=='1')
					{
						echo'<div class="col-lg-3">';
						echo '<li class="nav-item"><a class="nav-link" href="MonCompte.php"style="color:white;">Mon Compte</a></li>';
						echo'</div>';
						echo'<div class="col-lg-3">';
					echo '<li class="nav-item"><a class="nav-link" href="PanierAcheteur.html"style="color:white;">Panier</a></li>';
					 echo'</div>';
					}
					
					
					if(($_SESSION['type'])=='2')
					{
					echo'<div class="col-lg-3">';
					 echo '<li class="nav-item"><a class="nav-link" href="vendre.html"style="color:white;">Vendre</a></li>';
					 echo'</div>';
					 echo'<div class="col-lg-3">';
					 echo '<li class="nav-item"><a class="nav-link" href="CompteVendeur.html"style="color:white;">Mon Compte</a></li>';
					 echo'</div>';
						
					}
					
					
					if(($_SESSION['type'])=='3')
					{
						echo'<div class="col-lg-3">';
					echo '<li class="nav-item"><a class="nav-link" href="PanierAcheteur.html"style="color:white;">Panier</a></li>';
					 echo'</div>';
					 echo'<div class="col-lg-3">';
						echo '<li class="nav-item"><a class="nav-link" href="compteAdmin.html"style="color:white;">Mon compte</a></li>';
						 echo'</div>';
					}
					
				?>
				
				
				
				<div class="col-lg-3"></div>
				<div class="col-lg-3">
					 <form class="navbar-form navbar-right inline-form">
						<div class="form-group">
						<input type="search" class="input-sm form-control" placeholder="Recherche">
						<button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
						</div>
					</form>
				</div>
				
				<div class="col-lg-3">
				<?php
				if(empty($_SESSION['ID'])) 
				{
				echo"<li class='nav-item'><a class='nav-link' href='connexion.html' style='color:white;'>Se Connecter</a></li>";
				
				}
				else 
				{
					echo "<li class='nav-item'><a class='nav-link' href='deconnexion.php' style='color:white;'>Se Deconnecter</a></li>";
				}
				 ?>
				
				</div>
				 </ul>
			 </div>
</nav>
</div>
<br>
</div>


<div class="index">
<div class="siteDesc" style="border-bottom:solid; border-color:#808080;"> 

<p> Ebay ECE permet aux utilisateurs d'acheter, d'enchérir de négocier ou bien de vendre trois différents types d'objet, la ferraille ou trésor, 
les objets bon pour le musée ainsi que les accessoires VIP. Ces achats/ventes peuvent être fait de trois façon différentes, l'enchère, l'achat immédiat 
ou la négoiation ( meilleure offre) </p>
</div>



<div class="barreInfo" style="border-bottom:solid; border-color:#808080; text-align:center;"> <p> <strong>Les produits les plus recherchés </strong></p></div>
<div class="row">
<div class="col-lg-1">
<?php
	echo "<p> test</p></br>";
$i=rand(14,17);
$database = "ECEEbay";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found) 
{
$sql = "SELECT * FROM Items WHERE Ref='$i'";
$result = mysqli_query($db_handle, $sql);
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
$img=$row['Images'];
$nom=$row['Nom'];
$cate=$row['Categorie'];
$typeV=$row['TypedeVente'];
$prix=$row['Prix'];
echo "<img src=".$img."></br>";
echo $nom . "</br>";
echo $cate . "</br>";
echo $typeV ."</br>";
echo $prix."</br>";

//echo mysql_result($result);
}
?>
</div>
<div class="col-lg-1">
<?php
	echo "<p> test</p></br>";
$i=rand(14,17);
$database = "ECEEbay";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found) 
{
$sql = "SELECT * FROM Items WHERE Ref='$i'";
$result = mysqli_query($db_handle, $sql);
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
$img=$row['Images'];
$nom=$row['Nom'];
$cate=$row['Categorie'];
$typeV=$row['TypedeVente'];
$prix=$row['Prix'];
echo "<img src=".$img."></br>";
echo $nom . "</br>";
echo $cate . "</br>";
echo $typeV ."</br>";
echo $prix."</br>";
echo "<p> test</p>";
//echo mysql_result($result);
}
?>
</div>
<div class="col-lg-1">
<?php
	echo "<p> test</p></br>";
$i=rand(14,17);
$database = "ECEEbay";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found) 
{
$sql = "SELECT * FROM Items WHERE Ref='$i'";
$result = mysqli_query($db_handle, $sql);
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
$img=$row['Images'];
$nom=$row['Nom'];
$cate=$row['Categorie'];
$typeV=$row['TypedeVente'];
$prix=$row['Prix'];
echo "<img src=".$img."></br>";
echo $nom . "</br>";
echo $cate . "</br>";
echo $typeV ."</br>";
echo $prix."</br>";
echo "<p> test</p>";
//echo mysql_result($result);
}
?>
</div>
</div>

<div class="row">
<div class="col-lg-1">
<?php
	echo "<p> test</p></br>";
$i=rand(14,17);
$database = "ECEEbay";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found) 
{
$sql = "SELECT * FROM Items WHERE Ref='$i'";
$result = mysqli_query($db_handle, $sql);
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
$img=$row['Images'];
$nom=$row['Nom'];
$cate=$row['Categorie'];
$typeV=$row['TypedeVente'];
$prix=$row['Prix'];
echo "<img src=".$img."></br>";
echo $nom . "</br>";
echo $cate . "</br>";
echo $typeV ."</br>";
echo $prix."</br>";
echo "<p> test</p>";
//echo mysql_result($result);
}
?>
</div>

<div class="col-lg-1">
<?php
	echo "<p> test</p></br>";
$i=rand(14,17);
$database = "ECEEbay";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found) 
{
$sql = "SELECT * FROM Items WHERE Ref='$i'";
$result = mysqli_query($db_handle, $sql);
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
$img=$row['Images'];
$nom=$row['Nom'];
$cate=$row['Categorie'];
$typeV=$row['TypedeVente'];
$prix=$row['Prix'];
echo "<img src=".$img."></br>";
echo $nom . "</br>";
echo $cate . "</br>";
echo $typeV ."</br>";
echo $prix."</br>";
echo "<p> test</p>";
//echo mysql_result($result);
}
?>
</div>

<div class="col-lg-1">
<?php
	echo "<p> test</p></br>";
$i=rand(14,17);
$database = "ECEEbay";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found) 
{
$sql = "SELECT * FROM Items WHERE Ref='$i'";
$result = mysqli_query($db_handle, $sql);
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
$img=$row['Images'];
$nom=$row['Nom'];
$cate=$row['Categorie'];
$typeV=$row['TypedeVente'];
$prix=$row['Prix'];
echo "<img src=".$img."></br>";
echo $nom . "</br>";
echo $cate . "</br>";
echo $typeV ."</br>";
echo $prix."</br>";
echo "<p> test</p>";
//echo mysql_result($result);
}
?>
</div>
</div>





<footer class="page-footer">
			 	<div class="container">
					 <div class="row">
						 <div class="col-lg-8 col-md-8 col-sm-12">
							 <h6 class="text-uppercase font-weight-bold">Information additionnelle</h6>
							 
						 </div>
						 
						 <div class="col-lg-4 col-md-4 col-sm-12">
							 <h6 class="text-uppercase font-weight-bold">Contact</h6>
							 <p>
							 37, quai de Grenelle, 75015 Paris, France <br>
							 info@webDynamique.ece.fr <br>
							 +33 01 02 03 04 05 <br>
							 +33 01 03 02 05 04
							 </p>
						 </div>
					 </div>
				</div>
			 <div class="footer-copyright text-center">&copy; 2020 Copyright | Droit d'auteur: ProjetVG-PC-NT</div>
		</footer>
</body>

</html>