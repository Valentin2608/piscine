<?php
	session_start();
	$ida =$_GET['ida'];
	//$ida=$_SESSION['ID'];
	//on recupère un miximun d'nformation sur l'enchére qui vient de ce terminer
	$database = "EbayECE";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
	$ref=$_GET['ref'];
    $sql="SELECT * FROM Items WHERE Ref='$ref'";
	$resultat=mysqli_query($db_handle,$sql);      
	$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
	$nom=$row['Nom'];
	$description=$row['Description'];
	$img=$row['Images'];
	$idv=$row['IDVendeur'];
	$sql="SELECT * FROM Vendeur WHERE IDVendeur='$idv'";
	$resultat=mysqli_query($db_handle,$sql);      
	$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
	$namev=$row['Nom'];
	$prenomv=$row['Prenom'];
	$emailv=$row['Email'];
	$sql="SELECT * FROM `Encheres` WHERE `Ref`='$ref'AND `IDVendeur`='$idv'";
 	$resultat=mysqli_query($db_handle,$sql);
 	$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
 	$prix=$row['Prixactuel'];
 	$sql="SELECT * FROM Acheteur WHERE IDAcheteur='$ida'";
	$resultat=mysqli_query($db_handle,$sql);      
	$row=mysqli_fetch_array($resultat, MYSQLI_ASSOC);
	$namea=$row['Nom'];
	$prenoma=$row['Prenom'];
	$emaila=$row['Email'];
	$adresse=$row['Adresse1'].' '.$row['CodePostal'];
    //on envoie un mail avec toutes les informations 
     $to  = $emaila;

     // Sujet
     $subject = 'Récapitulatif des achats';

     // message
     $message = '
     Récapitulatif de votre achat' ."\n\n". 'Merci'.$prenoma.' '.$namea.' d avoir utilisé EbayECE<
	 ' ."\n\n". 'Détail de votre article
	 ' ."\n\n". 'Nom: '.$nom.'' ."\n\n". 'Description: '.$description.'
         ' ."\n\n". 'Vendu par: '.$prenomv.' '.$namev.'
         ' ."\n\n". 'Gagné aux enchères pour la somme de :'.$prix.'
        ' ."\n\n". 'Votre '.$nom.' sera livré(e) au '.$adresse.' dans les prochains jours
         ' ."\n\n". 'Pour toutes questions concernant la livraison contactez directement le vendeur :'.$emailv.'
        ' ."\n\n". 'En espérant vous revoir trés vite' ."\n\n". '';

     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers = 'From: noreply@eceebay.com'."\r\n".
	 'reply-to: noreply@eceebay.com'."\r\n";

     // Envoi
    mail($to, $subject, $message, $headers);
     //on supprime l'article
    $sql="DELETE FROM `Items` WHERE `Ref`='$ref'";
    mysqli_query($db_handle, $sql);
        
    mysqli_close($db_handle); 
    header('Location:index.php');

?>