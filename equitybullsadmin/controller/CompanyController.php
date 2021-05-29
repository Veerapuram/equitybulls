<?php
include_once("../model/Model.php");
class Controller {
	public $model;
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	public function listCompany()
	{
		$companyList = $this->model->select("SELECT 
													company_id,
													company_name,
													isin, 
													industry_master.industry_id AS industry_id, 
													industry_name,
													bse_nse_tag,
													company_about,
													company_twitter_id,
													company_website,
													company_address,
													company_phone,
													company_email,
													company_keywords,
													company_others,
													company_status
											FROM 	
													company_master, industry_master
											WHERE   company_master.industry_id = industry_master.industry_id",null);
		return json_encode(count($companyList)== 0?null:$companyList);
	}
	
	public function listISIN()
	{
		$isinList = $this->model->select("SELECT
												 isin 
										  FROM   bse_master 
										  WHERE  isin 
										  NOT IN ( SELECT isin 
										           FROM company_master 
												 )
										  AND    bse_status = 'A'				
										  UNION 
										  SELECT
												 isin 
										  FROM   nse_master 
										  WHERE  isin 
										  NOT IN ( 
												   SELECT 
												          isin 
												   FROM   company_master 
												  )
										 AND    nse_status = 'A'",null);
		return json_encode(count($isinList)==0 ? null : $isinList);
	}
	
	public function listIndustry()
	{
		$industryList = $this->model->select("SELECT
												   industry_id,
												   industry_name,
												   industry_status
											  FROM industry_master
											  WHERE 
												    industry_status = 'A'",null);
		return json_encode(count($industryList)==0 ? null : $industryList);
	}
	
	public function addCompany($requestData)
	{
		$data =  array ( 'company_name' 		=> $requestData['companyName'],
						 'isin' 				=> $requestData['isin'],
						 'industry_id' 			=> $requestData['industry'],
						 'bse_nse_tag' 			=> $requestData['bse_nse_tag'],
						 'company_about' 		=> $requestData['aboutCompany'],
						 'company_twitter_id' 	=> $requestData['companyTwitterURL'],
						 'company_website' 		=> $requestData['companyURL'],
						 'company_address' 		=> $requestData['companyAddress'],
						 'company_phone' 		=> $requestData['companyContactNo'],
						 'company_email' 		=> $requestData['companyEmailAddress'],
						 'company_keywords' 	=> $requestData['companyKeywords'],
						 'company_others' 		=> $requestData['others'],
						 'company_status' 		=> $requestData['status']
	            );
		 $companyInsertSQL = $this->model->insUpdRecords("INSERT INTO company_master
																	(
																	 company_name, 
																	 isin,
																	 industry_id,
																	 bse_nse_tag,
																	 company_about,
																	 company_twitter_id,
																	 company_website,
																	 company_address,
																	 company_phone,
																	 company_email,
																	 company_keywords,
																	 company_others,
																	 company_status
																	 ) 
																VALUES 
																	(
																	 :company_name, 
																	 :isin,
																	 :industry_id,
																	 :bse_nse_tag,
																	 :company_about,
																	 :company_twitter_id,
																	 :company_website,
																	 :company_address,
																	 :company_phone,
																	 :company_email,
																	 :company_keywords,
																	 :company_others,
																	 :company_status
																	 )",$data);
		header("Location:../view/CompanyView.php");
		exit;
	}
	public function updCompany($requestData)
	{
		if(!isset($requestData['isin']))
		{
			$requestData['isin'] = $requestData['isinUpd'];
		}

		$data = array($requestData['companyName'], $requestData['isin'],$requestData['industry'],$requestData['bse_nse_tag'],$requestData['aboutCompany'],
					  $requestData['companyTwitterURL'],$requestData['companyURL'],$requestData['companyAddress'],$requestData['companyContactNo'],
					  $requestData['companyEmailAddress'],$requestData['companyKeywords'],$requestData['others'],$requestData['status'],$requestData['companyID']);

        try{		
			$companyUpdateSQL = $this->model->insUpdRecords("UPDATE company_master 
															 SET   	
																	company_name = ?, 
																	isin = ?,
																	industry_id = ?,
																	bse_nse_tag = ?,
																	company_about = ?,
																	company_twitter_id = ?,
																	company_website = ?,
																	company_address = ?,
																	company_phone = ?,
																	company_email = ?,
																	company_keywords = ?,
																	company_others = ?,
																	company_status = ?
															 WHERE  company_id = ?",$data);
		}catch (Exception $ex) { 
			  $this->error = $ex->getMessage(); 
		}
		header("Location:../view/CompanyView.php");
		exit;
	}
	public function delCompany($requestData)
	{
		$companyDeleteSQL = $this->model->delRecord("DELETE FROM 
															company_master
														WHERE 
															company_id = ?",$requestData['companyID']);
		header("Location:../view/CompanyView.php");
		exit;
	}	
}

?>