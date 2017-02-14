<?php
class Acheteur
 {
 

	private $idAcheteur;
	private $login;
	private $pwd;
	private  $raisonSocEnt;
    private  $adresse;
	private $ville;
	private $cp;
	private $numHabillitation;
        
      /*  function __construct()
        {
        $this->idAcheteur ='';
		$this->login = '';
		$this->pwd = '';
		$this->raisonSocEnt = '';
		$this->adresse = '';
		$this->ville = '';
		$this->cp = '';
		$this->numHabillitation ='';
    }*/
	
    public function setAll($idA,$log,$pwd,$rais,$ad,$vi,$cp,$numH) 
	{ 
         $this->idAcheteur = $idA;
		  $this->login = $log;
		   $this->pwd = $pwd;
		    $this->raisonSocEnt = $rais;
			$this->adresse = $ad;
			 $this->ville = $vi;
			 $this->cp = $vi;
			  $this->numHabillitation = $numH;
    }
	
	public function getAll()
	{
		return 'Id acheteur=:'.$this->idAcheteur.' login=:'.$this->login.' Mot de passet=:'.$this->pwd.' Raison Sociale=:'.$this->raisonSocEnt.' adresse=:'.$this->adresse.' ville=:'.$this->ville.' code postal=:'.$this->cp.' numero d habilitation=:'.$this->numHabillitation;
	}
	
	
	public function __toString()
	{
		return 'Id acheteur=:'.$this->idAcheteur.' login=:'.$this->login.' Mot de passet=:'.$this->pwd.' Raison Sociale=:'.$this->raisonSocEnt.' adresse=:'.$this->adresse.' ville=:'.$this->ville.' code postal=:'.$this->cp.' numero d habilitation=:'.$this->numHabillitation;
	}
}  



?>