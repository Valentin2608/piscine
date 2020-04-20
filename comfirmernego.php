<?php
	session_start();
	$ida =$_GET['ida'];
	//$ida=$_SESSION['ID'];
	
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
	$ref=$_GET['ref'];
    
    $sql="UPDATE `Nego` SET `Accepter`=1 WHERE `IDAcheteur`='$ida' AND `Ref`='$ref'";
    mysqli_query($db_handle, $sql);
	
    mysqli_close($db_handle); 
    header('Location:index.php');
	
?>