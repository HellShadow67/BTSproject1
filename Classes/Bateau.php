<?php
class Bateau
 {
        private  $idBateau;
	private $nomBateau;
	private $ImmatriculationBateau;
	
      /* function __construct()
        {
              $this->idBateau = '';
		$this->nomBateau = '';
		$this->ImmatriculationBateau = '';
    }*/


    public function setAll($idB,$nom,$imm) 
	{ 
		$this->idBateau = $idB;
		$this->nomBateau = $nom;
		$this->ImmatriculationBateau = $imm;
    }
	
	public function getAll()
	{
		return ' Id bateau=:'.$this->idBateau.' Nom du bateau=:'.$this->nomBateau.' Immatriculation=:'.$this->ImmatriculationBateau;
	}
	
		public function __toString()
	{
		return $this->idBateau.' '.$this->nomBateau.' '.$this->ImmatriculationBateau;
	}
}  
?>