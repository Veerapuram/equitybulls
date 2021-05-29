<?php
class currencyModel {
				public $currency_id ;
				public $currency_date;
				public $currency_us_value;
				public $currency_euro_value;
				public $currency_uk_value;
				public $currency_yen_value;

	public function __construct($currency_id,$currency_date,$currency_us_value,$currency_euro_value, $currency_uk_value, $currency_yen_value)  
    {  
		$this->currency_id 				= $currency_id;
		$this->currency_date 			= $currency_date;
	    $this->currency_us_value 		= $currency_us_value;
		$this->currency_euro_value 		= $currency_euro_value;
		$this->currency_uk_value 		= $currency_uk_value;
		$this->currency_yen_value 		= $currency_yen_value;
    } 
}
?>