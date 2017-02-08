<?php
class Qualite
 {
 
    private  $idQual;
    private  $LibelleQual;
	
    public function setId($id) 
	{ 
         $this->idQual = $id;
    }
	
	public function getId()
	{
		return 'Id=:'.$this->idQual;
	}
	
	public function setLibel($lib) 
	{ 
         $this->LibelleQual = $lib;
    }
	
	public function getLibel()
	{
		return 'LibelleQual=:'.$this->LibelleQual;
	}
	
	public function __toString()
	{
		return $this->idQual.' '.$this->LibelleQual;
	}
}  



?>