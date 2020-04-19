<?php
	session_start();
	$ref =$_GET['ref'];
	//$ida=$_SESSION['ID'];
	
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    
    
    $sql="DELETE FROM `Items` WHERE `Ref`='$ref'";
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
    header('Location:index.php');

?>