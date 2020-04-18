<?php
	session_start();
	$ida =$_GET['ida'];
	//$ida=$_SESSION['ID'];
	
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);

    
    $from=1;
    $sql="SELECT * FROM `Payement` WHERE `IDAcheteur`='$ida'";
    $resultat=mysqli_query($db_handle, $sql);
        if(mysqli_num_rows($resultat) == 0)
        { 
        	header('Location:paiement1.php?ida='.$ida.'&from='.$from);
        }
        else 
        {
            header('Location:comfirmerpanier.php?ida='.$ida);
        }
    
   
    mysqli_close($db_handle); 
    

?>