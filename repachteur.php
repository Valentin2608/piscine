<?php

	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);
	$rep = isset($_POST["rep"])? $_POST["rep"] : "";
	if($rep==1)
	{
		
		$sql="UPDATE `Nego` SET `Accepter`=1 WHERE `Ref`=1";
		mysqli_query($db_handle,$sql);
	}
	if($rep==0){
	$prix = isset($_POST["prix"])? $_POST["prix"] : "";
    else
    {
    $sql="SELECT * FROM `Nego` WHERE `Ref`=1";
 	$resultat=mysqli_query($db_handle,$sql);
 	$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
	$compte=$row['Compteur']+1;
	if($compte<6)
    {
    	$sql="UPDATE `Nego` SET `Compteur`='$compte',`Proposition`='$prix' WHERE `Ref`=1";
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
    }}
    
    echo"8642<br>";
    mysqli_close($db_handle); 

?>
