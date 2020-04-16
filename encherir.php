<?php
session_start();
$dep = isset($_POST["dep"])? $_POST["dep"] : "";
$max = isset($_POST["max"])? $_POST["max"] : "";
$ref =$_GET['ref'];
$database = "EbayECE";
//$idenchere = "1";
	date_default_timezone_set('Europe/Paris');
    $db_handle = mysqli_connect('localhost', 'root','root');
    $db_found = mysqli_select_db($db_handle, $database); 
    echo"8641<br>"; 
    if (isset($_POST["button1"])) {
echo"8642<br>";
         
        $id=5;
        $sql="SELECT * FROM Encherisseur WHERE IDAcheteur='$id'";  
		$resultat=mysqli_query($db_handle,$sql);     
		echo"8643<br>"; 
		//if(empty($resultat))
        //{
        $sql="SELECT * FROM Encheres WHERE Ref='$ref'"; 
        echo"8644<br>";
		$resultat=mysqli_query($db_handle,$sql);
		$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
		$dateF=$row['dfin'];
        $datetime = date("Y-m-d H:i:s");
        $ide=$row['IDEnchere'];
        echo $ref;
		if ($datetime>=$dateF) 
		{
			echo "Enchère Finie"; 
		}
		else {
		
		$sql="INSERT INTO `Encherisseur`(`IDEnchere`, `IDAcheteur`, `Encheremax`, `enchereactuelle`) VALUES ('$ide','$id','$max','$dep')";
        if(mysqli_query($db_handle, $sql)){ 
        echo "Record was updated successfully."; 
        }
        else {
            echo"1742<br>";
           echo mysqli_error($db_handle); }
		}
		$sql="SELECT * FROM `Encherisseur` WHERE `IDEnchere` LIKE '$ide'";
    $resultat=mysqli_query($db_handle,$sql);
    $max=0;
    $ida=0;
    while ($row=mysqli_fetch_array($resultat, MYSQLI_ASSOC))
    {
    	$min=$row['Encheremax'];
    	if($max<$min)
    	{
    		$max=$min;
    		$ida=$row['IDAcheteur'];
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
    $sql="UPDATE `Encheres` SET `Prixactuel`='$max2' WHERE `IDenchere`='$ide'";
    if(mysqli_query($db_handle, $sql))
    { 
        echo "Record was updated successfully."; 
    }
    else 
    {
    	echo"1742<br>";
        echo mysqli_error($db_handle); 
    }
    $sql="UPDATE `Encherisseur` SET `enchereactuelle`='$max2' WHERE `IDAcheteur`='$ida'";
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
    
    echo"8645<br>";
    
    mysqli_close($db_handle); 

?>