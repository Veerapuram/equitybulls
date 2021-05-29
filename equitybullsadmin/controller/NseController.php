<?php
include_once("../model/Model.php");
class Controller {
	public $model;
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	public function listNse()
	{
		$bseList = $this->model->select("SELECT 
													isin, 
													nse_symbol, 
													nse_dol,
													nse_puv,
													nse_face_value,
													nse_status
											FROM 	
													nse_master",null);
		return json_encode(count($bseList)==0 ? null : $bseList);
	}
	public function addNse($requestData)
	{
		$data = array( 'isin' => $requestData['nseISIN'],
				  'nse_symbol' => $requestData['nseSymbol'],
				  'nse_dol' => $requestData['nseDOL'],
				  'nse_puv' => $requestData['nsePUV'],
				  'nse_face_value' => $requestData['nseFaceValue'],
				  'nse_status' => $requestData['status']
	            );
		$nseInsertSQL = $this->model->insUpdRecords("INSERT INTO nse_master
																	(
																	 isin, 
																	 nse_symbol,
																	 nse_dol,
																	 nse_puv,
																	 nse_face_value,
																	 nse_status
																	 ) 
																VALUES 
																	(
																	 :isin, 
																	 :nse_symbol,
																	 :nse_dol,
																	 :nse_puv,
																	 :nse_face_value,
																	 :nse_status
																	 )",$data);
		header("Location:../view/NseView.php");
		exit;
	}
	public function updNse($requestData)
	{
		$data = array($requestData['nseISIN'],$requestData['nseSymbol'],$requestData['nseDOL'],$requestData['nsePUV'],$requestData['nseFaceValue'],$requestData['status'],$requestData['nseISIN']);
        try{		
			$nseUpdateSQL = $this->model->insUpdRecords("UPDATE nse_master 
														 SET   	
																	isin = ?, 
																	nse_symbol = ?,
																	nse_dol = ?,
																	nse_puv = ?,
																	nse_face_value = ?,
																	nse_status = ?
															 WHERE  isin = ?",$data);
		}catch (Exception $ex) { 
			  $this->error = $ex->getMessage(); 
		}
		header("Location:../view/NseView.php");
		exit;
	}
	public function delNse($requestData)
	{
		$nseDeleteSQL = $this->model->delRecord("DELETE FROM 
																nse_master
															WHERE 
																isin = ?",$requestData['nseISIN']);
		header("Location:../view/NseView.php");
		exit;
	}	
}

?>