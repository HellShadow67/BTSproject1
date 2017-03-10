<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8', 'root', '');

$montantActu = $_POST['montantActu'];


try {
    if ($bdd != null) {


        $requete3 = "Select idAcheteur from acheteur where login='" . $_SESSION['login'] . "'";
        $resultat3 = $bdd->prepare($requete3);
        $resultat3->execute();

        $donnees = $resultat3->fetch();

        $idAcheteur = $donnees['idAcheteur'];



        $requete = 'insert into poster (datePeche,idBateau,idLot,idAcheteur,prixEnchere,heureEnchere) values ("'.$_SESSION['datePeche'] .'",'.$_SESSION['idBateau'].','.$_SESSION['idlot'].','.$idAcheteur.','.$montantActu.',"'.date("Y-m-d H:i:s").'")';

        $requete2='update lot set dateEnchere="'.date("Y-m-d").'" ,prixEnchere='.$montantActu.'  , idAcheteur='.$idAcheteur.', codeEtat="T" where idLot='.$_SESSION['idlot'].' and idBateau='.$_SESSION['idBateau'].' and datePeche="'.$_SESSION['datePeche'].'"';

        $resultat = $bdd->prepare($requete);
        $resultat2 = $bdd->prepare($requete2);

        $resultat->execute();
        $resultat2->execute();


        $_SESSION['previous_location']='traitement';

        header('Location: encherir.php');
        exit();
    }
} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}



?>