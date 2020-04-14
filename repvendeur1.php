<?php 
 $database = "EbayECE";
 $db_handle = mysqli_connect('localhost', 'root', 'root');
 $db_found = mysqli_select_db($db_handle, $database);
 $sql="SELECT * FROM `Nego` WHERE `Ref`=1";
 $resultat=mysqli_query($db_handle,$sql);
 $row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
 $prix=$row['Proposition'];
 echo "<h1> On vous propose ".$prix."€</h1>";
 ?>
 <!DOCTYPE html>
<html>
<head>
<title>Formulaire : réponses vendeurs</title>
<meta charset="utf-8">

 
</head>
<body>

<form action="repvendeur.php" method="post">
<table>
<tr>
<td>Accepter:</td>
<td><input type="number"  name="rep"></td>
</tr>
</tr>
<tr>
<td> contre offre :</td>
<td><input type="number"  name="co"></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="button1" value="Soumettre">
</td>
</tr>
</table>
</form>
</body>
</html>