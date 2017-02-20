<?php
			$identifiant=$_POST['ident'];		
			$mdp=$_POST['motDePasse'];
			$pwd=null;
			$pwd2=null;

		$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8','root','');

	
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
                    $requete2="Select pwd from crieur where login='".$identifiant."'";
                    $resultat2=$bdd->query($requete2);

                    while($donnees = $resultat2->fetch()) {
                        $pwd2 = $donnees['pwd'];
                    }

                        if ($pwd2!=$mdp){

                            header('Location: login.html?var=0');
                            exit();
                        }

                        else{
                            session_start ();
                            // $_SESSION['login'] = $identifiant;
                            //$_SESSION['status'] = 'crieur';
                            //header('Location: InterfaceEnchere.php');
                            //exit();
                            echo 'it worked: crieur';

                    }

				}
				else
				{
                    session_start ();
                   // $_SESSION['login'] = $identifiant;
                    //$_SESSION['status'] = 'acheteur';
					//header('Location: InterfaceEnchere.php');
					//exit();
                    echo 'it worked: acheteur';
				}			  
		}
}
		catch(PDOException $e)
 {
	die('Erreur: '.$e->getMessage());
 }
		?>