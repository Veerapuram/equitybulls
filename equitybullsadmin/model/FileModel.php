<?php
class fileModel {
				public $file_id;
				public $company_id;
				public $file_details;
				public $file_status;

	public function __construct($file_id,$company_id,$file_details,$file_status)  
    {  
		$this->file_id 				= $file_id;
		$this->company_id 			= $company_id;
	    $this->file_details 		= $file_details;
		$this->file_status 			= $file_status;
    } 
}
?>