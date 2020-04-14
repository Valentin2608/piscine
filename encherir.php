<?php

$dep = isset($_POST["dep"])? $_POST["dep"] : "";
$max = isset($_POST["max"])? $_POST["max"] : "";

$database = "EbayECE";

    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);
    echo "hgjgg";
    if ($_POST["button1"]) {

        echo"1642<br>";
        $sql="INSERT INTO `Encherisseur`(`IDenchere`, `IDachteur`, `Encheremax`, `enchereactuelle`) VALUES (1,1,'$max','$dep')";
        if(mysqli_query($db_handle, $sql)){ 
        echo "Record was updated successfully."; 
        }
        else {
            echo"1742<br>";
           echo mysqli_error($db_handle); }
    }
    echo"8642<br>";
    mysqli_close($db_handle); 

?>