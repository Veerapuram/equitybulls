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
												   isin,
												   company_name
											  FROM company_master
											  WHERE 
												    company_status = 'A'",null);
		return json_encode(count($companyList)==0 ? null : $companyList);
	}
	public function listNewsCat()
	{
		$newsCatList = $this->model->select("SELECT
												   news_category_id,
												   news_category_name
											  FROM news_categories
											  WHERE 
												   news_category_status = 'A'",null);
		return json_encode(count($newsCatList)==0 ? null : $newsCatList);
	}
	public function listNewsSrc()
	{
		$newsSrcList = $this->model->select("SELECT
												   news_source_id,
												   news_source_name
											  FROM news_source
											  WHERE 
												   news_source_status = 'A'",null);
		return json_encode(count($newsSrcList)==0 ? null : $newsSrcList);
	}

	public function getISTDateTime()
	{
		if(function_exists('date_default_timezone_set')) {
			date_default_timezone_set("Asia/Kolkata");
		}
		$date = date("Y-m-d");
		$time =  date("H:i:s");
		$newsPublishDateTime = $date." ".$time;
		return $newsPublishDateTime;
	}

	public function addFinancialResults($requestData)
	{
		if(!isset($requestData['test']))
			echo "Request Data is invalid for test";
		else	
		{
			echo "testData :".$requestData['test'];
			print_r("test ".$requestData['test']);		
		}
		print_r($requestData);
		$isin = "";
		$isinMultiple = "";
		$groupImage = "";
		if(isset($_FILES))
		{
			$uploaddir 	= "../uploads/";
			$groupImage = basename($_FILES['groupImage']['name']);
			move_uploaded_file($_FILES['groupImage']['tmp_name'], $uploaddir.$groupImage);
		}	
		if(isset($requestData["company"]))
		{
			if(count($requestData["company"]) == 1)
			{
				foreach ($requestData["company"] as $isin) 
  					$isin = $isin;
			}
			if(count($requestData["company"]) > 1)	
					$isinMultiple = implode(",",$requestData["company"]);
		}
		$newsPublishDateTime = $this->getISTDateTime();
		$data =  array ( 'isin' 					=> $isin,
						 'isin_multiple' 			=> $isinMultiple,
						 'news_source_id' 			=> $requestData['source'],
						 'news_category_id' 		=> $requestData['category'],
						 'file_individual' 			=> $requestData['newsImage'],
						 'file_group' 				=> $groupImage,
						 'news_title' 				=> $requestData['newsTitle'],
						 'news_message' 			=> $requestData['newsMessage'],
						 'news_pub_date'			=> $newsPublishDateTime,
						 'news_keyword' 			=> $requestData['keywords'],
						 'news_description' 		=> $requestData['newsDescription'],
						 'news_status' 				=> $requestData['newsStatus'],
						 'news_details_status' 		=> $requestData['status'],
			            );
		 $newsInsertSQL = $this->model->insUpdRecords("INSERT INTO news_details
																	(
																	 isin, 
																	 isin_multiple,
																	 news_source_id,
																	 news_category_id,
																	 file_individual,
																	 file_group,
																	 news_title,
																	 news_message,
																	 news_pub_date,
																	 news_keyword,
																	 news_description,
																	 news_status,
																	 news_details_status
																	 ) 
																VALUES 
																	(
																	 :isin, 
																	 :isin_multiple,
																	 :news_source_id,
																	 :news_category_id,
																	 :file_individual,
																	 :file_group,
																	 :news_title,
																	 :news_message,
																	 :news_pub_date,
																	 :news_keyword,
																	 :news_description,
																	 :news_status,
																	 :news_details_status
																	 )",$data);
		//header("Location:../view/NewsDetailsView.php");
		//exit;
	}
	public function updNewsDetail($requestData)
	{	
		$isin = "";
		$isinMultiple = "";
		$groupImage = "";
		$newsUpdateDateTime = "0000:00:00 00:00:00";
		if($requestData['newsID'] > 287538)
		{
			$newsUpdateDateTime = $this->getISTDateTime();
		}	
		if(isset($_FILES))
		{
			$uploaddir 	= "../uploads/";
			$file_pointer = $requestData['dispImgName'];
			$isin = "";
			echo $file_pointer;
			if (file_exists($file_pointer) && ($file_pointer != ""))
				unlink($uploaddir.$file_pointer);
			$groupImage = basename($_FILES['groupImage']['name']);
			move_uploaded_file($_FILES['groupImage']['tmp_name'], $uploaddir.$groupImage);
		}
		else
		{
			$groupImage = (count($requestData["company"]) >1 )?$requestData['dispImgName']:"";
		}	
		if(isset($requestData["company"]))
		{
			if(count($requestData["company"]) == 1)
			{
				foreach ($requestData["company"] as $isin) 
  					$isin = $isin;
			}
			if(count($requestData["company"]) > 1)	
					$isinMultiple = implode(",",$requestData["company"]);
		}

		$data =   array(	$isin, 
							$isinMultiple,
							$requestData['source'],
							$requestData['category'],
							$requestData['newsImage'],
							$groupImage,
							$requestData['newsTitle'],
							$requestData['newsMessage'],
							$newsUpdateDateTime,
					  		$requestData['keywords'],
							$requestData['newsDescription'],
							$requestData['newsStatus'],
							$requestData['status'],
							$requestData['newsID']
						);
        try{		
			$newsUpdateSQL = $this->model->insUpdRecords("UPDATE news_details 
															 SET     isin = ?, 
																	 isin_multiple = ?,
																	 news_source_id = ?,
																	 news_category_id = ?,
																	 file_individual = ?,
																	 file_group = ?,
																	 news_title = ?,
																	 news_message = ?,
																	 news_upd_date = ?,
																	 news_keyword = ?,
																	 news_description = ?,
																	 news_status = ?,
																	 news_details_status = ?
															 WHERE   news_id = ?",$data);
		}catch (Exception $ex) { 
			  $this->error = $ex->getMessage(); 
		}
		header("Location:../view/NewsDetailsView.php");
		exit;
	}
	public function delNewsDetail($requestData)
	{
		$file_pointer = "../uploads/".$requestData['dispImgName'];
		unlink($file_pointer);

		$newsDeleteSQL = $this->model->delRecord("DELETE FROM 
															news_details
														WHERE 
															news_id = ?",$requestData['newsID']);
		header("Location:../view/NewsDetailsView.php");
		exit;
	}	
}

?>