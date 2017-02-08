<?php
			$identifiant=$_POST['ident'];		
			$mdp=$_POST['motDePasse'];		

		$bdd = new PDO('mysql:host=localhost;dbname=Poulgoazec;charset=utf8','root','');

	
try
{	
		if($bdd!=null)
		{
			$requete="Select pwd from acheteur where login='".$identifiant."'";
			$resultat=$bdd->query($requete);
							
		 while($donnees = $resultat->fetch())
            {
            $pwd=$donnees['pwd'];
			
                 
                      }
		if($pwd!=$mdp)
				{
					header('Location: login.html?var=0');
					exit();	

				}
				else
				{
                    session_start ();
                    $_SESSION['login'] = $_POST['login'];
                    $_SESSION['pwd'] = $_POST['pwd'];
					header('Location: InterfaceEnchere.php?Acheteur='.$identifiant.'');
					exit();
				}			  
		}
}
		catch(PDOException $e)
 {
	die('Erreur: '.$e->getMessage());
 }
		?>