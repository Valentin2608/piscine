<?php
	session_start();
	$ida =$_GET['ida'];
	//$ida=$_SESSION['ID'];
	
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
	
    
    
    $sql="SELECT * FROM `Panier` WHERE `IDAcheteur`='$ida'";
    $resultat=mysqli_query($db_handle,$sql); 
    while ($row=mysqli_fetch_array($resultat, MYSQLI_ASSOC))  
    {
    	$ref=$row['Ref'];
    	$sql2="DELETE FROM `Items` WHERE `Ref`='$ref'";
    	mysqli_query($db_handle, $sql2);
    	
	}
	
    echo"8642<br>";
    mysqli_close($db_handle);    
    header('Location:index.php');
	
?>