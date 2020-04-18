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

<title>Vendre</title>

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

<script type="text/javascript">
function choix() {
    if(document.getElementById('enchere').checked)
    {
	document.getElementById('dateNego').style.display = "block";
    document.getElementById('nego').checked = false;
    document.getElementById('achatImm').checked = false;
	
    }
     if(document.getElementById('achatImm').checked)
    {
	document.getElementById('dateNego').style.display = "none";
    document.getElementById('enchere').checked = false;
    }
    if(document.getElementById('achatImm').checked && document.getElementById('nego').checked)
    {
	document.getElementById('dateNego').style.display = "none";
    document.getElementById('achatImm').value = 4;
    document.getElementById('nego').value = 4;
    }
    else
    {
    document.getElementById('achatImm').value = 2;
    document.getElementById('nego').value = 1;
    }
}
</script>

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


<div class="card shadow mb-4" style="margin-top:20px; margin-right:20px; margin-left:20px;">
<h1 style="text-align:center; margin-top:10px;"> Vendez vos biens aux meilleurs prix </h1><br></br>
<h3 style="text-align:center;"> Séléctionner une catégorie </h3><br>
<form action="vendre.php" method="post" enctype="multipart/form-data">
<div class="row">

<div class="col-lg" style="text-align:center">
<input type="radio" id="Ferraille ou Trésor" name="categorie" value="Ferraille ou Tresor" style="margin-left:5px;">Ferraille ou Trésor</div>

<div class="col-lg"style="text-align:center">
<input type="radio" id="Bon pour le musée" name="categorie" value="Bon pour le musee">Bon pour le musée</div>

<div class="col-lg"style="text-align:center">
<input type="radio" id="Accessoire VIP" name="categorie" value="Accessoire VIP">Accessoire VIP
</div></div><br></br><br></br>


<div class="row">
<div class="col-lg"style="text-align:center">
<p style="margin-left:5px;"> Nom du bien mis en vente :</p></div>
<div class="col-lg">
<p> Description du bien mis en vente :</p></div>
<div class="col-lg"style="text-align:center">
<p> Type de ventes souhaité :</p></div>
</div>


<div class="row">
<div class="col-lg-4"style="text-align:center">
<input type="text"  name="nom" style="margin-left:5px;"></div>
<div class="col-lg-4">
<textarea name="description" rows="5" cols="40" maxlength="255"></textarea></div>
<div class="col-lg-4" >
<table>
    <tr>
    <td><input type="checkbox" id="enchere" name="typeVente" value=3 onclick="choix();">Enchère</td>
    </tr>
	<tr>
	<td><div id="dateNego" style="display:none;"><label for="start">Start date:</label>

<input type="date" id="start" name="date-start"
       value="2020-04-25"
       min="2020-04-25" max="2030-12-31"></br>
	   
	   <label for="start">End date:</label>

<input type="date" id="end" name="date-end"
       value="2020-04-25"
       min='.$date.' max="2030-12-31"></br>
	 </br></div></td>
	</tr>
    <tr>
       <td><input type="checkbox" id="achatImm" name="typeVente" value=2 onclick="choix();">Achat immédiat</td>
    </tr>
    <tr>
      <td><input type="checkbox" id="nego" name="typeVente" value=1 onclick="choix();" >Négocier</td>
    </tr>
</table>
</div>
</div><br></br>

<div class="row">
<div class="col-lg-4"style="text-align:center">
<p style="margin-left:5px;"> Ajouter des photos ou des vidéos : </p></div>
<div class="col-lg-4">
<p> Prix initial : </p></div>
</div>
<div class="row">
<div class="col-lg-4"style="text-align:center"	>
<p> <div class="parent-div">
      <button class="btn-upload" style="margin-left:5px;">Choisir le fichier</button>
      <input type="file" name="photo">
    </div> </p></div>
<div class="col-lg-4">
<p> <input type="number"  name="prix">€</p></div>
<div class="col-lg-4"style="text-align:center">
<input type="submit" name="soumettre" value="Mettre en vente" style=" background-color: #007BFF;
    Color:white;
    font-weight: bold;
    padding: 10px 40px;
    border-radius: 3px;
    cursor: pointer; 
    box-shadow: 0 8px 16px 0 grey;
    text-decoration: none;">
</div>
</div>
</form>
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