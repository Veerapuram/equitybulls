<?php
include_once("../model/Model.php");
class Controller {
	public $model;
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	
	public function listProductImages()
	{
		$productImagesList = $this->model->select("SELECT 
														  file_id,
														  company_isin,
													      company_name,
														  file_details,
														  file_status
												   FROM 	
														  company_master a, file_handler b
												   WHERE  company_isin = isin 
												   AND    a.company_status='A'",null);
												   
		return json_encode(count($productImagesList)== 0?null:$productImagesList);
	}
	
	public function listCompany()
	{
		$companyList = $this->model->select("SELECT 
													isin,
													company_name
											FROM 	
													company_master
											WHERE   company_status='A'",null);
		return json_encode(count($companyList)== 0?null:$companyList);
	}
	
	public function addProductImages($requestData)
	{
		$targetDir  = "../uploads/"; 
		$allowTypes = array('jpg','png','jpeg','gif'); 
		$fileNames  = array_filter($_FILES['productsImage']['name']);
		if(!empty($fileNames))
		{ 
			foreach($_FILES['productsImage']['name'] as $key=>$val)
			{ 
				$fileName = basename($_FILES['productsImage']['name'][$key]); 
				$targetFilePath = $targetDir . $fileName; 
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
				if(in_array($fileType, $allowTypes))
				{ 
					if(move_uploaded_file($_FILES["productsImage"]["tmp_name"][$key], $targetFilePath))
					{ 
						$data = array(	'company_isin'    => $requestData['company'],
										'file_details'    => $fileName,
										'file_status'     => $requestData['status']);
						$productImageInsertSQL = $this->model->insUpdRecords("INSERT INTO file_handler
																	(
																		company_isin,
																		file_details,
																		file_status
																	 ) 
																VALUES 
																	(
																		:company_isin,
																		:file_details,
																		:file_status
																	)",$data);						
					}					
                } 
            } 
        } 
		header("Location:../view/ProductImageView.php");
		exit;
	}
	public function updProductImages($requestData)
	{
		$targetDir  = "../uploads/"; 
		$allowTypes = array('jpg','png','jpeg','gif'); 
		$fileNames  = array_filter($_FILES['productsImage']['name']);
		if(!empty($fileNames))
		{ 
			foreach($_FILES['productsImage']['name'] as $key=>$val)
			{ 
				$fileName = basename($_FILES['productsImage']['name'][$key]); 
				$targetFilePath = $targetDir . $fileName; 
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
				if(in_array($fileType, $allowTypes))
				{ 
					if(move_uploaded_file($_FILES["productsImage"]["tmp_name"][$key], $targetFilePath))
					{ 
						$data = array($requestData['company'],$fileName,$requestData['status'],$requestData['fileID']);
										
						$productImageUpdateSQL = $this->model->insUpdRecords("UPDATE file_handler
																			  SET    
																					 company_isin = ?,
																					 file_details = ?,
																					 file_status = ?
																			  WHERE 
																					 file_id = ?", $data);
						$file_pointer = "../uploads/".$requestData['dispImgName'];
						unlink($file_pointer);
					}					
                } 
            } 
        } 
		else
		{
						$data = array( $requestData['company'],$requestData['dispImgName'],$requestData['status'],$requestData['fileID']);
						$productImageUpdateSQL = $this->model->insUpdRecords("UPDATE file_handler
																			  SET    
																					 company_id = ?,
																					 file_details = ?,
																					 file_status = ?
																			  WHERE 
																					 file_id = ?", $data);
																					 
			
		}
	
		header("Location:../view/ProductImageView.php");
		exit;
	}
	public function delProductImages($requestData)
	{
		$file_pointer = "../uploads/".$requestData['dispImgName'];
		unlink($file_pointer);
    	$productImagesDeleteSQL = $this->model->delRecord("DELETE FROM 
																  file_handler
															WHERE 
															file_id = ?",$requestData['fileID']);
		header("Location:../view/ProductImageView.php");
		exit;
	}	
}

?>