<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
<title>Mon compte Vendeur</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	
  <!--Liens pour le template Boostrap-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!--Css pour le template Boostrap-->
  <link href="sb-admin-2.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">

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
					
					if(($_SESSION['type'])=='1')
					{
						echo'<div class="col-lg-3">';
						echo '<li class="nav-item"><a class="nav-link" href="CompteAcheteur.html"style="color:white;">Mon Compte</a></li>';
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

</div>
 <div id="content">
<div class="container-fluid">
<!-- Page Heading -->
			</br>
			</br>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Mon Espace Vendeur</h1>
          </div>

          <div class="row">
			 <div class="col-lg-6">
			  <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Informations Personelles</h6>
                </div>
                <div class="card-body">
                  Nom : <?php echo $_SESSION['Nom'];?>
                </div>
				<div class="card-body">
                  Prenom :  <?php echo $_SESSION['Prenom'];?>
                </div>
				<div class="card-body">
                  Email :  <?php echo $_SESSION['Email'];?>
                </div>
				<div class="card-body">
                 Adresse  :  <?php echo $_SESSION['Adresse'];?>
                </div>
				<div class="card-body">
                  Nombre d'objet en vente :  <?php echo $_SESSION['NombreO'];?>
                </div>
              </div>
			  </div>
			  <div class="col-lg-2">
			  </div>
			  <div class="col-lg-2">
			  <div class="card shadow mb-4">
			  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">Photo de Profil</h6>
				   <div class="card-body" align="center">
				   <img class="img-thumbnail" src="Image/Profil.jpg" alt="Votre Photo de Profil" height="200px" width="206px" />
					</div>
			  </div>
			    </div>
				</div>
				<div class="col-lg-2">
				</div>
			
			
			</div>
			<div class="row">
				<div class="col-lg-2">
					<a href="ModifierinfoA.php" class="btn btn-info btn-icon-split btn-lg">
                    <span class="icon text-white-55">
                      <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">Modifier mes Informations</span>
                  </a>
				</div>
				<div class="col-lg-2">
				</div>
				<div class="col-lg-2">
				<a href="VendreObjet.php" class="btn btn-success btn-icon-split btn-lg">
                    <span class="icon text-white-50">
                      <i class="fa fa-shopping-cart"></i>
                    </span>
                    <span class="text">    Vendre un Objet    </span>	
				</a>
				
				</div>
			
			
			</div>
			
</div>

<footer class="page-footer" style="margin-top:50px">

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