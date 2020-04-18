<?php
	session_start();
	$ida =$_GET['ida'];
	//$ida=$_SESSION['ID'];
	
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);

    
    
    $sql="SELECT * FROM `Payement` WHERE `IDAcheteur`='$ida'";
    $resultat=mysqli_query($db_handle, $sql);
        if(mysqli_num_rows($resultat) == 0)
        { 
        	header('Location:paiment1.php?id='.$ida.'&from="voirpanier.php"'); 
        }
        else 
        {
            header('Location:comfirmerpanier.php?id='.$ida); 
        }
    
   
    mysqli_close($db_handle); 
    

?>