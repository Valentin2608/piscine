<?php

?>
<!DOCTYPE html>
<html>
<head>
<title>Vendre</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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
					 <li class="nav-item"><a class="nav-link" href="#" style="color:white;">Accueil</a></li>
				</div>
				<div class="col-lg-1.1">
					 <li class="nav-item"><a class="nav-link" href="#"style="color:white;">
					 <div class="dropdown">
						<p data-toggle="dropdown">Catégorie</p>
						<div class="dropdown-menu">
							<div class="dropdown-item">
							Ferraille ou Trésor
							</div>
							<div class="dropdown-item">
							Bon pour le musée
							</div>
							<div class="dropdown-item">
							Accessoire VIP
							</div>
						</div>
					</div>
					</a></li>
				</div>
				<div class="col-lg-1">
					 <li class="nav-item"><a class="nav-link" href="#"style="color:white;">
					 <div class="dropdown">
						<p data-toggle="dropdown">Achat</p>
						<div class="dropdown-menu">
							<div class="dropdown-item">
							Enchère
							</div>
							<div class="dropdown-item">
							Achat immédiat
							</div>
							<div class="dropdown-item">
							Meilleure offre
							</div>
						</div>
					</div>
					 </a></li>
				</div>
				<div class="col-lg-1">
					 <li class="nav-item"><a class="nav-link" href="#"style="color:white;">Vendre</a></li>
				</div>
				<div class="col-lg-1">
					 <li class="nav-item"><a class="nav-link" href="#"style="color:white;">Compte</a></li>
				</div>
				<div class="col-lg-1">
					 <li class="nav-item"><a class="nav-link" href="#"style="color:white;">Panier</a></li>
				</div>
				<div class="col-lg-1">
					 <li class="nav-item"><a class="nav-link" href="#"style="color:white;">Admin</a></li>
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
				 </ul>
			 </div>
</nav>
</div>
<br>
</div>


<div class="vente">
<h1 style="text-align:center;"> Vendez vos biens aux meilleurs prix </h1><br></br>
<h3 style="text-align:center;"> Séléctionner une catégorie </h3><br>
<form action="vendreitem.php" method="post" enctype="multipart/form-data">
<div class="row">

<div class="col-lg">
<input type="radio" id="Ferraille ou Trésor" name="categorie" value="Ferraille ou Tresor">Ferraille ou Trésor</div>

<div class="col-lg">
<input type="radio" id="Bon pour le musée" name="categorie" value="Bon pour le musee">Bon pour le musée</div>

<div class="col-lg">
<input type="radio" id="Accessoire VIP" name="categorie" value="Accessoire VIP">Accessoire VIP
</div></div><br></br><br></br>


<div class="row">
<div class="col-lg">
<p> Nom du bien mis en vente :</p></div>
<div class="col-lg">
<p> Description du bien mis en vente :</p></div>
<div class="col-lg">
<p> Type de vente souhaité :</p></div>
</div>


<div class="row">
<div class="col-lg-4">
<textarea name="nom" ></textarea></div>
<div class="col-lg-4">
<textarea name="description" rows="5" cols="40"></textarea></div>
<div class="col-lg-4">
<table>
	<tr>
		<td><input type="radio" name="typeVente" value="Enchere">Enchère</td>
	</tr>
	<tr>
		<td><input type="radio"  name="typeVente" value="Achat immediat">Achat immédiat</td>
	</tr>
	<tr>
		<td><input type="radio" name="typeVente" value="Negocier">Négocier</td>
	</tr>
</table>
</div>
</div><br></br>

<div class="row">
<div class="col-lg-4">
<p> Ajouter des photos ou des vidéos : </p></div>
<input type="file" name="photo">
<div class="col-lg-4">
<p> Prix initial : </p></div>
</div>

<div class="col-lg-4">
<p> <textarea name="prix" ></textarea>$</p></div>
<div class="col-lg-4">
<input type="submit" name="button1" value="Mettre en vente">
</div>
</div>
</form>
</div>
<div class="row">
<div class="col-lg-4">
<p> <div class="parent-div">
    
	  
	   
	    
   
        
            
    </div> </p></div>

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


