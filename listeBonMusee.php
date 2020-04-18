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
<title>Listes des objets Bon pour le musée</title>

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
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Ebay ECE</a><button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
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
						</li>
						<?php
					if(empty($_SESSION['ID']))
					{
					 echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="connexionCompteVendeur.html">Vendre</a></li>';
					}
					if(($_SESSION['type'])=='2')
					{
						echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="vendre.html">Vendre</a></li>';
					}
						?>
				<?php
					if(empty($_SESSION['ID']))
					{
					 echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="connexionCompteAcheteur.html">Compte</a></li>';
					}
					if(($_SESSION['type'])=='1')
					{
						echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="compteAcheteur.html">Compte</a></li>';
					}
					if(($_SESSION['type'])=='2')
					{
						echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="compteVendeur.html">Compte</a></li>';
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
				<li class="nav-item mx-0 mx-lg-1"><form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" style="background-color:#466482">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form></li>
				</ul>
                </div>
            </div>
        </nav>
<br>
</div>


<div class="liste">
<div class= "container-fluid">
 <h1 style="text-align:center">Galerie des objets bon pour le musée</h1>
  <?php
$database = "EbayECE";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$sql="SELECT * FROM `Items` WHERE `Categorie`='musee'";
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