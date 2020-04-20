<?php
	session_start();
	$ida =$_GET['ida'];
	//$ida=$_SESSION['ID'];
	
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
	

 	$sql="SELECT * FROM Acheteur WHERE IDAcheteur='$ida'";
	$resultat=mysqli_query($db_handle,$sql);      
	$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
	$namea=$row['Nom'];
	$prenoma=$row['Prenom'];
	$emaila=$row['Email'];
	$adresse=$row['Adresse1'].' '.$row['CodePostal'];
    
     $to  = $emaila;
echo $to;
     // Sujet
     $subject = 'Récapitulatif des achats';

     // message
     $message = 'Récapitulatif de votre achat' ."\n\n".
	 'Merci '.$prenoma.' '.$namea.' d avoir utilisé EbayECE' ."\n\n".
       'Détail de votre article' ."\n\n".'';
        
        
     

     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers = 'From: noreply@eceebay.com'."\r\n".
	 'reply-to: noreply@eceebay.com'."\r\n";

     

    
    
    $sql="SELECT * FROM `Panier` WHERE `IDAcheteur`='$ida'";
    $resultat=mysqli_query($db_handle,$sql); 
    while ($row=mysqli_fetch_array($resultat, MYSQLI_ASSOC))  
    {
    	$ref=$row['Ref'];
    	$sql="SELECT * FROM Items WHERE Ref='$ref'";
	$resultat2=mysqli_query($db_handle,$sql);      
	$row2=mysqli_fetch_array($resultat2, MYSQLI_ASSOC);
	$nom=$row2['Nom'];
	$description=$row2['Description'];
	$img=$row2['Images'];
	$idv=$row2['IDVendeur'];
	$prix=$row2['Prix'];
	$sql="SELECT * FROM Vendeur WHERE IDVendeur='$idv'";
	$resultat2=mysqli_query($db_handle,$sql);      
	$row=mysqli_fetch_array($resultat2, MYSQLI_ASSOC);
	$namev=$row['Nom'];
	$prenomv=$row['Prenom'];
	$emailv=$row['Email'];
	$message.='' ."\n\n".
       'Nom: '.$nom.'' ."\n\n".
       'Description: '.$description.'' ."\n\n".
       'Vendu par: '.$prenomv.' '.$namev.'' ."\n\n".
       'Vendu en achat direct pour la somme de :'.$prix.'$' ."\n\n".
       'Pour toutes questions concernant la livraison contactez directement le vendeur :'.$emailv ;
    	$sql2="DELETE FROM `Items` WHERE `Ref`='$ref'";
    	mysqli_query($db_handle, $sql2);
    	

	}
	

    
	$message.= '' ."\n\n".'Bonjour !' ."\n\n". 'Votre '.$nom.' sera livré(e) au '.$adresse.' dans les prochains jours' ."\n\n".'
			En espérant vous revoir trés vite sur EbeyECE. A bientôt';
     // Envoi
     mail($to, $subject, $message, $headers);
	
    mysqli_close($db_handle);    
   header('Location:index.php');
	
?>