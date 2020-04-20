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
     <html>
      <head>
       <title>Récapitulatif de votre achatt</title>
      </head>
      <body>
       <h2>Merci'.$prenoma.' '.$namea.' d avoir utilisé EbayECE</h2>
       <h4>Détail de votre article</h4>
       <table>
        <tr>
         <th>Nom: '.$nom.'</th>
         <th>description: '.$description.'</th>
         <th>Vendu par: '.$prenomv.' '.$namev.'</th>
         <th>Gagné aux enchères pour la somme de :'.$prix.'</th>
         <th><img src="'.$img.'"/></th>
        </tr>
        <tr>
         <td>Votre '.$nom.' sera livrée au '.$adresse.' dans les prochains jours</td>
         <td>Pour toute question concernant la livraison contactez directement le vendeur :'.$emailv.'</td>
        </tr>
        <tr>
         <td>En espérant vous revoir trés vite</td>
        </tr>
       </table>
      </body>
     </html>
     ';

     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=iso-8859-1';

     // En-têtes additionnels
     $headers[] = 'To: '.$emaila;
     $headers[] = 'From: paul.caudal@edu.ece.fr';

     // Envoi
     mail($to, $subject, $message, implode("\r\n", $headers));
     //on supprime l'article
    $sql="DELETE FROM `Items` WHERE `Ref`='$ref'";
    mysqli_query($db_handle, $sql);
        
    mysqli_close($db_handle); 
    header('Location:index.php');

?>