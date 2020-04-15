<?php
session_start();
$dep = isset($_POST["dep"])? $_POST["dep"] : "";
$max = isset($_POST["max"])? $_POST["max"] : "";

$database = "EbayECE";
//$idenchere = "1";
	date_default_timezone_set('Europe/Paris');
    $db_handle = mysqli_connect('localhost', 'root','root');
    $db_found = mysqli_select_db($db_handle, $database);
    echo "hgjgg";
    if (isset($_POST["button1"])) {

        
        $id=$_SESSION['ID'];
        $sql="SELECT * FROM encheres WHERE IDachteur='$id'";
		$resultat=mysqli_query($db_handle,$sql);
		if($resultat=="")
        {$sql="SELECT * FROM encheres WHERE IDenchere=1";
		$resultat=mysqli_query($db_handle,$sql);
		$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
		$dateF=$row['dfin'];
        $datetime = date("Y-m-d H:i:s");
        
		if ($datetime>=$dateF)
		{
			echo "Enchère Finie";
		}
		else {
		
		$sql="INSERT INTO `Encherisseur`(`IDenchere`, `IDachteur`, `Encheremax`, `enchereactuelle`) VALUES (1,'$id','$max','$dep')";
        if(mysqli_query($db_handle, $sql)){ 
        echo "Record was updated successfully."; 
        }
        else {
            echo"1742<br>";
           echo mysqli_error($db_handle); }
		}
		$id2 = 1;
		$sql="SELECT * FROM `Encherisseur` WHERE `IDenchere` LIKE '$id2'";
    $resultat=mysqli_query($db_handle,$sql);
    $max=0;
    $ida=0;
    while ($row=mysqli_fetch_array($resultat, MYSQLI_ASSOC))
    {
    	$min=$row['Encheremax'];
    	if($max<$min)
    	{
    		$max=$min;
    		$ida=$row['IDachteur'];
    	}
    	 echo"1742<br>";
    }
    echo $max;
    $max2=0;
    $resultat2=mysqli_query($db_handle,$sql);
    while ($row2=mysqli_fetch_array($resultat2, MYSQLI_ASSOC))
    {
    	$min=$row2['Encheremax'];
    	if($max!=$min )
    	{
    		if($max2<$min)
    		{
    			$max2=$min;
    		}
    		
    	}
    	 echo"1742<br>";
    }
    $max2=$max2+1;
    echo $max2."</br>";
    $sql="UPDATE `Encheres` SET `Prixactuel`='$max2' WHERE `IDenchere`='$id2'";
    if(mysqli_query($db_handle, $sql))
    { 
        echo "Record was updated successfully."; 
    }
    else 
    {
    	echo"1742<br>";
        echo mysqli_error($db_handle); 
    }
    $sql="UPDATE `Encherisseur` SET `enchereactuelle`='$max2' WHERE `IDachteur`='$ida'";
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
    }
    echo"8642<br>";
    
    mysqli_close($db_handle); 

?>