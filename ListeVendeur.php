<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
<title>Liste de vendeurs</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js%22%3E"</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js%22%3E"</script>
    <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
  <!--Liens pour le template Boostrap-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!--Css pour le template Boostrap-->
  


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
							Ferraille ou Trésor
							</div>
							<div class="dropdown-item" href="listeBonMusee.php">
							Bon pour le musée
							</div>
							<div class="dropdown-item" href="listeAccessoireVIP.php">
							Accessoire VIP
							</div>
							<div class="dropdown-item" href="categorie.php">
							Tous
							</div>
						</div>
					</div>
						</li>
                        <li class="nav-item mx-0 mx-lg-1">
						<div class="dropdown"><a class="nav-link collapsed py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-toggle="dropdown">Achat</a>
						<div class="dropdown-menu">
							<div class="dropdown-item" href="Enchere.php">
							Encheres
							</div>
							<div class="dropdown-item" href="listeAchatImmediat.php">
							Achat immédiat
							</div>
							<div class="dropdown-item" href="listemeilleureOffre.php">
							Meilleure offre
							</div>
							<div class="dropdown-item" href="achat.php">
							Tous
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
</div>
   <div class="container-fluid" style="margin-top: 50px;">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Galerie des vendeurs</h1>
          <p class="mb-4">Vous pouvez ici supprimer les vendeurs que vous voulez ! </p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Table de Vendeurs</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive" >
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>	
					  <th>Nom</th>
                      <th>Prénom</th>
                      <th>Email</th>
                      <th>Adresse</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Email</th>
                      <th>Adresse</th>

                    </tr>
                  </tfoot>
				  <tbody>
 <?php

$idv=1;
 $database = "EbayECE";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$sql="SELECT * FROM `Vendeur`";
$resultat=mysqli_query($db_handle,$sql);
$size="150";
$type="image";
$name="button";
$classe1="img-thumbnail";
$classe2="caption";
while ($row=mysqli_fetch_array($resultat, MYSQLI_ASSOC))  
{
$admin=$row['Admin'];
if($admin==0)
{
$id=$row['IDVendeur'];
$nom=$row['Nom'];
$prenom=$row['Prenom']; 
$email=$row['Email'];
$adresse=$row['Adresse'];
echo '<form action="suprimervendeur.php?id='.$id.'" method="post">
<tr><td>'.$nom.'</td>
<td><p>'.$prenom.'</p></td>
<td><p>'.$email.'</p></td>
<td><p>'.$adresse.'</p></td>
<td align="center"><input type="submit" name="button1" value="Supprimer"class="btn btn-warning btn-icon-split  btn-lg"></td></tr>
</form></br>';
}}
?>
				</tbody>
                </table>
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
 <!-- Page level plugins -->
  <script src="jquery.dataTables.min.js"></script>
  <script src="dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="datatables-demo.js"></script>
</body>
</html>