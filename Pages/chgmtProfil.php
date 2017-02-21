<?php

session_start();

$nom = '';
$prenom = '';
$raisonSociale = '';


if ($_SESSION['status'] == 'acheteur') {

    $raisonSociale = addslashes($_POST['raisSoc']);
}
$rue = addslashes($_POST['rue']);
$codePostal = addslashes($_POST['cp']);
$ville = addslashes($_POST['ville']);

if ($_SESSION['status'] == 'crieur') {
    $nom = addslashes($_POST['nom']);
    $prenom = addslashes($_POST['prenom']);
}


echo $raisonSociale . $rue . $codePostal . $ville . $nom . $prenom;


$elementsToInsert = '';

if ($raisonSociale != '' && $raisonSociale != null) {
    $elementsToInsert = "SET raisonSocEnt ='" . $raisonSociale . "'";
}
if ($rue != '') {
    if ($elementsToInsert != '') {
        $elementsToInsert = $elementsToInsert . ",";
    } else {
        $elementsToInsert = $elementsToInsert . "SET ";
    }
    $elementsToInsert = $elementsToInsert . "adresse ='" . $rue . "'";

}
if ($codePostal != '') {
    if ($elementsToInsert != '') {
        $elementsToInsert = $elementsToInsert . ",";
    } else {
        $elementsToInsert = $elementsToInsert . "SET ";
    }
    $elementsToInsert = $elementsToInsert . "cp ='" . $codePostal . "'";

}
if ($ville != '') {
    if ($elementsToInsert != '') {
        $elementsToInsert = $elementsToInsert . ",";
    } else {
        $elementsToInsert = $elementsToInsert . "SET ";
    }
    $elementsToInsert = $elementsToInsert . "ville ='" . $ville . "'";

}
if ($nom != '') {
    if ($elementsToInsert != '') {
        $elementsToInsert = $elementsToInsert . ",";
    } else {
        $elementsToInsert = $elementsToInsert . "SET ";
    }
    $elementsToInsert = $elementsToInsert . "nom ='" . $nom . "'";

}
if ($prenom != '') {
    if ($elementsToInsert != '') {
        $elementsToInsert = $elementsToInsert . ",";
    } else {
        $elementsToInsert = $elementsToInsert . "SET ";
    }
    $elementsToInsert = $elementsToInsert . "prenom ='" . $prenom . "'";

}


$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8', 'root', '');


try {
    if ($bdd != null) {
        if ($_SESSION['status'] == 'acheteur') {

            $requete = "UPDATE acheteur " . $elementsToInsert . " where login='" . $_SESSION['login'] . "'";

            $resultat = $bdd->prepare($requete);

            $resultat->execute();

            header('Location: monCompte.php');
            exit();

        } elseif ($_SESSION['status'] == 'crieur') {

            $requete = "UPDATE crieur " . $elementsToInsert . " where login='" . $_SESSION['login'] . "'";

            $resultat = $bdd->prepare($requete);

            $resultat->execute();

            header('Location: monCompte.php');
            exit();

        } else {
            header('Location: login.html?connection=0');
            exit();
        }

    }
} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}
?>