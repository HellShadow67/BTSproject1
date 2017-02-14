 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
		 <title>Tp3-slam3</title>
    </head>

<?php

        require('../Classes/Acheteur.php');
		require('../Classes/Bateau.php');
        require('../Classes/Bac.php');
        require('../Classes/Espece.php');
        require('../Classes/Lot.php');
        require('../Classes/Peche.php');
        require('../Classes/Poster.php');
        require('../Classes/Presentation.php');
        require('../Classes/Qualite.php');
        require('../Classes/Taille.php');
		
$tables=array('acheteur','bateau','bac','espece','lot','peche','poster','preparation','qualite','taille');
//fonction(nomtable) avec boucle
 try
 {
     $bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8','root','');

      	
	$tab = array();
	
        foreach ($tables as $table) 
        {

	$requete = "select * from $table";
	$reponse = $bdd->query($requete);
            
	$reponse->setFetchMode(PDO::FETCH_CLASS, $table);
        while($obj = $reponse->fetch())
	{
            //ajout nouvel élément dans tableau, new/array
			$tab[] = $obj;          		
            echo $obj.'</br>';
              
	}
        }
        
 }
 catch(PDOException $e)
 {
	die('Erreur: '.$e->getMessage());
 }

$reponse->closeCursor();

?>

</html>

