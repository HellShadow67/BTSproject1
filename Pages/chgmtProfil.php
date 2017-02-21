<?php

session_start ();
// $_SESSION['login']
//$_SESSION['status']

$raisonSociale=$_POST['raisSoc'];
$rue=$_POST['rue'];
$codePostal=$_POST['cp'];
$ville=$_POST['ville'];
$numHab=$_POST['numHab'];

echo $raisonSociale.$rue.$codePostal.$ville.$numHab ;

$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8','root','');


try
{
    if($bdd!=null) {
        if($_SESSION['status']=='acheteur'){

           /* $requete="Select login, raisonSocEnt, adresse, ville, cp, numHabillitation from acheteur where login='".$_SESSION['login']."'";

            $resultat=$bdd->query($requete);

            while($donnees = $resultat->fetch())
            {
                $acheteurLogin = $donnees['login'];
                $acheteurRS=$donnees['raisonSocEnt'];
                $acheteurAdr=$donnees['adresse'];
                $acheteurVille=$donnees['ville'];
                $acheteurCp=$donnees['cp'];
                $acheteurNumHab=$donnees['numHabillitation'];
            }
            */

        }
        elseif ($_SESSION['status']=='crieur') {

        }
        else{
            header('Location: login.html?connection=0');
            exit();
        }

    }
}
catch(PDOException $e)
{
    die('Erreur: '.$e->getMessage());
}
?>