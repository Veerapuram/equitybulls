<?php
include_once("../model/Model.php");
class Controller {
	public $model;
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	public function listCurrency()
	{
		$currencyList = $this->model->select("SELECT 
													currency_id,
													currency_date, 
													currency_us_value, 
													currency_euro_value,
													currency_uk_value,
													currency_yen_value
											  FROM 	
													currency_master",null);
		return json_encode(count($currencyList)==0 ? null : $currencyList);
	}
	public function addCurrency($requestData)
	{
		$myDate = DateTime::createFromFormat('m/d/Y', $requestData['currencyDate']);
		$requestData['currencyDate'] = $myDate->format('Y-m-d');	
		$data = array( 'currency_date' => $requestData['currencyDate'],
				  'currency_us_value' => $requestData['currencyUS'],
				  'currency_euro_value' => $requestData['currencyEuro'],
				  'currency_uk_value' => $requestData['currencyPound'],
				  'currency_yen_value' => $requestData['currencyYen']
	            );
		$currencyInsertSQL = $this->model->insUpdRecords("INSERT INTO currency_master
																	(
																	 currency_date, 
																	 currency_us_value,
																	 currency_euro_value,
																	 currency_uk_value,
																	 currency_yen_value
																	 ) 
																VALUES 
																	(
																	 :currency_date, 
																	 :currency_us_value,
																	 :currency_euro_value,
																	 :currency_uk_value,
																	 :currency_yen_value
																	 )",$data);
		header("Location:../view/CurrencyView.php");
		exit;
	}
	public function updCurrency($requestData)
	{
		$myDate = DateTime::createFromFormat('m/d/Y', $requestData['currencyDate']);
		$requestData['currencyDate'] = $myDate->format('Y-m-d');
		$data = array($requestData['currencyDate'],$requestData['currencyUS'],$requestData['currencyEuro'],$requestData['currencyPound'],$requestData['currencyYen'],$requestData['currencyID']);
        try{		
			$currencyUpdateSQL = $this->model->insUpdRecords("UPDATE currency_master 
															  SET   	
																	currency_date = ?, 
																	currency_us_value = ?,
																	currency_euro_value = ?,
																	currency_uk_value = ?,
																	currency_yen_value = ?
															  WHERE  currency_id  = ?",$data);
		}catch (Exception $ex) { 
			  $this->error = $ex->getMessage(); 
		}
		header("Location:../view/CurrencyView.php");
		exit;
	}
	public function delCurrency($requestData)
	{
		$currencyDeleteSQL = $this->model->delRecord("DELETE FROM 
																currency_master
															WHERE 
																currency_id  = ?",$requestData['currencyID']);
		header("Location:../view/CurrencyView.php");
		exit;
	}	
}

?>