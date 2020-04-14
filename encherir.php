<?php

$dep = isset($_POST["dep"])? $_POST["dep"] : "";
$max = isset($_POST["max"])? $_POST["max"] : "";

$database = "ECEEbay";
//$idenchere = "1";
date_default_timezone_set('Europe/Paris');
    $db_handle = mysqli_connect('localhost', 'root','root');
    $db_found = mysqli_select_db($db_handle, $database);
    echo "hgjgg";
    if ($_POST["button1"]) {

        $sql="SELECT * FROM encheres WHERE IDenchere=1";
		$resultat=mysqli_query($db_handle,$sql);
		$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
		$dateF=$row['dfin'];
        $datetime = date("Y-m-d H:i:s");
		if ($datetime>=$dateF)
		{
			echo "Enchère Finie";
		}
		else {
		
		$sql="INSERT INTO `Encherisseur`(`IDenchere`, `IDachteur`, `Encheremax`, `enchereactuelle`) VALUES (1,1,'$max','$dep')";
        if(mysqli_query($db_handle, $sql)){ 
        echo "Record was updated successfully."; 
        }
        else {
            echo"1742<br>";
           echo mysqli_error($db_handle); }
		}
    }
    echo"8642<br>";
    mysqli_close($db_handle); 

?>