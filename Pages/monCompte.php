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
    <title>Login</title>
    <link rel="stylesheet" href="../Libs/jquery-ui.css">
    <link rel="stylesheet" href="../Libs/bootstrap.min.css">
    <script src="../Libs/jquery-1.12.4.js"></script>
    <script src="../Libs/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#tabs").tabs();
        });

        function showForm() {

            var showMe = document.getElementById("hiddenForm");
            showMe.style.visibility = "visible";
            var hideMe = document.getElementById("btnModif");
            hideMe.style.visibility = "hidden";

        }
        function hideForm() {

            var showMe = document.getElementById("btnModif");
            showMe.style.visibility = "visible";
            var hideMe = document.getElementById("hiddenForm");
            hideMe.style.visibility = "hidden";

        }

    </script>
</head>
<body class="img-criee">

<a class="button" href="logout.php">Déconnection</a>

<h1>Mon compte</h1>


<?php
session_start();
// $_SESSION['login']
//$_SESSION['status']

$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8', 'root', '');


try {
    if ($bdd != null) {

        if ($_SESSION['status'] == 'acheteur') {

            $requete = "Select login, raisonSocEnt, adresse, ville, cp, numHabillitation from acheteur where login='" . $_SESSION['login'] . "'";

            $resultat = $bdd->prepare($requete);

            $resultat->execute();

            while ($donnees = $resultat->fetch()) {
                $acheteurLogin = $donnees['login'];
                $acheteurRS = $donnees['raisonSocEnt'];
                $acheteurAdr = $donnees['adresse'];
                $acheteurVille = $donnees['ville'];
                $acheteurCp = $donnees['cp'];
                $acheteurNumHab = $donnees['numHabillitation'];
            }

            echo '<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Profil</a></li>
        <li><a href="#tabs-2">Enchère(s) gangnée(s)</a></li>
        <li><a href="#tabs-3">Enchère(s) en cours/à venir</a></li>
    </ul>
    <div id="tabs-1">
     <p class="col-xs-5 .col-sm-6 .col-lg-4">
     </br>
     </br>
      <table classe="table-profil">
     <tr class="darkGrey">
        <td ><b>Login: </b></td>	<td>' . $acheteurLogin . '</td></tr>
        <tr class="lightgrey"><td> <b>Raison sociale: </b></td><td> ' . $acheteurRS . ' </td></tr>
        <tr class="darkGrey"> <td><b>Adresse: </b></td><td>' . $acheteurAdr . '</td></tr>
        <tr class="darkGrey"><td> </td><td> ' . $acheteurCp . '</td></tr>
       <tr class="darkGrey"><td> </td><td>  ' . $acheteurVille . '</td></tr> 
       <tr class="lightgrey"><td> <b>Numéro d\'habilitation: </b> </td><td> ' . $acheteurNumHab . ' </td></tr>
        </table>
 
     </p>
     <p class="col-xs-7 .col-sm-6 .col-lg-8">
     <div class="button" id="btnModif" onClick="showForm()" >Modifier</div>
     <div class="col-xs-7 .col-sm-6 .col-lg-8" id="hiddenForm">
     
     <div onClick="hideForm()" class="button">Annuler</div>
     <form method="post" action="chgmtProfil.php">
     <table>
     <tr class="darkGrey">
        <td ><b>Login: </b></td>	<td> <span class="warning-msg"> &#9888; Seul l\' administrateur peut changer le login &#9888;</span></td></tr>
       <tr class="lightgrey"><td> <b>Raison sociale: </b></td><td> <input class="input-width" type="text" name="raisSoc"  /> </td></tr>
       <tr class="darkGrey"> <td><b>Rue: </b></td><td> <input class="input-width" type="text" name="rue"  /></td></tr>
        <tr class="darkGrey"><td><b>Code postal: </b></td><td>  <input class="input-width" type="text" name="cp"  /></td></tr>
       <tr class="darkGrey"><td> <b>Ville: </b> </td><td> <input class="input-width" type="text" name="ville"  /></td></tr> 
       <tr class="lightgrey"><td> <b>Numéro d\'habilitation: </b> </td><td> <span class="warning-msg">&#9888; Seul l\' administrateur peut changer le numéro d\'habilitation &#9888;</span></td></tr>
        </table>
        <input type="submit" value="Valider" />  
         </form>
         </div>
     </p>
 
    </div>
    <div id="tabs-2">
        <p>
        
</p>
    </div>
    <div id="tabs-3">
        <p>
        
</p>
    </div>
</div>';


        } elseif ($_SESSION['status'] == 'crieur') {

            $requete2 = "Select login, nom, prenom, ville, cp, adresse from crieur where login='" . $_SESSION['login'] . "'";
            $resultat2 = $bdd->prepare($requete2);

            $resultat2->execute();

            while ($donnees = $resultat2->fetch()) {
                $crieurLogin = $donnees['login'];
                $crieurNom = $donnees['nom'];
                $crieurAdr = $donnees['adresse'];
                $crieurVille = $donnees['ville'];
                $crieurCp = $donnees['cp'];
                $crieurPrenom = $donnees['prenom'];
            }

            echo '<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Profil</a></li>
        <li><a href="#tabs-2">Créer une nouvelle enchère</a></li>
        <li><a href="#tabs-3">Enchère(s) en cours/à venir</a></li>
    </ul>
     <div id="tabs-1">
     <p class="col-xs-5 .col-sm-6 .col-lg-4">
     </br>
     </br>
      <table classe="table-profil">
     <tr class="darkgrey">
        <td><b>Login: </b></td>	<td>' . $crieurLogin . '</td></tr>
        <tr class="lightgrey"><td> <b>Nom: </b></td><td> ' . $crieurNom . ' </td></tr>
        <tr class="darkGrey"><td> <b>Prénom: </b> </td><td> ' . $crieurPrenom . ' </td></tr>
        <tr class="lightgrey"> <td><b>Adresse: </b></td><td>' . $crieurAdr . '</td></tr>
        <tr class="lightgrey"><td> </td><td> ' . $crieurCp . '</td></tr>
       <tr class="lightgrey"><td> </td><td>  ' . $crieurVille . '</td></tr> 
        </table>
 
     </p>
     <p class="col-xs-7 .col-sm-6 .col-lg-8">
     <div class="button" id="btnModif" onClick="showForm()" >Modifier</div>
     <div class="col-xs-7 .col-sm-6 .col-lg-8" id="hiddenForm">
     
     <div onClick="hideForm()" class="button">Annuler</div>
     <form method="post" action="chgmtProfil.php">
     <table>
     <tr class="darkGrey">
        <td ><b>Login: </b></td>	<td> <span class="warning-msg"> &#9888; Seul l\' administrateur peut changer le login &#9888;</span></td></tr>
       <tr class="lightgrey"><td> <b>Nom: </b></td><td> <input class="input-width" type="text" name="nom"  /> </td></tr>
       <tr class="darkGrey"><td> <b>Prénom: </b> </td><td><input class="input-width" type="text" name="prenom"  /> </td></tr>
       <tr class="lightgrey"> <td><b>Rue: </b></td><td> <input class="input-width" type="text" name="rue"  /></td></tr>
        <tr class="lightgrey"><td><b>Code postal: </b></td><td>  <input class="input-width" type="text" name="cp"  /></td></tr>
       <tr class="lightgrey"><td> <b>Ville: </b> </td><td> <input class="input-width" type="text" name="ville"  /></td></tr> 
        </table>
        <input type="submit" value="Valider" />  
         </form>
         </div>
     </p>
 
    </div>
    <div id="tabs-2">
        <p>
        
</p>
    </div>
    <div id="tabs-3">
        <p>
        
</p>
    </div>
</div>';

        } else {
            header('Location: login.html?connection=0');
            exit();
        }

    }

} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}


?>
</body>
<footer>
    Criée Poulgoazec, 29780 Plouhinec - +33 (0)2 98 70 77 19
</footer>
</html>
