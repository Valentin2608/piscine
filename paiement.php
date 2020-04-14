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

//afficher information sur le paiement
echo "<br>Le Numéro de carte bleu  est: " . $numeroC;
echo "<br>A payer par: " . $card;
echo "<br>Le Nom du client est: " . $nomC;
echo "<br>La date d'expiration est :  " . $dateE;
echo "<br>Le crypto est : " . $crypto;

}
else
{
 echo "Erreur : $erreur";
 }
}
?>