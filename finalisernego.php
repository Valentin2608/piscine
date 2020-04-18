<?php
	session_start();
	//$ida=$_SESSION['ID'];
	
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);
	$ref=$_GET['ref'];
    
    
    $sql="DELETE FROM `Items` WHERE `Ref`='$ref'";
    mysqli_query($db_handle, $sql);
        
    mysqli_close($db_handle); 
    header('Location:index.php');

?>