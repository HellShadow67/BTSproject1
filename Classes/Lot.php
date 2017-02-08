
<?php
class Lot
 {
 
    private  $datePeche;
    private  $idBateau;
	private $idLot;
	private $idEsp;
	private $idTaille;
	private $idPrep;
	private $idQual;
	private $idBac;
	private $poidsBrutLot;
	private $prixEnchere;
	private $dateEnchere;
	private $heureDebutEnchere;
	private $prixPlancher;
	private $PrixDepart;
	private $codeEtat;
	private $idAcheteur;
	private $idFacture;
        
      /*  function __construct()
        {
              $this->datePeche = '';
		$this->idBateau = '';
                $this->idLot = '';
		$this->idEsp = '';
                $this->idTaille = '';
		$this->idPrep = '';
                $this->idQual = '';
		$this->idBac = '';
                $this->poidsBrutLot = '';
		$this->prixEnchere = '';
                $this->dateEnchere = '';
		$this->heureDebutEnchere = '';
                $this->prixPlancher = '';
		$this->PrixDepart = '';
                $this->codeEtat = '';
		$this->idAcheteur = '';
                $this->idFacture = '';
		
    }*/
	
    public function setAll($dateP,$idB,$idL,$idE,$idT,$idP,$idQ,$idBa,$poidsB,$prixE,$dateE,$heureE,$prixP,$prixD,$codeE,$idA,$idF) 
	{ 
                   $this->datePeche = $dateP;
		  $this->idBateau = $idB;
		   $this->idLot = $idL;
		    $this->idEsp = $idE;
			$this->idTaille = $idT;
			$this->idPrep = $idP;
			$this->idQual = $idQ;
			$this->idBac = $idBa;
			$this->poidsBrutLot = $poidsB;
			 $this->prixEnchere = $prixE;
			 $this->dateEnchere = $dateE;
			  $this->heureDebutEnchere = $heureE;
			  $this->prixPlancher = $prixP;
			  $this->PrixDepart = $prixD;
			  $this->codeEtat = $codeE;
			  $this->idAcheteur = $idA;
			  $this->idFacture = $idF;
    }
	
	public function getAll()
	{
		return 'Date de la pêche=:'.$this->datePeche.' Id bateau=:'.$this->idBateau.' Id du lot=:'.$this->idLot.' Id de l espèce=:'.$this->idEsp.' Id de la taille=:'.$this->idTaille.' id de la présentation=:'.$this->idPrep.' Id de la qualite=:'.$this->idQual.' Id du bac=:'.$this->idBac.' Poids brut=:'.$this->poidsBrutLot.' Prix de l enchere=:'.$this->prixEnchere.' Date de l enchere=:'.$this->dateEnchere.' Heure de debut de l enchere=:'.$this->heureDebutEnchere.' Prix plancher=:'.$this->prixPlancher.' Prix de depart=:'.$this->PrixDepart.' Code etat=:'.$this->codeEtat.' Id de l acheteur=:'.$this->idAcheteur.' Id de la facture=:'.$this->idFacture;
	}
	
	
	public function __toString()
	{
		return 'Date de la pêche=:'.$this->datePeche.' Id bateau=:'.$this->idBateau.' Id du lot=:'.$this->idLot.' Id de l espèce=:'.$this->idEsp.' Id de la taille=:'.$this->idTaille.' id de la présentation=:'.$this->idPrep.' Id de la qualite=:'.$this->idQual.' Id du bac=:'.$this->idBac.' Poids brut=:'.$this->poidsBrutLot.' Prix de l enchere=:'.$this->prixEnchere.' Date de l enchere=:'.$this->dateEnchere.' Heure de debut de l enchere=:'.$this->heureDebutEnchere.' Prix plancher=:'.$this->prixPlancher.' Prix de depart=:'.$this->PrixDepart.' Code etat=:'.$this->codeEtat.' Id de l acheteur=:'.$this->idAcheteur.' Id de la facture=:'.$this->idFacture;
	}
}  

?>
