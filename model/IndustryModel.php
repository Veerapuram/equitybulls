<?php
class industryModel {
				public $industry_id;
				public $industry_name;
				public $industry_status;

	public function __construct($industry_id,$industry_name,$industry_status)  
    {  
		$this->industry_id 			= $industry_id;
		$this->industry_name 		= $industry_name;
	    $this->industry_status 		= $industry_status;
    } 
}

?>