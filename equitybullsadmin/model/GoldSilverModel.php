<?php
class goldSilverModel {
				public $gold_silver_id;
				public $gold_silver_date;
				public $gold_price;
				public $silver_price;

	public function __construct($gold_silver_id,$gold_silver_date,$gold_price,$silver_price, $nse_value, $nse_change)  
    {  
		$this->gold_silver_id 	= $gold_silver_id;
		$this->gold_silver_date = $gold_silver_date;
	    $this->gold_price 		= $gold_price;
		$this->silver_price 	= $silver_price;
    } 
}
?>