<?php

if (isset($_POST["button1"])) {

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


 if ($erreur == "") 
 {
$database = "EbayECE";
	$db_handle = mysqli_connect('localhost', 'root', 'root');
	$db_found = mysqli_select_db($db_handle, $database);
		$sql="INSERT INTO `Payement`( `Numero`, `Typecart`, `Nom`, `Date`, `Crypto`) VALUES ('$numeroC','$card','$nomC','$dateE','$crypto')";
		if(mysqli_query($db_handle, $sql)){ 
    	echo "Record was updated successfully."; 
		} else 
		{ 
    		echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($db_handle); 
		}  
	mysqli_close($link); 
	

}
else
{
 echo "Erreur : $erreur";
 }
}
?>