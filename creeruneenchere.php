<?php

$ddebut = isset($_POST["ddebut"])? $_POST["ddebut"] : "";
$hdebut = isset($_POST["hdebut"])? $_POST["hdebut"] : "";
 $dfin = isset($_POST["dfin"])? $_POST["dfin"] : "";
 $hfin = isset($_POST["hfin"])? $_POST["hfin"] : "";
 $ref = isset($_POST["ref"])? $_POST["ref"] : "";
$prixmin = isset($_POST["prixmin"])? $_POST["prixmin"] : "";
$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);
    echo "hgjgg";
    if ($_POST["button1"]) {

        echo"1642<br>";
        $sql="INSERT INTO Encheres( IDvendeur, ddebut, dfin, IDitem, Prixmin, Prixactuel, hdebut, hfin) VALUES (2,'$ddebut','$dfin','$ref','$prixmin',0,'$hdebut','$hfin')";
        if(mysqli_query($db_handle, $sql)){ 
        echo "Record was updated successfully."; 
        }
        else {
            echo"1742<br>";
           echo mysqli_error($db_handle); }
    }
    echo"8642<br>";
    mysqli_close($db_handle); 

?>