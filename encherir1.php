<?php
session_start();

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
					 <li class="nav-item">
					 <div class="dropdown">
						<p data-toggle="dropdown" class="nav-link" style="color:white;">Achat</p>
						<div class="dropdown-menu">
							<div class="dropdown-item">
							<a class="nav-link" href="encherir.php"> Enchère</a>
							</div>
							<div class="dropdown-item">
							Achat immédiat
							</div>
							<div class="dropdown-item">
							Meilleure offre
							</div>
						</div>
					</div>
					 </li>
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
<div class="creer2">
<?php
$ref =$_GET['ref'];
echo '<form action="encherir.php?ref='.$ref.'" method="post">';

$database = "EbayECE";
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);
$sql="SELECT * FROM Encheres WHERE Ref='$ref'";  
$resultat=mysqli_query($db_handle,$sql);
$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
$nom=$row['Nom'];
echo'<h1>Enchérir sur: '.$nom.'</h1>
<table> 
<tr>
<td>    Enchère de départ:</td>
<td><input type="number"  name="dep">€</td>
</tr>
<tr>
<td> Enchère max:</td>
<td><input type="number"  name="max">€</td>
</tr> 
<tr> 
<td colspan="2" align="center">';
echo'<input type="submit" name="button1" value="soumettre">';
?>
</td>
</tr>
</table>
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