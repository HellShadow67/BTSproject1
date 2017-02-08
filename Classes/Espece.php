<?php
class Espece
 {
 
    private  $idEsp;
    private  $nomComm;
	private $nomScient;
	private $codeEsp;


	
    /*public function __construct($idE,$nomC,$nomS,$codeE) 
	{ 
         $this->idEsp = $idE;
		  $this->nomComm = $nomC;
		   $this->nomScient = $nomS;
		    $this->codeEsp = $codeE;

    }*/
	
	public function getAll()
	{
		return 'ID de l espece=:'.$this->idEsp.' nom commun=:'.$this->nomComm.' nom scientifique=:'.$this->nomScient.' code de l espece=:'.$this->codeEsp;
	}
	
	
	public function __toString()
	{
		return 'ID de l espece=:'.$this->idEsp.' nom commun=:'.$this->nomComm.' nom scientifique=:'.$this->nomScient.' code de l espece=:'.$this->codeEsp;
	}
}  

?>