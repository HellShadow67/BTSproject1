<?php
class Bac
 {
 
    private  $idBac;
    private  $tare;


/*	
    public function __construct($idB,$tare) 
	{ 
         $this->idBac = $idB;
	$this->tare = $tare;
    }*/
	
	public function getAll()
	{
		return 'ID du bac=:'.$this->idBac.' La tare=:'.$this->tare;
	}
	
	
	public function __toString()
	{
		return 'ID du bac=:'.$this->idBac.' La tare=:'.$this->tare;
	}
}  

?>