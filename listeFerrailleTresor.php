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
<title>Liste des Ferrailles et Trésors</title>

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
				 
				 <div class="col-lg-1.1">
					 <li class="nav-item"><a class="nav-link" href="index.php" style="color:white;">Accueil</a></li>
				</div>
				<div class="col-lg-1.1">
					 <li class="nav-item">
					 <div class="dropdown">
						<p data-toggle="dropdown" style="color:white; margin-top:7px; margin-left:5px;">Catégorie</p>
						<div class="dropdown-menu">
						<a class="nav-link" href="listeFerrailleTresor.php">
							<div class="dropdown-item">
							Ferraille ou Trésor
							</div></a>
							<a class="nav-link" href="listeBonMusee.php">
							<div class="dropdown-item">
							Bon pour le musée
							</div></a>
							<a class="nav-link" href="listeAccessoireVIP.php">
							<div class="dropdown-item">
							Accessoire VIP
							</div></a>
						</div>
					</div>
					</li>
				</div>
				<div class="col-lg-1">
					 <li class="nav-item">
					 <div class="dropdown">
						<p data-toggle="dropdown" style="color:white; margin-top:7px; margin-left:5px;">Achat</p>
						<div class="dropdown-menu">
						<a class="nav-link" href="Enchere.php">
							<div class="dropdown-item">
							Enchère
							</div></a>
							<a class="nav-link" href="listeAchatImmediat.php">
							<div class="dropdown-item">
							Achat immédiat
							</div></a>
							<a class="nav-link" href="listeMeilleureOffre.php">
							<div class="dropdown-item">
							Meilleure offre
							</div></a>
						</div>
					</div>
					</li>
				</div>
				<div class="col-lg-1">
				<?php
					if(empty($_SESSION['ID']))
					{
					 echo '<li class="nav-item"><a class="nav-link" href="connexionCompteVendeur.html"style="color:white;">Vendre</a></li>';
					}
					if(($_SESSION['type'])=='2')
					{
						echo '<li class="nav-item"><a class="nav-link" href="vendre.html"style="color:white;">Vendre</a></li>';
					}
				?>
				</div>
				<div class="col-lg-1">
				<?php
					if(empty($_SESSION['ID']))
					{
					 echo '<li class="nav-item"><a class="nav-link" href="connexionCompteAcheteur.html"style="color:white;">Compte</a></li>';
					}
					if(($_SESSION['type'])=='1')
					{
						echo '<li class="nav-item"><a class="nav-link" href="CompteAcheteur.html"style="color:white;">Compte</a></li>';
					}
					if(($_SESSION['type'])=='2')
					{
						echo '<li class="nav-item"><a class="nav-link" href="CompteVendeur.html"style="color:white;">Compte</a></li>';
					}
				?>
				</div>
				<div class="col-lg-1">
				<?php
					if(empty($_SESSION['ID']))
					{
					 echo '<li class="nav-item"><a class="nav-link" href="connexionCompteAcheteur.html"style="color:white;">Panier</a></li>';
					}
				?>
				</div>
				<div class="col-lg-1">
				<?php
					if(empty($_SESSION['ID']))
					{
					 echo '<li class="nav-item"><a class="nav-link" href="connexionCompteAdmin.html"style="color:white;">Admin</a></li>';
					}
					if(($_SESSION['type'])=='3')
					{
						echo '<li class="nav-item"><a class="nav-link" href="compteAdmin.html"style="color:white;">Admin</a></li>';
					}
				?>
				</div>
				<div class="col-lg-3"></div>
				<div class="col-lg-2">
					 <form class="navbar-form navbar-right inline-form">
						<div class="form-group">
						<input type="search" class="input-sm form-control" placeholder="Recherche">
						<button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
						</div>
					</form>
				</div>
				
				<div class="col-lg-2">
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


<div class="liste">
<div class= "container-fluid">
 <h1 style="text-align:center">Galerie des Ferrailles ou Trésors</h1>
 <?php
$database = "EbayECE";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$sql="SELECT * FROM `Items` WHERE `Categorie`='Ferraille'";
$resultat=mysqli_query($db_handle,$sql);
$size="150";
$name="button";
$type="image";
$classe1="card-img-top";
$classe2="card-body";
echo'<div class="row" style="margin-left:10%; margin-right:10%; margin-top:20px;">';
while($row=mysqli_fetch_array($resultat, MYSQLI_ASSOC)) 
{
	echo "<div class='col-lg-4 col-md-6 mb-4 '>";
	echo"<div class='card h-100'>";
$ref=$row['Ref'];
$prix=$row['Prix'];   
$nom=$row['Nom'];
$description=$row['Description']; 
$img=$row['Images'];
$typeVente=$row['TypedeVente'];

if($typeVente=="4")
{
echo '<form action="AchatNego.php?ref='.$ref.'" method="post">
<input type='.$type.' class='.$classe1.' name='.$name.' value='.$ref.' src='.$img.' widht='.$size.' height='.$size.'>
<div class='.$classe2.'>
<h4 class="card-title">'.$nom.'</h4>
<h5> '.$prix.' $</h5>
<p class="card-text">Description :'.$description.'</p> 
</div>
</div>
</div>
</form>';
}

if($typeVente=="3")
{
$sql2="SELECT * FROM `encheres` WHERE `Ref`='$ref'";    
$resultat2=mysqli_query($db_handle,$sql2); 
$row2=mysqli_fetch_array($resultat2, MYSQLI_ASSOC); 
$ref=$row2['Ref'];
$date= $row2['dfin']." à ".$row2['hfin'];
$prix=$row2['Prixactuel'];
echo '<form action="encherir1.php?ref='.$ref.'" method="post">
<input type='.$type.' class='.$classe1.' name='.$name.' value='.$ref.' src='.$img.' widht='.$size.' height='.$size.'>
<div class='.$classe2.'>
<h4 class="card-title">'.$nom.'</h4>
<h5> '.$prix.' $</h5>
<p class="card-text">Date limite, jusqu au :</br> '.$date.'</br>Description :'.$description.'</p> 
</div>
</div>
</div>
</form>';
}

if($typeVente=="2")
{
echo '<form action="achatImm.php?ref='.$ref.'" method="post">
<input type='.$type.' class='.$classe1.' name='.$name.' value='.$ref.' src='.$img.' widht='.$size.' height='.$size.'>
<div class='.$classe2.'>
<h4 class="card-title">'.$nom.'</h4>
<h5> '.$prix.' $</h5>
<p class="card-text">Description :'.$description.'</p> 
</div>
</div>
</div>
</form>';
}
if($typeVente=="1")
{
echo '<form action="negociation.php?ref='.$ref.'" method="post">
<input type='.$type.' class='.$classe1.' name='.$name.' value='.$ref.' src='.$img.' widht='.$size.' height='.$size.'>
<div class='.$classe2.'>
<h4 class="card-title">'.$nom.'</h4>
<h5> '.$prix.' $</h5>
<p class="card-text">Description :'.$description.'</p> 
</div>
</div>
</div>
</form>';
}
}
echo "</div>";
?>
</div>

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