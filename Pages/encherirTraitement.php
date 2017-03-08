<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8', 'root', '');

$montantActu = $_POST['montantActu'];


try {
    if ($bdd != null) {
        $requete = "insert into poster ";
        $resultat = $bdd->prepare($requete);

        $resultat->execute();

        header('Location: encherir.php');
        exit();
    }
} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}



?>