<!DOCTYPE html>
<html lang="en">

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
    <title>Gestion des lots</title>
    <link rel="stylesheet" href="../Libs/jquery-ui.css">
    <link rel="stylesheet" href="../Libs/bootstrap.min.css">
    <script src="../Libs/jquery-3.1.1.js"></script>
    <script src="../Libs/jquery-ui.js"></script>
    <script>

        $(function () {
            $("#tabs").tabs();
        });

    </script>
</head>
<?php
session_start();

$_SESSION['previous_location'] = 'monCompte';

$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8', 'root', '');

$aPartirDe = '2017-03-10';


try {
if ($bdd != null) {

if ($_SESSION['status'] == 'crieur'){


?>


<body class="img-criee">
<a class="button" href="logout.php">Déconnection</a>

<h1>Gestion des lots</h1>
<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Ajout de bateau</a></li>
        <li><a href="#tabs-2">Ajout de lots</a></li>
        <li><a href="#tabs-3">Ajout d'espèce de poisson</a></li>
    </ul>

    <div id="tabs-1">
        <form method="post" action="ajoutBateau.php">
            <table class="formulaire">
                <tr class="darkGrey">
                    <td>
                        Nom du bateau:
                    </td>
                    <td>
                        <input type="text" name="nomBateau" required/>
                    </td>
                </tr>
                <tr class="lightgrey">
                    <td>
                        Immatriculation du bateau:
                    </td>
                    <td>
                        <input type="text" name="immBateau" required/></td>
                </tr>
            </table>
            <input type="submit" value="Valider"/>
        </form>
    </div>
    <div id="tabs-2">
        <form method="post" action="ajoutLot.php">
            <table class="formulaire">
                <tr class="darkGrey">
                    <td>
                        Nom du bateau:
                    </td>
                    <td>
                        <select name="listBateau">
                            <?php

                            $requete = "SELECT nomBateau, idBateau FROM bateau order by nomBateau";
                            $resultat = $bdd->prepare($requete);

                            $resultat->execute();

                            while ($row = $resultat->fetch()) {

                                echo '<option value="' . $row["idBateau"] . '">' . $row["nomBateau"] . '</option>';
                            }


                            ?>

                        </select>
                    </td>


                    <td>
                        Espèce:
                    </td>
                    <td>
                        <select name="listEspece">
                            <?php

                            $requete = "SELECT nomComm, idEsp FROM Espece order by nomComm";
                            $resultat = $bdd->prepare($requete);

                            $resultat->execute();

                            while ($row = $resultat->fetch()) {

                                echo '<option value="' . $row["idEsp"] . '">' . $row["nomComm"] . '</option>';
                            }


                            ?>

                        </select>
                    </td>
                    <td>
                        En cm:
                    </td>
                    <td>
                        <select name="listTaille">
                            <?php

                            $requete = "SELECT specification, idTaille FROM taille order by specification";
                            $resultat = $bdd->prepare($requete);

                            $resultat->execute();

                            while ($row = $resultat->fetch()) {

                                echo '<option value="' . $row["idTaille"] . '">' . $row["specification"] . '</option>';
                            }


                            ?>

                        </select>
                    </td>
                </tr>
                <tr class="lightgrey">
                    <td>
                        Présentation:
                    </td>
                    <td>
                        <select name="listPresentation">
                            <?php

                            $requete = "SELECT libellePres, idPres FROM presentation order by libellePres";
                            $resultat = $bdd->prepare($requete);

                            $resultat->execute();

                            while ($row = $resultat->fetch()) {

                                echo '<option value="' . $row["idPres"] . '">' . $row["libellePres"] . '</option>';
                            }


                            ?>

                        </select>
                    </td>
                    <td>
                        Qualité:
                    </td>
                    <td>
                        <select name="listQualite">
                            <?php

                            $requete = "SELECT libelleQual, idQual FROM qualite order by libelleQual";
                            $resultat = $bdd->prepare($requete);

                            $resultat->execute();

                            while ($row = $resultat->fetch()) {

                                echo '<option value="' . $row["idQual"] . '">' . $row["libelleQual"] . '</option>';
                            }


                            ?>

                        </select>
                    </td>
                    <td>
                        Tare:
                    </td>
                    <td>
                        <select name="listBac">
                            <?php

                            $requete = "SELECT idBac, tare FROM bac order by tare";
                            $resultat = $bdd->prepare($requete);

                            $resultat->execute();

                            while ($row = $resultat->fetch()) {

                                echo '<option value="' . $row["idBac"] . '">' . $row["tare"] . '</option>';
                            }


                            ?>

                        </select>
                    </td>
                </tr>
                <tr class="darkGrey">
                    <td>
                        Poids brut:
                    </td>
                    <td>
                        <input name="poidsBrut" min="1" type="number" value="poidsB" required/>€
                    </td>
                    <td>
                        Prix plancher:
                    </td>
                    <td>
                        <input name="prixPlancher" min="1" type="number" value="prixPlan" required/>€
                    </td>
                    <td>
                        Prix de départ:
                    </td>
                    <td>
                        <input name="prixDepart" min="1" type="number" value="prixDep" required/>€
                    </td>
                </tr>
                <tr class="lightgrey">
                    <td>
                        Date de peche:
                    </td>
                    <td>
                        <input type="date" name="datePeche" required/>
                    </td>
                    <td>
                        Date de l'enchère:
                    </td>
                    <td>
                        <input type="date" name="dateEnchere" required/>
                    </td>
                    <td>
                        Heure de l'enchère:
                    </td>
                    <td>
                        <input type="time" name="heureEnch" required>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Valider"/>
        </form>
    </div>
    <div id="tabs-3">
        <form method="post" action="ajoutEspece.php">
            <table class="formulaire">
                <tr class="darkGrey">
                    <td>
                        Nom commun de l'espèce:
                    </td>
                    <td>
                        <input type="text" name="nomComm" required/>
                    </td>
                    <td>
                        Code de l'espèce:
                    </td>
                    <td>
                        <input type="text" name="codeE" required/>
                    </td>
                </tr>
                <tr class="lightgrey">
                    <td>
                        Nom scientifique:
                    </td>
                    <td>
                        <input type="text" name="nomScient" required/>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                </tr>
            </table>



        </br>

            <input type="submit" value="Valider"/>
        </form>
    </div>
</div>
<a class="button" href="monCompte.php">Mon Compte</a>
</body>
</html>

<?php

}
else {
    header('Location: login.html?connection=0');
    exit();
}
}

} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}
?>