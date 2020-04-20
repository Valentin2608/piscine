<?php

date_default_timezone_set('Europe/Paris');
    $db_handle = mysqli_connect('localhost', 'root','');
    $db_found = mysqli_select_db($db_handle, $database); 
   
         
        $sql="SELECT * FROM Encheres";
		$resultat=mysqli_query($db_handle,$sql);      
		while ($row=mysqli_fetch_array($resultat, MYSQLI_ASSOC))
		{
			$id=$row['IDEnchere'];
			$dateF=$row['dfin'];
       		 $datetime = date("Y-m-d H:i:s");
       		 if ($datetime>=$dateF) 
			{
			$sql="SELECT * FROM Encherisseur WHERE IDEnchere='$id'"; 
			$resultat2=mysqli_query($db_handle,$sql);  
			$max=0;   
			while ($row2=mysqli_fetch_array($resultat2, MYSQLI_ASSOC))
			{
				$min=$row['encheractuelle'];
    			if($max<$min)
    			{
    				$max=$min;
    				$ida=$row['IDAcheteur'];
    			}
			}
			$sql2="UPDATE `Encherisseur` SET `Gagner`=1 WHERE `IDEnchere`='$id' AND`IDAcheteur`='$ida'";
			mysqli_query($db_handle,$sql2);
			}
		}
        
?>