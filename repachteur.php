<?php

	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);
	$ref = $_GET['ref'];
	$from = $_GET['from'];
	$ida=5;
	$rep = isset($_POST["rep"])? $_POST["rep"] : "";
	if($rep==1)
	{
	
	header('Location:verife.php?ida='.$ida.'&from='.$from.'&ref='.$ref);
	}
	else
	{
	$prix = isset($_POST["prix"])? $_POST["prix"] : "";
    
    $sql="SELECT * FROM `Nego` WHERE `Ref`='$ref'";
 	$resultat=mysqli_query($db_handle,$sql);
 	$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
	$compte=$row['Compteur']+1;
	if($compte<10)
    {
    	$sql="UPDATE `Nego` SET `Compteur`='$compte',`Proposition`='$prix' WHERE `Ref`='$ref' AND IDAcheteur='$ida'";     
        if(mysqli_query($db_handle, $sql))
        { 
        	echo "Record was updated successfully."; 
        }
        else 
        {
            echo"1742<br>";
            echo mysqli_error($db_handle); 
        }
    }
    header('Location:index.php');
    }
    
    
    echo"8642<br>";
    mysqli_close($db_handle); 
    

?>
