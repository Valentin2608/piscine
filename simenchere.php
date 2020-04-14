<?php

	
	$id = isset($_POST["id"])? $_POST["id"] : "";
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);
    if (isset($_POST['button1'])) 
    {
    $sql="SELECT * FROM `Encherisseur` WHERE `IDenchere` LIKE '$id'";
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
    $sql="UPDATE `Encheres` SET `Prixactuel`='$max2' WHERE `IDenchere`='$id'";
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
    }}
    echo"8642<br>";
    mysqli_close($db_handle); 
	
?>