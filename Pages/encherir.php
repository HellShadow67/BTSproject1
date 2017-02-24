<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css"/>
    <!--[if lt IE 9]>
    <script src="http://github.com/aFarkas/html5shiv/blob/master/dist/html5shiv.js"></script>
    <![endif]-->
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=10">
    <![endif]-->
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <![endif]-->
    <title>Enchère</title>
    <link rel="stylesheet" href="../Libs/jquery-ui.css">
    <link rel="stylesheet" href="../Libs/bootstrap.min.css">
    <script src="../Libs/jquery-1.12.4.js"></script>
    <script src="../Libs/jquery-ui.js"></script>
</head>
<body class="img-criee">

<a class="button" href="logout.php">Déconnection</a>

<h1>Enchère</h1>
<?php
session_start();


$enchereSelectionnée = $_POST['enchereSelectionnee'];


$separation = explode("?", $enchereSelectionnée);
$idLot = $separation[0];
$datePeche = $separation[1];
$idBateau = $separation[2];

$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8', 'root', '');


try {
    if ($bdd != null) {

        $requete = "Select prixPlancher,nomImg, prixDepart,specification,immatriculationBateau,nomScient, codeEsp, libelleQual,tare, poidsBrutLot, libellePres, nomComm,nomBateau from lot l,espece,bac,qualite,taille, presentation, peche, bateau where l.idEsp=espece.idEsp and l.datePeche=peche.datePeche and l.idBateau=peche.idBateau and peche.idBateau=bateau.idBateau and l.idTaille=taille.idTaille and l.idPres=presentation.idpres and l.idQual=qualite.idQual and l.idBac=bac.idBac and l.datePeche='" . $datePeche . "' and l.idBateau=" . $idBateau . " and l.idLot=" . $idLot;


        $resultat = $bdd->prepare($requete);
        $resultat->execute();


        $donnees = $resultat->fetch();

        echo '<div class="encherePanel">Nom Commun: ' . $donnees['nomComm'] . 'Nom scientifique: ' . $donnees['nomScient'].'Code espèce: '.$donnees['codeEsp'].'<img class="img-poisson" src="../Images/Poissons/'.$donnees['nomImg'].'.jpg"';


        if ($_SESSION['status'] == 'acheteur') {

            //if date heure<now() commence dans: decompte
            //sinon deb


        } elseif ($_SESSION['status'] == 'crieur') {
        } else {
            header('Location: login.html?connection=0');
            exit();
        }

    }
}
catch
(PDOException $e)
{
    die('Erreur: ' . $e->getMessage());
}

echo '</div>';
?>

</body>
<footer>
    Criée Poulgoazec, 29780 Plouhinec - +33 (0)2 98 70 77 19
</footer>
</html>
