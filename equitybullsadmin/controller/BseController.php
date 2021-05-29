<?php
include_once("../model/Model.php");
class Controller {
	public $model;
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	public function listBse()
	{
		$bseList = $this->model->select("SELECT 
													isin, 
													bse_security_code, 
													bse_security_id,
													bse_group,
													bse_face_value,
													bse_status
											FROM 	
													bse_master",null);
		return json_encode(count($bseList)==0 ? null : $bseList);
	}
	public function addBse($requestData)
	{
		$data =  array ( 'isin' => $requestData['bseISIN'],
				  'bse_security_code' => $requestData['bseSecCode'],
				  'bse_security_id' => $requestData['bseSecID'],
				  'bse_group' => $requestData['bseGroup'],
				  'bse_face_value' => $requestData['bseFaceValue'],
				  'bse_status' => $requestData['status']
	            );
		 $bseInsertSQL = $this->model->insUpdRecords("INSERT INTO bse_master
																	(
																	 isin, 
																	 bse_security_code,
																	 bse_security_id,
																	 bse_group,
																	 bse_face_value,
																	 bse_status
																	 ) 
																VALUES 
																	(
																	 :isin, 
																	 :bse_security_code,
																	 :bse_security_id,
																	 :bse_group,
																	 :bse_face_value,
																	 :bse_status
																	 )",$data);
		header("Location:../view/BseView.php");
		exit;
	}
	public function updBse($requestData)
	{
		$data = array($requestData['bseISIN'],$requestData['bseSecCode'],$requestData['bseSecID'],$requestData['bseGroup'],$requestData['bseFaceValue'],$requestData['status'],$requestData['bseISIN']);
        try{		
			$bseUpdateSQL = $this->model->insUpdRecords("UPDATE bse_master 
														 SET   	
																	isin = ?,
																	bse_security_code = ?,
																	bse_security_id = ?,
																	bse_group = ?,
																	bse_face_value = ?,
																	bse_status = ?
															 WHERE  isin = ?",$data);
		}catch (Exception $ex) { 
			  $this->error = $ex->getMessage(); 
		}
		header("Location:../view/BseView.php");
		exit;
	}
	public function delBse($requestData)
	{
		$bseDeleteSQL = $this->model->delRecord("DELETE FROM 
															bse_master
														WHERE 
															isin = ?",$requestData['bseISIN']);
		header("Location:../view/BseView.php");
		exit;
	}	
}

?>