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

        echo '<div class="encherePanel">
<div class="row">
<div class="col-lg-9 col-sm-9 col-md-9">
    <table id="table-description-enchere">
        <tr><td><b>Nom Commun: </b>' . $donnees['nomComm'] . '</td><td><b>Nom scientifique:</b> ' . $donnees['nomScient'] . '</td><td><b>Code espèce: </b>' . $donnees['codeEsp'] . '</td></tr>
        <tr><td><b>Nom du bateau:</b> ' . $donnees['nomBateau'] . '</td><td><b>Immatriculation du bateau:</b> ' . $donnees['immatriculationBateau'] . '</td><td></td></tr>
        <tr><td><b>Spécification: </b>' . $donnees['specification'] . '</td><td><b>Qualité:</b> ' . $donnees['libelleQual'] . '</td><td></td></tr>

';
        $poidsNet = $donnees['poidsBrutLot'] - $donnees['tare'];

        echo '
        <tr><td><b>Poids Brut: </b>' . $donnees['poidsBrutLot'] . 'kg</td><td><b>Tare:</b> ' . $donnees['tare'] . 'kg</td><td><b>Poids net: </b>' . $poidsNet . 'kg</td></tr>
        <tr><td><b>Prix de départ: </b>' . $donnees['prixDepart'] . '€</td><td><b>Prix plancher:</b> ' . $donnees['prixPlancher'] . '€</td><td></td></tr>
    </table>
</div>
<div class="col-lg-3 col-sm-3 col-md-3"><img class="img-poisson" src="../Images/Poissons/' . $donnees['nomImg'] . '.jpg"></div>
</div>
</div>';


        if ($_SESSION['status'] == 'acheteur') {


            echo '<div>
<div class="row">
    <div class="col-md-3 col-sm-3 col-lg-3">

    </div>
    <div class="col-md-3 col-sm-3 col-lg-3">

    </div>
    <div class="col-md-3 col-sm-3 col-lg-3">

    </div>

</div>
</div>';


        } elseif ($_SESSION['status'] == 'crieur') {



        }
        else {
            header('Location: login.html?connection=0');
            exit();
        }

    }
} catch
(PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}

echo '</div>';
?>
<a class="button" href="monCompte.php">Annuler</a>
</body>

<footer>
    Criée Poulgoazec, 29780 Plouhinec - +33 (0)2 98 70 77 19
</footer>
</html>
