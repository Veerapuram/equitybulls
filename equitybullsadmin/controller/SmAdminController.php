<?php
include_once("../model/Model.php");
class Controller {
	public $model;
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	public function listStock()
	{
		$stockList = $this->model->select("SELECT 
													market_id,
													market_date, 
													bse_value, 
													bse_change,
													nse_value,
													nse_change
											  FROM 	
													stock_market_admin",null);
		return json_encode(count($stockList)==0 ? null : $stockList);
	}
	public function addStock($requestData)
	{
		$myDate = DateTime::createFromFormat('m/d/Y', $requestData['marketDate']);
		$requestData['marketDate'] = $myDate->format('Y-m-d');	
		
		$data = array('market_date' => $requestData['marketDate'],
				  'bse_value' => $requestData['bseValue'],
				  'bse_change' => $requestData['bseChange'],
				  'nse_value' => $requestData['nseValue'],
				  'nse_change' => $requestData['nseChange']
	            );
		$stockInsertSQL = $this->model->insUpdRecords("INSERT INTO stock_market_admin
																	(
																	 market_date, 
																	 bse_value,
																	 bse_change,
																	 nse_value,
																	 nse_change
																	 ) 
																VALUES 
																	(
																	 :market_date, 
																	 :bse_value,
																	 :bse_change,
																	 :nse_value,
																	 :nse_change
																	 )",$data);
		header("Location:../view/SmAdminView.php");
		exit;
	}
	public function updStock($requestData)
	{
		$myDate = DateTime::createFromFormat('m/d/Y', $requestData['marketDate']);
		$requestData['marketDate'] = $myDate->format('Y-m-d');

		$data = array($requestData['marketDate'],$requestData['bseValue'],$requestData['bseChange'],$requestData['nseValue'],$requestData['nseChange'],$requestData['marketID']);
        try{		
			$currencyUpdateSQL = $this->model->insUpdRecords("UPDATE stock_market_admin 
															  SET   	
																	market_date = ?, 
																	bse_value = ?,
																	bse_change = ?,
																	nse_value = ?,
																	nse_change = ?
															  WHERE  market_id = ?",$data);
		}catch (Exception $ex) { 
			  $this->error = $ex->getMessage(); 
		}
		header("Location:../view/SmAdminView.php");
		exit;
	}
	public function delStock($requestData)
	{
		$currencyDeleteSQL = $this->model->delRecord("DELETE FROM 
																stock_market_admin
															WHERE 
																market_id  = ?",$requestData['marketID']);
		header("Location:../view/SmAdminView.php");
		exit;
	}	
}

?>