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
$datePeche = $_POST['datePeche'];
$dateEnchere = $_POST['dateEnchere'];
$heureEnchere = $_POST['heureEnch'];


try {
    if ($bdd != null) {


        echo $taille;
        echo $bateau;
        echo $espece;
        echo $presentation;
        echo $qualite;
        echo $bac;
        echo $poidsBrut;
        echo $prixPlancher;
        echo $prixDepart;
        echo $datePeche;
        echo $dateEnchere;
        echo $heureEnchere;

    }
} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}
?>