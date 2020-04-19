<?php

if (isset($_POST["button1"])) {
$ida =$_GET['ida'];
$from=$_GET['from'];
$card = isset($_POST["creditCard"])? $_POST["creditCard"] :"";
$numeroC = isset($_POST["numeroC"])? $_POST["numeroC"] : "";
$nomC= isset($_POST["nomC"])? $_POST["nomC"] :"";
$dateE = isset($_POST["dateE"])? $_POST["dateE"] : "";
$crypto = isset($_POST["crypto"])? $_POST["crypto"] : "";
$erreur = "";


 if ($numeroC== "") 
 {
 $erreur .= "numeroC est vide. <br>"; }
  if ($card== "") 
 {
 $erreur .= "card est vide. <br>"; }
 
 if ($nomC == "") {
 $erreur .= "nomC est vide. <br>"; }
 if ($dateE== "") {
 $erreur .= "dateE est vide. <br>"; }
 if ($crypto == "") {
 $erreur .= "crypto est vide. <br>"; }

echo $from; 
 if ($erreur == "") 
 {
$database = "EbayECE";
	$db_handle = mysqli_connect('localhost', 'root', 'root');
	$db_found = mysqli_select_db($db_handle, $database);
		$sql="INSERT INTO `Payement`( `IDAcheteur`,`Numero`, `Typecart`, `Nom`, `Date`, `Crypto`) VALUES ('$ida','$numeroC','$card','$nomC','$dateE','$crypto')";
		mysqli_query($db_handle, $sql);
		if($from==1)
    	{header('Location:voirpanier.php');}
		if($from==2)
            {
            $ref=$_GET['ref'];
            header('Location:comfirmernego.php?ida='.$ida.'&ref='.$ref);
            }
            if($from==3)
            {
            $ref=$_GET['ref'];
            header('Location:comfirmerenchere.php?ref='.$ref);
            }
	mysqli_close($db_handle);     
	
	

}
else
{
 echo "Erreur : $erreur";
 }
}
?>