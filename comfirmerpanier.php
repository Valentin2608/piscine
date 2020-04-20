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
     $message = '
     <html>
      <head>
       <title>Récapitulatif de votre achat</title>
      </head>
      <body>
       <h2>Merci'.$prenoma.' '.$namea.' d avoir utilisé EbayECE</h2>
       <h4>Détail de votre article</h4>
       <table>';
        
        
     

     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=iso-8859-1';

     // En-têtes additionnels
     $headers[] = 'To: '.$emaila;
     $headers[] = 'From: paul.caudal@edu.ece.fr';

     

    
    
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
	$message.='<tr>
         <th>Nom: '.$nom.'</th>
         <th>description: '.$description.'</th>
         <th>Vendu par: '.$prenomv.' '.$namev.'</th>
         <th>Vendu en achat direct pour la somme de :'.$prix.'</th>
         <th><img src="'.$img.'"/></th>
         <th>Pour toute question concernant la livraison contactez directement le vendeur :'.$emailv.'</th>
        </tr>';
    	$sql2="DELETE FROM `Items` WHERE `Ref`='$ref'";
    	mysqli_query($db_handle, $sql2);
    	

	}
	

    
$message.='<tr>
         <td>Votre '.$nom.' sera livrée au '.$adresse.' dans les prochains jours</td>
        </tr>
        <tr>
         <td>En espérant vous revoir trés vite</td>
        </tr>
       </table>
      </body>
     </html>';
     // Envoi
     mail($to, $subject, $message, implode("\r\n", $headers));

    echo"8642<br>";
    mysqli_close($db_handle);    
   // header('Location:index.php');
	
?>