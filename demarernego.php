<?php

	$ref = isset($_POST["ref"])? $_POST["ref"] : "";
	$prix = isset($_POST["prix"])? $_POST["prix"] : "";
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);

    
    $sql="SELECT * FROM `Items` WHERE `Ref`='$ref'";
    $resultat=mysqli_query($db_handle,$sql);
    $row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
    $idv=$row['IDVendeur'];
    $prixo=$row['Prix'];
    $sql="INSERT INTO `Nego`(`IDvendeur`, `IDachteur`, `Ref`, `Compteur`, `Proposition`, `ContreProposition`, `Accepter`) VALUES ('$idv',1,'$ref',1,'$prix','$prixo',0)";
        if(mysqli_query($db_handle, $sql))
        { 
        	echo "Record was updated successfully."; 
        }
        else 
        {
            echo"1742<br>";
            echo mysqli_error($db_handle); 
        }
    
    echo"8642<br>";
    mysqli_close($db_handle); 

?>