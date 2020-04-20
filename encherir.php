<?php
	session_start();
	$dep = isset($_POST["dep"])? $_POST["dep"] : "";
	$max1 = isset($_POST["max"])? $_POST["max"] : "";
	$ref =$_GET['ref'];
	$database = "EbayECE";
	//$idenchere = "1";
	date_default_timezone_set('Europe/Paris');
    $db_handle = mysqli_connect('localhost', 'root','');
    $db_found = mysqli_select_db($db_handle, $database); 
    if (isset($_POST["button1"])) 
	{
		
        $id=$_SESSION['ID'];
        $sql="SELECT * FROM Encherisseur WHERE IDAcheteur='$id'";  
		$resultat=mysqli_query($db_handle,$sql);      
		if(mysqli_num_rows($resultat) == 0)
        {
			$sql="SELECT * FROM Encheres WHERE Ref='$ref'"; 
			$resultat=mysqli_query($db_handle,$sql);
			$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
			$dateF=$row['dfin'];
			$datetime = date("Y-m-d H:i:s");
			$ide=$row['IDEnchere'];
			$prixmin=$row['Prixmin'];
			if ($datetime>=$dateF) 
			{
				echo "Enchère Finie"; 
			}
			else {
				
				$sql="INSERT INTO `Encherisseur`(`IDEnchere`, `IDAcheteur`, `Encheremax`, `enchereactuelle`, Gagner) VALUES ('$ide','$id','$max1','$dep', '0')";
				mysqli_query($db_handle, $sql);
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
			
			}
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
			}
			$max2=$max2+1;
			if($max2<$prixmin)
			{$max2=$prixmin;}
			if($max2>$max1)
			{$max2=$max1;}
			$sql="UPDATE `Encheres` SET `Prixactuel`='$max2' WHERE `IDenchere`='$ide'";
			mysqli_query($db_handle, $sql);
			$sql="UPDATE `Encherisseur` SET `enchereactuelle`='$max2' WHERE `IDAcheteur`='$ida'";
			mysqli_query($db_handle, $sql);
			
			}}
			
			}
			header('Location: index.php');
			mysqli_close($db_handle); 
			
			?>			