 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
		 <title>Tp3-slam3</title>
    </head>

<?php

        require('../Classes/Lot.php');



 try
 {
     $bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8','root','');

      	
	$tab = array();



     $sql ='SELECT * FROM lot order by dateEnchere;';
     $req = $bdd->query($sql);
     $req->setFetchMode(PDO::FETCH_ASSOC);
     echo '<table>';
     echo "<tr><th>Id lot</th><th>Date Vente</th><th>PoIds Brut Lot</th><th>Prix Plancher</th><th>Prix Depart</th><th>Prix Encheres Max</th><th>Date Enchere</th><th>Heure debut Enchere</th><th>Code etat</th><th>Id facture</th><th>Date peche</th><th>Id bateau</th><th>Id Taille</th><th>Id espece</th><th>Id Bac</th><th>Id acheteur</th><th>Id qualite</th><th>Code Pr</th></tr>";
     foreach($req as $row)
     {
         echo "<tr><td>".$row['idLot']."</td><td>".$row['dateEnchere']."</td><td>".$row['poidsBrutLot']."</td><td>".$row['prixPlancher']."</td><td>".$row['PrixDepart']."</td><td>".$row['prixEnchere']."</td><td>".$row['dateEnchere']."</td><td>".$row['heureDebutEnchere']."</td><td>".$row['codeEtat']."</td><td>".$row['idFacture']."</td><td>".$row['datePeche']."</td><td>".$row['idBateau']."</td><td>".$row['idTaille']."</td><td>".$row['idEsp']."</td><td>".$row['idBac']."</td><td>".$row['idAcheteur']."</td><td>".$row['idQual']."</td><td>".$row['idPrep']."</td></tr>";
     }
     echo '</table>';
 } catch (PDOException $e)
 {
     die('Erreur : ' . $e->getMessage());
 }


?>

</html>

