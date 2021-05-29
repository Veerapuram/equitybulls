<?php
class nseModel {
				public $isin;
				public $nse_symbol;
				public $nse_dol;
				public $nse_puv;
				public $nse_face_value;
				public $nse_status;

	public function __construct($isin,$nse_symbol,$nse_dol,$nse_puv,$nse_face_value,$nse_status)  
    {  
		$this->isin 			= $isin;
		$this->nse_symbol 		= $nse_symbol;
	    $this->nse_dol 			= $nse_dol;
		$this->nse_puv 			= $nse_puv;
        $this->nse_face_value 	= $nse_face_value;
	    $this->nse_status 		= $nse_status;
    } 
}

?>