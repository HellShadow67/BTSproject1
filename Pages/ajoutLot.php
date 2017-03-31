<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8', 'root', '');


$taille = $_POST['listTaille'];
$bateau = $_POST['listBateau'];
$espece = $_POST['listEspece'];
$presentation = $_POST['listPresentation'];
$qualite = $_POST['listQualite'];
$bac = $_POST['listBac'];
$poidsBrut = $_POST['poidsBrut'];
$prixPlancher = $_POST['prixPlancher'];
$prixDepart = $_POST['prixDepart'];
$datePeche = addslashes($_POST['datePeche']);
$dateEnchere = addslashes($_POST['dateEnchere']);
$heureEnchere = addslashes($_POST['heureEnch']);

$dateHeureEnchere = $dateEnchere . " " . $heureEnchere . ":00";


try {
    if ($bdd != null) {


        $requete = "insert into peche(idBateau,datePeche) values (" . $bateau . ",'" . $datePeche . "')";
        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        $requete3 = "select idCrieur from crieur where login='" . $_SESSION['login'] . "';";
        $resultat3 = $bdd->prepare($requete3);
        $resultat3->execute();

        while ($data = $resultat3->fetch()) {
            $idCrieur = $data['idCrieur'];
        }


        $requete2 = "insert into lot(idBateau,datePeche,idEsp,idTaille,idPres,idQual,idBac,poidsBrutLot,dateEnchere,heureDebutEnchere,prixPlancher,prixDepart,idCrieur) values (" . $bateau . ",'" . $datePeche . "'," . $espece . "," . $taille . ",'" . $presentation . "','" . $qualite . "','" . $bac . "',$poidsBrut,'" . $dateEnchere . "','" . $dateHeureEnchere . "',$prixPlancher,$prixDepart," . $idCrieur . ")";
        $resultat2 = $bdd->prepare($requete2);
        $resultat2->execute();


         header('Location: gestion.php');


    }
} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}
?>