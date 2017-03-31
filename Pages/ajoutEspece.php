<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8', 'root', '');



$nomScient = addslashes($_POST['nomScient']);
$nomComm = addslashes($_POST['nomComm']);
$codeE = addslashes($_POST['codeE']);


try {
    if ($bdd != null) {

        $requete = "insert into espece(nomComm,codeEsp) values ('".$nomBateau."','".$immBateau."')";
        $resultat = $bdd->prepare($requete);
        $resultat->execute();


        header('Location: gestion.php');

    }
} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}
?>