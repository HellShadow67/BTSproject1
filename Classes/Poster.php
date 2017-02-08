<?php
class Poster
 {
 
    private  $datePeche;
    private  $idBateau;
	private $idLot;
	private $idAcheteur;
	private $prixEnchere;
	private $heureEnchere;
	
    public function setAll($dateP,$idB,$idL,$idA,$prixE,$heureE) 
	{ 
         $this->datePeche = $dateP;
		  $this->idBateau = $idB;
		   $this->idLot = $idL;
		    $this->idAcheteur = $idA;
			 $this->prixEnchere = $prixE;
			  $this->heureEnchere = $heureE;
    }
	
	public function getAll()
	{
		return 'Date de la pêche=:'.$this->datePeche.' Id bateau=:'.$this->idBateau.' Id du lot=:'.$this->idLot.' Id de l acheteur=:'.$this->idAcheteur.' Prix de l enchère=:'.$this->prixEnchere.' Heure de l Enchère=:'.$this->heureEnchere;
	}
	
	
	public function __toString()
	{
		return $this->datePeche.' '.$this->idBateau.' '.$this->idLot.' '.$this->idAcheteur.' '.$this->prixEnchere.' '.$this->heureEnchere;
	}
}  



?>