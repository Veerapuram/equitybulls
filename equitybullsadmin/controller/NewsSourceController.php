<?php
include_once("../model/Model.php");
class Controller {
	public $model;
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	public function listNewsSource()
	{
		$newsSourceList = $this->model->select("SELECT 
													news_source_id, 
													news_source_name, 
													news_source_status
											  FROM 	
													news_source",null);
		return json_encode(count($newsSourceList)==0 ? null : $newsSourceList);
	}
	public function addNewsSource($requestData)
	{
		$data = array( 'news_source_name' => $requestData['newsSource'],
				  'news_source_status' => $requestData['status']
	            );
		$newsSourceInsertSQL = $this->model->insUpdRecords("INSERT INTO news_source
																	(
																	 news_source_name, 
																	 news_source_status
																	 ) 
																VALUES 
																	(
																	 :news_source_name, 
																	 :news_source_status
																	 )",$data);
		header("Location:../view/NewsSourceView.php");
		exit;
	}
	public function updNewsSource($requestData)
	{
		$data = array($requestData['newsSource'],$requestData['status'],$requestData['newsSourceID']);
		print_r($data);
        try{		
			$newsSourceUpdateSQL = $this->model->insUpdRecords("UPDATE news_source 
														 SET   	
																	news_source_name = ?, 
																	news_source_status = ?
															 WHERE  news_source_id  = ?",$data);
		}catch (Exception $ex) { 
			  $this->error = $ex->getMessage(); 
		}
		header("Location:../view/NewsSourceView.php");
		exit;
	}
	public function delNewsSource($requestData)
	{
		$newsSourceDeleteSQL = $this->model->delRecord("DELETE FROM 
																news_source
															WHERE 
																news_source_id  = ?",$requestData['newsSourceID']);
		header("Location:../view/NewsSourceView.php");
		exit;
	}	
}

?>