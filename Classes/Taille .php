<?php
class Taille
 {
 
    private  $idTaille;
    private  $Specification;
    
  /*  function __construct()
        {
              $this->idTaille = '';
		$this->Specification = '';
		
    }*/
	
    public function setId($id) 
	{ 
         $this->idTaille = $id;
    }
	
	public function getId()
	{
		return 'Id=:'.$this->idTaille;
	}
	
	public function setSpe($spe) 
	{ 
         $this->Specification = $spe;
    }
	
	public function getSpe()
	{
		return 'Specification=:'.$this->Specification;
	}
	
	public function __toString()
	{
		return $this->idTaille.' '.$this->Specification;
	}
}  



?>