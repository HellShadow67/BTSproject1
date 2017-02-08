 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
		 <title>Tp3-slam3</title>
    </head>

<?php

require('Acheteur.php');
		require('Bateau.php');
        require('Bac.php');
        require('Espece.php');
        require('Lot.php');
        require('Peche.php');
        require('Poster.php');
        require('Presentation.php');
        require('Qualite.php');
        require('etape_7_taille .php');
		
$tables=array('acheteur','bateau','bac','espece','lot','peche','poster','preparation','qualite','taille');
//fonction(nomtable) avec boucle 
 try
 {
     $bdd = new PDO('mysql:host=localhost;dbname=Poulgoazec;charset=utf8','root','');
		
      	
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

