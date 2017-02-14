<html>
    <head>
	<meta charset="utf-8">
    </head>
    <body>
<?php
	function infoBateau() {
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8','root','');
			$sql ='SELECT * FROM bateau;';
			$req = $bdd->query($sql);
			$req->setFetchMode(PDO::FETCH_ASSOC);
			echo '<table>';
			echo "<tr><th>Id bateau</th><th>Nom bateau</th><th>Immatriculation Bateau</th></tr>";
			foreach($req as $row)
			{
				echo "<tr><td>".$row['idBateau']."</td><td>".$row['nomBateau']."</td><td>".$row['ImmatriculationBateau']."</td></tr>";
			}
			echo '</table>';
		} catch (PDOException $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	function infoBac() {
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8','root','');
			$sql ='SELECT * FROM bac;';
			$req = $bdd->query($sql);
			$req->setFetchMode(PDO::FETCH_ASSOC);
			echo '<table>';
			echo "<tr><th>Id bac</th><th>Tare</th></tr>";
			foreach($req as $row)
			{
				echo "<tr><td>".$row['idBac']."</td><td>".$row['tare']."</td></tr>";
			}
			echo '</table>';
		} catch (PDOException $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	function infoTaille() {
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8','root','');
			$sql ='SELECT * FROM taille;';
			$req = $bdd->query($sql);
			$req->setFetchMode(PDO::FETCH_ASSOC);
			echo '<table>';
			echo "<tr><th>Id Taille</th><th>Specification taille</th></tr>";
			foreach($req as $row)
			{
				echo "<tr><td>".$row['idTaille']."</td><td>".$row['Specification']."</td></tr>";
			}
			echo '</table>';
		} catch (PDOException $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	function infoPreparation() {
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8','root','');
			$sql ='SELECT * FROM preparation;';
			$req = $bdd->query($sql);
			$req->setFetchMode(PDO::FETCH_ASSOC);
			echo '<table>';
			echo "<tr><th>Code presentation</th><th>Libelle presentation</th></tr>";
			foreach($req as $row)
			{
				echo "<tr><td>".$row['idPrep']."</td><td>".$row['libellePrep']."</td></tr>";
			}
			echo '</table>';
		} catch (PDOException $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	function infoQualite() {
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8','root','');
			$sql ='SELECT * FROM qualite;';
			$req = $bdd->query($sql);
			$req->setFetchMode(PDO::FETCH_ASSOC);
			echo '<table>';
			echo "<tr><th>Id qualite</th><th>Libelle qualite</th></tr>";
			foreach($req as $row)
			{
				echo "<tr><td>".$row['idQual']."</td><td>".$row['libelleQual']."</td></tr>";
			}
			echo '</table>';
		} catch (PDOException $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	function infoPeche() {
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8','root','');
			$sql ='SELECT * FROM peche;';
			$req = $bdd->query($sql);
			$req->setFetchMode(PDO::FETCH_ASSOC);
			echo '<table>';
			echo "<tr><th>Date peche</th><th>Id Bateau/th></tr>";
			foreach($req as $row)
			{
				echo "<tr><td>".$row['datePeche']."</td><td>".$row['idBateau']."</td></tr>";
			}
			echo '</table>';
		} catch (PDOException $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	function infoPoster() {
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8','root','');
			$sql ='SELECT * FROM poster;';
			$req = $bdd->query($sql);
			$req->setFetchMode(PDO::FETCH_ASSOC);
			echo '<table>';
			echo "<tr><th>Prix enchere</th><th>Heure enchere</th></tr>";
			foreach($req as $row)
			{
				echo "<tr><td>".$row['prixEnchere']."€</td><td>".$row['heureEnchere']."</td></tr>";
			}
			echo '</table>';
		} catch (PDOException $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	function infoEspece() {
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8','root','');
			$sql ='SELECT * FROM espece;';
			$req = $bdd->query($sql);
			$req->setFetchMode(PDO::FETCH_ASSOC);
			echo '<table>';
			echo "<tr><th>Id espece</th><th>Nom commun espece</th><th>Nom Scientifique Espece</th><th>Code Espece</th></tr>";
			foreach($req as $row)
			{
				echo "<tr><td>".$row['idEsp']."</td><td>".$row['nomComm']."</td><td>".$row['nomScient']."</td><td>".$row['codeEsp']."</td></tr>";
			}
			echo '</table>';
		} catch (PDOException $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	function infoAcheteur() {
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8','root','');
			$sql ='SELECT * FROM acheteur;';
			$req = $bdd->query($sql);
			$req->setFetchMode(PDO::FETCH_ASSOC);
			echo '<table>';
			echo "<tr><th>Id acheteur</th><th>Login</th><th>Password</th><th>Raison sociale entreprise</th><th>Adresse</th><th>Ville</th><th>Code postal</th><th>Num habilitation</th></tr>";
			foreach($req as $row)
			{
				echo "<tr><td>".$row['idAcheteur']."</td><td>".$row['login']."</td><td>".$row['pwd']."</td><td>".$row['raisonSocEnt']."</td><td>".$row['adresse']."</td><td>".$row['ville']."</td><td>".$row['cp']."</td><td>".$row['nimHabillitation']."</td></tr>";
			}
			echo '</table>';
		} catch (PDOException $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	function infoLot() {
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8','root','');
			$sql ='SELECT * FROM lot;';
			$req = $bdd->query($sql);
			$req->setFetchMode(PDO::FETCH_ASSOC);
			echo '<table>';
			echo "<tr><th>Id lot</th><th>Date Vente</th><th>PoIds Brut Lot</th><th>Prix Plancher</th><th>Prix Depart</th><th>Prix Encheres Max</th><th>Date Enchere</th><th>Heure debut Enchere</th><th>Code etat</th><th>Id facture</th><th>Date peche</th><th>Id bateau</th><th>Id Taille</th><th>Id espece</th><th>Id Bac</th><th>Id acheteur</th><th>Id qualite</th><th>Code Pr</th></tr>";
			foreach($req as $row)
			{
				echo "<tr><td>".$row['idLot']."</td><td>".$row['dateEnchere']."</td><td>".$row['poidsBrutLot']."</td><td>".$row['prixPlancher']."</td><td>".$row['PrixDepart']."</td><td>".$row['prixEnchere']."</td><td>".$row['dateEnchere']."</td><td>".$row['heureDebutEnchere']."</td><td>".$row['codeEtat']."</td><td>".$row['idFacture']."</td><td>".$row['datePeche']."</td><td>".$row['idBateau']."</td><td>".$row['idTaille']."</td><td>".$row['idEsp']."</td><td>".$row['idBac']."</td><td>".$row['idAcheteur']."</td><td>".$row['idQual']."</td><td>".$row['idPrep']."</td></tr>";
			}
			echo '</table>';
		} catch (PDOException $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	infoBateau();
	infoBac();
	infoTaille();
	infoPreparation();
	infoQualite();
	infoPeche();
	infoPoster();
	infoEspece();
	infoAcheteur();
	infoLot();
?>