<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
<title>Panier</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styleIndex.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
</head>


<body style="background-color:#EDEDED">
<div class="global">
<div class="container-fluid"> 
<div class="row" style="height:80px; background-color:#007179; border: solid; border-color:#808080;">
	<div class="col-lg" ></div>
	<div class="col-lg" style="text-align:center" ><img src="logo.png" alt="" height="70px;"></div>
	<div class="col-lg" ></div>
</div>


<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.php">Ebay ECE</a><button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
					<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php">Accueil</a></li>
                        <li class="nav-item mx-0 mx-lg-1">
						<div class="dropdown"><a class="nav-link collapsed py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-toggle="dropdown">Catégorie</a>
						<div class="dropdown-menu">
							<div class="dropdown-item" href="listeFerrailleTresor.php">
							<a  href="listeFerrailleTresor.php">Ferraille ou Trésor</a>
							</div>
							<div class="dropdown-item">
							<a  href="listeBonMusee.php">Bon musée</a>
							</div>
							<div class="dropdown-item">
							<a  href="listeAccessoireVIP.php">Accessoire VIP</a>
							</div>
							<div class="dropdown-item" href="categorie.php">
							<a  href="categorie.php">Tous</a>
							</div>
						</div>
					</div>
						</li>
                        <li class="nav-item mx-0 mx-lg-1">
						<div class="dropdown"><a class="nav-link collapsed py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-toggle="dropdown">Achat</a>
						<div class="dropdown-menu">
							<div class="dropdown-item" >
							<a  href="Enchere.php">Enchères</a>
							</div>
							<div class="dropdown-item">
							<a  href="listeAchatImmediat.php">Achat immédiat</a>
							</div>
							<div class="dropdown-item">
							<a   href="listeMeilleureOffre.php">Meilleure offre</a>
							</div>
							<div class="dropdown-item">
							<a    href="achat.php">Tous</a>
							</div>
						</div>
					</div>
						</li>
						<?php
					if(empty($_SESSION['ID']))
					{
					 echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="connexionCompteVendeur.html">Vendre</a></li>';
					}
					if(($_SESSION['type'])=='2')
					{
						echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="vendre1.php">Vendre</a></li>';
					}
						?>
				<?php
					if(empty($_SESSION['ID']))
					{
					 echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="connexionCompteAcheteur.html">Compte</a></li>';
					}
					if(($_SESSION['type'])=='1')
					{
						echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="moncompte.php">Compte</a></li>';
					}
					if(($_SESSION['type'])=='2')
					{
						echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="monCompteVendeur.php">Compte</a></li>';
					}
				?>
				<?php
					if(empty($_SESSION['ID']))
					{
					 echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="connexionCompteAcheteur.html">Panier</a></li>';
					}
					if(($_SESSION['ID'])=='1')
					{
					 echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="voirPanier.php">Panier</a></li>';
					}
				?>
				<?php
					if(empty($_SESSION['ID']))
					{
					 echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="connexionCompteAdmin.html">Admin</a></li>';
					}
					if(($_SESSION['type'])=='3')
					{
						echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="compteAdmin.html">Admin</a></li>';
					}
					
				?>
				<li class="nav-item mx-0 mx-lg-1"><form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="recherche.php" method="post">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher" aria-label="Search" aria-describedby="basic-addon2" name="search">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" style="background-color:#466482" name="connect">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form></li>
		   <?php
					if(($_SESSION['ID'])!='0')
					{
					 echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="deconnexion.php">Deconnexion</a></li>';
					}
					
				?>
				</ul>
                </div>
            </div>
        </nav>
<br>
</div>

<div class= "container-fluid">
<div class="row">
<div class="col-lg-8">
<div class="card shadow mb-4">
<div class="card-header py-3" >
 <?php

$ida=$_SESSION['ID'];
$database = "EbayECE";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$sql="SELECT * FROM `Panier` WHERE `IDAcheteur`='$ida'";
$resultat=mysqli_query($db_handle,$sql);
$classe1="img-thumbnail";
$classe2="caption";
$prixtot=0;
echo "<h4 class='m-0 font-weight-bold text-primary'>Votre panier</br></h4></div>";
while ($row=mysqli_fetch_array($resultat, MYSQLI_ASSOC))  
{
$ref=$row['Ref'];
$sql="SELECT * FROM `Items` WHERE `Ref`='$ref'";
$resultat2=mysqli_query($db_handle,$sql);
while ($row2=mysqli_fetch_array($resultat2, MYSQLI_ASSOC))  
{
$prix=$row2['Prix'];
$prixtot=$prixtot+$prix;
$nom=$row2['Nom'];
$description=$row2['Description'];
$categorie=$row2['Categorie'];
$img=$row2['Images'];
echo '<form action="suprimerdupanier.php?ref='.$ref.'&ida='.$ida.'" method="post">
<table>
<tr>
<td><div class='.$classe1.'><img src="'.$img.'" widht="150" height="150">
<div class='.$classe2.'>
<p>Nom: '.$nom.'</br>Description :'.$description.'</br>Categorie :'.$categorie.'</br>Prix :'.$prix.'€</p>
</div> 
</div></td>
</tr><tr> 
<td colspan="2" align="center">
<input type="submit" name="button1" value="suprimer"></td></tr></table></form>';
}}
echo'<h3>Total: '.$prixtot.' €</h3>';
?>
</div>
</div>
<div class="col-lg-4">
<div class="card shadow mb-4" style="text-align:center;">
<div class="card-header py-3" >
<h4 class='m-0 font-weight-bold text-primary'>Passer à l'achat</br></h4></div>
<?php
$ida=$_SESSION['ID'];
$from=1;
$ref=0;
echo '<br><form action="verife.php?ida='.$ida.'&from='.$from.'$ref='.$ref.'" method="post" style="padding:1em;">';
?>
<input type="submit" name="button1" value="Valider votre Panier"></form>
</div>
</div>
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