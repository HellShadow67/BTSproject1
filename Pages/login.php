<?php
$identifiant = addslashes($_POST['ident']);
$mdp = addslashes($_POST['motDePasse']);
$pwd = null;
$pwd2 = null;

$bdd = new PDO('mysql:host=10.129.180.123;dbname=lacriee;charset=utf8', 'root', 'ArtemisLL');


try {
    if ($bdd != null) {
        $requete = "Select pwd from acheteur where login='" . $identifiant . "'";
        $resultat = $bdd->prepare($requete);

        $resultat->execute();

        while ($donnees = $resultat->fetch()) {
            $pwd = $donnees['pwd'];


        }
        if ($pwd != $mdp) {
            $requete2 = "Select pwd from crieur where login='" . $identifiant . "'";
            $resultat2 = $bdd->prepare($requete2);

            $resultat2->execute();


            while ($donnees = $resultat2->fetch()) {
                $pwd2 = $donnees['pwd'];
            }

            if ($pwd2 != $mdp) {

                header('Location: login.html?connection=0');
                exit();
            } else {
                session_start();
                $_SESSION['login'] = $identifiant;
                $_SESSION['status'] = 'crieur';
                header('Location: monCompte.php');
                exit();

            }

        } else {
            session_start();
            $_SESSION['login'] = $identifiant;
            $_SESSION['status'] = 'acheteur';
            header('Location: monCompte.php');
            exit();

        }
    }
} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}
?>