<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8', 'root', '');



$nomBateau = $_POST['nomBateau'];
$immBateau = $_POST['immBateau'];


try {
    if ($bdd != null) {


   echo $nomBateau."+".$immBateau;

    }
} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}
?>