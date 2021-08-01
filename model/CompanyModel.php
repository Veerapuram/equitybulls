<?php
class companyModel {
					public $company_id;
					public $company_name;
					public $isin;
					public $industry_id;
					public $bse_nse_tag;
					public $company_about;
					public $company_twitter_id;
					public $company_website;
					public $company_address;
					public $company_phone;
					public $company_email;
					public $company_keywords;
					public $company_others;
					public $company_status;
	public function __construct($company_id, $company_name,$isin,$industry_id,$bse_nse_tag,$company_about,$company_twitter_id,
								$company_website,$company_address,$company_phone,$company_email,$company_keywords,$company_others,$company_status)  
    {  
		$this->company_id			= $company_id;
		$this->company_name			= $company_name;
        $this->isin 				= $isin;
	    $this->industry_id 			= $industry_id;
		$this->bse_nse_tag 			= $bse_nse_tag;
        $this->company_about 		= $company_about;
	    $this->company_twitter_id 	= $company_twitter_id;
		$this->company_website 		= $company_website;
		$this->company_address 		= $company_address;
		$this->company_phone 		= $company_phone;
		$this->company_email 		= $company_email;
		$this->company_keywords 	= $company_keywords;
		$this->company_others 		= $company_others;
		$this->company_status 		= $company_status;
    } 
}
?>