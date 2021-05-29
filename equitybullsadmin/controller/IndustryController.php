<?php
include_once("../model/Model.php");
class Controller {
	public $model;
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	public function listIndustry()
	{
		$industryList = $this->model->select("SELECT 
													industry_id, 
													industry_name, 
													industry_status
											  FROM 	
													industry_master",null);
		return json_encode(count($industryList)==0 ? null : $industryList);
	}
	public function addIndustry($requestData)
	{
		$data = array( 'industry_name' => $requestData['industryName'],
				  'industry_status' => $requestData['status']
	            );
		$industryInsertSQL = $this->model->insUpdRecords("INSERT INTO industry_master
																	(
																	 industry_name, 
																	 industry_status
																	 ) 
																VALUES 
																	(
																	 :industry_name, 
																	 :industry_status
																	 )",$data);
		header("Location:../view/industryView.php");
		exit;
	}
	public function updIndustry($requestData)
	{
		$data = array($requestData['industryName'],$requestData['status'],$requestData['industryID']);
		print_r($data);
        try{		
			$industryUpdateSQL = $this->model->insUpdRecords("UPDATE industry_master 
														 SET   	
																	industry_name = ?, 
																	industry_status = ?
															 WHERE  industry_id  = ?",$data);
		}catch (Exception $ex) { 
			  $this->error = $ex->getMessage(); 
		}
		header("Location:../view/industryView.php");
		exit;
	}
	public function delIndustry($requestData)
	{
		$industryDeleteSQL = $this->model->delRecord("DELETE FROM 
																industry_master
															WHERE 
																industry_id  = ?",$requestData['industryID']);
		header("Location:../view/industryView.php");
		exit;
	}	
}

?>