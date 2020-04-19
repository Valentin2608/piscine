<?php
	session_start();
	$ref =$_GET['ref'];
	$ida=$_GET['ida'];
	//$ida=$_SESSION['ID'];
	
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);

    
    
    $sql="SELECT * FROM `Panier` WHERE `Ref`='$ref' AND `IDAcheteur`='$ida'";
    $resultat=mysqli_query($db_handle, $sql);
        if(mysqli_num_rows($resultat) == 0)
        { 
        	$sql="INSERT INTO `Panier`(`IDAcheteur`, `Ref`) VALUES ('$ida','$ref')";
        	mysqli_query($db_handle, $sql);
        }
    
    echo"8642<br>";
    mysqli_close($db_handle);    
    header('Location:voirpanier.php');

?>