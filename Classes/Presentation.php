<?php
class Presentation
 {
 
    private  $idPrep;
    private  $libellePrep;



	
   /* public function __construct($idP,$lib) 
	{ 
         $this->idPrep = $idP;
		  $this->libellePrep = $lib;


    }*/
	
	public function getAll()
	{
		return 'ID de la presentation=:'.$this->idPrep.' libelle=:'.$this->libellePrep;
	}
	
	
	public function __toString()
	{
		return 'ID de la presentation=:'.$this->idPrep.' libelle=:'.$this->libellePrep;
	}
}  

?>