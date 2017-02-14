<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
</head>

<?php

require('../Classes/Taille.php');

$taille = new Taille();
$taille->setId('17');
echo 'Taille: <br/> '.$taille->getId();

$taille->setSpe('taille de 17');
echo '<br/>'.$taille->getSpe();

echo '<br/>'.$taille->__toString().'<br/>';

echo '<br/><br/>';

require('../Classes/Qualite.php');

$Qualite = new Qualite();
$Qualite->setId('Z');
echo 'Qualité: <br/>'.$Qualite->getId();

$Qualite->setLibel('Autre');
echo '<br/>'.$Qualite->getLibel();

echo '<br/>'.$Qualite->__toString();

echo '<br/><br/>';

require('../Classes/Poster.php');

$Poster = new Poster();
$Poster->setAll('12/06/2011','121aze12','14','1',12.3,'12:45');
echo 'Poster: <br/>'.$Poster->getAll();

echo '<br/>'.$Poster->__toString();

echo '<br/><br/>';

require('../Classes/Lot.php');

$Lot = new Lot();
$Lot->setAll('12/07/2014','1','1','1','1','1','1','1',2.35,12.5,'13/07/2014','12:50',12.7,8,'E','1','1');
echo 'Lot: <br/>'.$Lot->getAll();

echo '<br/>'.$Lot->__toString();

echo '<br/><br/>';

require('../Classes/Peche.php');

$Peche = new Peche();

$Peche->setAll('12/07/2014','1');

echo 'Peche: <br/>'.$Peche->getAll();


echo '<br/>'.$Peche->__toString();

echo '<br/><br/>';

require('../Classes/Bateau.php');

$Bateau = new Bateau();

$Bateau->setAll('1','Esperance','1888aaa74');

echo 'Bateau: <br/>'.$Bateau->getAll();


echo '<br/>'.$Bateau->__toString();

echo '<br/><br/>';

require('../Classes/Acheteur.php');

$Acheteur = new Acheteur();

$Acheteur->setAll('1','Duarte_Samanta','DS','Rene Cassin','13 rue Emille Zola','Strasbourg','67100','1211545');

echo 'Acheteur: <br/>'.$Acheteur->getAll();


echo '<br/>'.$Acheteur->__toString();

echo '<br/><br/>';

require('../Classes/Espece.php');

$Espece = new Espece('1','Lotte','Lottus','1');

echo 'Espece: <br/>'.$Espece->getAll();


echo '<br/>'.$Espece->__toString();

echo '<br/><br/>';

require('../Classes/Bac.php');

$Bac = new Bac('1',4.5);

echo 'Bac: <br/>'.$Bac->getAll();


echo '<br/>'.$Bac->__toString();

echo '<br/><br/>';

require('../Classes/Presentation.php');

$Presentation = new Presentation('1','Ecaillé');

echo 'Presentation: <br/>'.$Presentation->getAll();


echo '<br/>'.$Presentation->__toString();

?>
</html>