<?php
	$database = "EbayECE";
    	$db_handle = mysqli_connect('localhost', 'root', 'root');
    	$db_found = mysqli_select_db($db_handle, $database);
		$sql="UPDATE `Nego` SET `Accepter`=1 WHERE `Ref`=1";
	$rep = isset($_POST["rep"])? $_POST["rep"] : "";
	if($rep==1)
	{
		
		mysqli_query($db_handle,$sql);
	}
	if($rep==0){
	$co = isset($_POST["co"])? $_POST["co"] : "";
    else
    {
    $sql="UPDATE `Nego` SET `ContreProposition`='$co' WHERE `Ref`=1";
        if(mysqli_query($db_handle, $sql))
        { 
        	echo "Record was updated successfully."; 
        }
        else 
        {
            echo"1742<br>";
            echo mysqli_error($db_handle); 
        }}}
    
    echo"8642<br>";
    mysqli_close($db_handle); 

?>
