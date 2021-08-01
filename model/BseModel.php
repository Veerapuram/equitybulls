<?php
class bseModel {
				public $isin;
				public $bse_security_code;
				public $bse_security_id;
				public $bse_group;
				public $bse_face_value;
				public $bse_status;

	public function __construct($isin,$bse_security_code,$bse_security_id,$bse_group,$bse_face_value,$bse_status)  
    {  
		$this->isin					= $isin;
        $this->bse_security_code 	= $bse_security_code;
	    $this->bse_security_id 		= $bse_security_id;
		$this->bse_group 			= $bse_group;
        $this->bse_face_value 		= $bse_face_value;
	    $this->bse_status 			= $bse_status;
    } 
}

?>