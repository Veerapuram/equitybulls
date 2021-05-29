<?php
include_once("../model/Model.php");
class Controller {
	public $model;
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	public function listMetals()
	{
		$metalsList = $this->model->select("SELECT 
													gold_silver_id ,
													gold_silver_date, 
													gold_price, 
													silver_price
											  FROM 	
													gold_silver_admin",null);
		return json_encode(count($metalsList)==0 ? null : $metalsList);
	}
	public function addMetals($requestData)
	{
		$myDate = DateTime::createFromFormat('m/d/Y', $requestData['metalDate']);
		$requestData['metalDate'] = $myDate->format('Y-m-d');	
		
		$data = array( 'gold_silver_date' => $requestData['metalDate'],
				  'gold_price' => $requestData['goldPrice'],
				  'silver_price' => $requestData['silverPrice']
	            );
        
		
		$metalInsertSQL = $this->model->insUpdRecords("INSERT INTO gold_silver_admin
																	(
																	 gold_silver_date, 
																	 gold_price,
																	 silver_price
																	 ) 
																VALUES 
																	(
																	 :gold_silver_date, 
																	 :gold_price,
																	 :silver_price
																	 )",$data);
		header("Location:../view/GoldSilverView.php");
		exit;
	}
	public function updMetals($requestData)
	{
		$myDate = DateTime::createFromFormat('m/d/Y', $requestData['metalDate']);
		$requestData['metalDate'] = $myDate->format('Y-m-d');

		$data = array($requestData['metalDate'],$requestData['goldPrice'],$requestData['silverPrice'],$requestData['metalID']);
        try{		
			$metalUpdateSQL = $this->model->insUpdRecords("UPDATE gold_silver_admin 
															  SET   	
																	gold_silver_date = ?, 
																	gold_price = ?,
																	silver_price = ?
															  WHERE  gold_silver_id  = ?",$data);
		}catch (Exception $ex) { 
			  $this->error = $ex->getMessage(); 
		}
		header("Location:../view/GoldSilverView.php");
		exit;
	}
	public function delMetals($requestData)
	{
		$metalDeleteSQL = $this->model->delRecord("DELETE FROM 
																gold_silver_admin
															WHERE 
																gold_silver_id   = ?",$requestData['metalID']);
		header("Location:../view/GoldSilverView.php");
		exit;
	}	
}

?>