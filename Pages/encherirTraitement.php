<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8', 'root', '');

$montantActu = $_POST['montantActu'];

$enchereSelectionnee = $_POST['lotId'];


$separation = explode("?", lotId);
$idLot = $separation[0];
$datePeche = $separation[1];
$idBateau = $separation[2];

$montantActu=$_POST['montantActu'];

try {
    if ($bdd != null) {

        echo $idLot.' '.$datePeche ;

        $requete3 = "Select idAcheteur from acheteur where login='" . $_SESSION['login'] . "'";
        $resultat3 = $bdd->prepare($requete3);
        $resultat3->execute();

        $donnees = $resultat3->fetch();

        $idAcheteur = $donnees['idAcheteur'];



        $requete = "insert into poster (datePeche,idBateau,idLot,idAcheteur,prixEnchere) values ('.$datePeche.','.$idBateau.','.$idLot.','.$idAcheteur.','.$montantActu.') ";
       // echo $requete;
        $requete2="update lot set idAcheteur='.$idAcheteur.', codeEtat='T' where idLot='.$idLot.' and idBateau='.$idBateau.' and datePeche='.$datePeche.'";
     //   echo $requete2;
        $resultat = $bdd->prepare($requete);
        $resultat2 = $bdd->prepare($requete2);

      //  $resultat->execute();
     //   $resultat2->execute();

       // header('Location: encherir.php');
       // exit();
    }
} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}



?>