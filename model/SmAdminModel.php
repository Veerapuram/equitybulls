<?php
class smAdminModel {
				public $market_id ;
				public $market_date;
				public $bse_value;
				public $bse_change;
				public $nse_value;
				public $nse_change;

	public function __construct($market_id,$market_date,$bse_value,$bse_change, $nse_value, $nse_change)  
    {  
		$this->market_id 		= $market_id;
		$this->market_date 		= $market_date;
	    $this->bse_value 		= $bse_value;
		$this->bse_change 		= $bse_change;
		$this->nse_value 		= $nse_value;
		$this->nse_change 		= $nse_change;
    } 
}
?>