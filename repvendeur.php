<?php
	$database = "EbayECE";
    	$db_handle = mysqli_connect('localhost', 'root', '');
    	$db_found = mysqli_select_db($db_handle, $database);
		
	$ref=$_GET['ref'];
	$ida=$_GET['ida'];
	$rep= isset($_POST["rep"])? $_POST["rep"] : "";
	if($rep==1)
	{
		$sql="SELECT * FROM `Nego` WHERE `Ref`='$ref'AND `IDAcheteur`='$ida'";
 		$resultat=mysqli_query($db_handle,$sql);
 		$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
 		$prop=$row['Proposition'];
		$sql="UPDATE `Nego` SET Accepter='$rep' ContreProposition='$prop' WHERE `Ref`='$ref' AND `IDAcheteur`='$ida'";
		mysqli_query($db_handle,$sql);	
	}
	else{
	$co = isset($_POST["co"])? $_POST["co"] : "";
    $sql="SELECT * FROM `Nego` WHERE `Ref`='$ref'AND `IDAcheteur`='$ida'";
 	$resultat=mysqli_query($db_handle,$sql);
 	$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
	$compte=$row['Compteur']+1;
	if($compte<10)
    {$sql="UPDATE `Nego` SET `Compteur`='$compte',`ContreProposition`='$co' WHERE `Ref`='$ref' AND `IDAcheteur`='$ida'";
        if(mysqli_query($db_handle, $sql))
        { 
        	echo "Record was updated successfully."; 
        }
        else 
        {
            echo"1742<br>";
            echo mysqli_error($db_handle); 
        }
    }}
    echo"8642<br>";
    mysqli_close($db_handle); 
    header('Location:repvendeur1.php?ref='.$ref);

?>
