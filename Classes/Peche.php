<?php
class Peche
 {
 
    private  $datePeche;
    private  $idBateau;

	
    public function setAll($dateP,$idB) 
	{ 
         $this->datePeche = $dateP;
		  $this->idBateau = $idB;

    }
	
	public function getAll()
	{
		return 'Date de la pêche=:'.$this->datePeche.' Id bateau=:'.$this->idBateau;
	}
	
	
	public function __toString()
	{
		return $this->datePeche.' '.$this->idBateau;
	}
}  



?>