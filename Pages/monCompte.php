<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <!--[if lt IE 9]>
    <script src="http://github.com/aFarkas/html5shiv/blob/master/dist/html5shiv.js"></script>
    <![endif]-->
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=10">
    <![endif]-->
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    <title>Login</title>
    <link rel="stylesheet" href="../Libs/jquery-ui.css">
    <link rel="stylesheet" href="../Libs/bootstrap.min.css">
    <script src="../Libs/jquery-1.12.4.js"></script>
    <script src="../Libs/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#tabs" ).tabs();
        } );

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
session_start ();
// $_SESSION['login']
//$_SESSION['status']

		$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8','root','');

	
try
{	
		if($bdd!=null)
		{

		if($_SESSION['status']=='acheteur'){

            $requete="Select login, raisonSocEnt, adresse, ville, cp, numHabillitation from acheteur where login='".$_SESSION['login']."'";

            $resultat=$bdd->query($requete);

            while($donnees = $resultat->fetch())
            {
                $acheteurLogin = $donnees['login'];
                $acheteurRS=$donnees['raisonSocEnt'];
                $acheteurAdr=$donnees['adresse'];
                $acheteurVille=$donnees['ville'];
                $acheteurCp=$donnees['cp'];
                $acheteurNumHab=$donnees['numHabillitation'];
            }

		    echo '<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Profil</a></li>
        <li><a href="#tabs-2">Nouvelle enchère</a></li>
        <li><a href="#tabs-3">Enchère en cours/à venir</a></li>
    </ul>
    <div id="tabs-1">
     <p class="col-xs-5 .col-sm-6 .col-lg-4">
     </br>
     </br>
        <b>Login: </b>'.$acheteurLogin.'</br>
        <b>Raison sociale: </b> '.$acheteurRS.'</br>
        <b>Adresse: </b>'.$acheteurAdr.'</br>
        <span id="espace-adresse">'.$acheteurVille.'</span> </br>
        <span id="espace-adresse">'.$acheteurCp.' </span> </br> 
        <b>Numéro d\'habilitation: </b>'.$acheteurNumHab.'      
     </p>
     <p class="col-xs-7 .col-sm-6 .col-lg-8">
     <div class="button" id="btnModif" onClick="showForm()" >Modifier</div>
     <div class="col-xs-7 .col-sm-6 .col-lg-8" id="hiddenForm">
     
     <div onClick="hideForm()" class="button">Annuler</div>
     <form method="post" action="chgmtProfil.php">
     <table>
     <tr>
        <td><b>Login: </b></td>	<td> <span class="warning-msg"> &#9888; Seul l\' administrateur peut changer le login &#9888;</span></td></tr>
       <tr><td> <b>Raison sociale: </b></td><td> <input class="input-width" type="text" name="raisSoc"  /> </td></tr>
       <tr> <td><b>Rue: </b></td><td> <input class="input-width" type="text" name="rue"  /></td></tr>
        <tr><td><b>Code postal: </b></td><td>  <input class="input-width" type="text" name="cp"  /></td></tr>
       <tr><td> <b>Ville: </b> </td><td> <input class="input-width" type="text" name="ville"  /></td></tr> 
       <tr><td> <b>Numéro d\'habilitation: </b> </td><td>  <input class="input-width" type="text" name="numHab"  /></td></tr>
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


            }
        elseif ($_SESSION['status']=='crieur'){

            $requete2="Select login, nom, prenom, ville, cp, adresse from crieur where login='".$_SESSION['login']."'";
            $resultat2=$bdd->query($requete2);


            while($donnees = $resultat2->fetch())
            {
                $crieurLogin=$donnees['login'];
                $crieurNom=$donnees['nom'];
                $crieurAdr=$donnees['adresse'];
                $crieurVille=$donnees['ville'];
                $crieurCp=$donnees['cp'];
                $crieurPrenom=$donnees['prenom'];
            }

            echo '<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Profil</a></li>
        <li><a href="#tabs-2">Nouvelle enchère</a></li>
        <li><a href="#tabs-3">Enchère en cours/à venir</a></li>
    </ul>
    <div id="tabs-1">
        <p>
        
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

        }
        else{
            header('Location: login.html?connection=0');
            exit();
                }






		}


}
		catch(PDOException $e)
 {
	die('Erreur: '.$e->getMessage());
 }


 ?>
</body>
<footer>
    Criée Poulgoazec, 29780 Plouhinec - +33 (0)2 98 70 77 19
</footer>

</html>
