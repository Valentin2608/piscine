<?php
	session_start();
	//$ida=$_SESSION['ID'];
	
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
	$ref=$_GET['ref'];
    
    //on supprime l'item qui vient d'être acheter 
    $sql="DELETE FROM `Items` WHERE `Ref`='$ref'";
    mysqli_query($db_handle, $sql);
	
    mysqli_close($db_handle); 
    header('Location:index.php');
	
?>