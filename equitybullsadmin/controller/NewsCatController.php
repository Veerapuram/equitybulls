<?php
include_once("../model/Model.php");
class Controller {
	public $model;
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	public function listNewsCat()
	{
		$newsCatList = $this->model->select("SELECT 
													news_category_id, 
													news_category_name, 
													news_category_status 
											FROM 	
													news_categories",null);
		return json_encode(count($newsCatList)==0 ? null : $newsCatList);
	}
	public function addNewsCat($requestData)
	{
		$data = array( 'news_category_name' => $requestData['categoryName'],
				  'news_category_status' => $requestData['categoryStatus']
	            );
		$newsCatInsertSQL = $this->model->insUpdRecords("INSERT INTO news_categories 
																	(news_category_name, 
																	 news_category_status) 
																VALUES 
																	(:news_category_name, 
																	 :news_category_status)",$data);
		header("Location:../view/NewsCatView.php");
		exit;
	}
	public function updNewsCat($requestData)
	{
		$data = array($requestData['categoryName'],$requestData['categoryStatus'],$requestData['categoryID']);
		print_r($data);
        try{		
			$newsCatUpdateSQL = $this->model->insUpdRecords("UPDATE news_categories 
															 SET    news_category_name = ?, 
																	news_category_status = ? 
															 WHERE  news_category_id = ?",$data);
		}catch (Exception $ex) { 
			  $this->error = $ex->getMessage(); 
		}
		header("Location:../view/NewsCatView.php");
		exit;
	}
	public function delNewsCat($requestData)
	{
		$newsCatDeleteSQL = $this->model->delRecord("DELETE FROM 
																news_categories 
															WHERE 
																news_category_id = ?",$requestData['categoryID']);
		header("Location:../view/NewsCatView.php");
		exit;
	}	
}

?>