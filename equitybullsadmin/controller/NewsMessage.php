<?php
include_once("../model/Model.php");
class Controller {
	public $model;
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	public function listNewsMessage()
	{
		if (isset($_GET['companyISIN']))
		{
        	$companyISIN = $_GET['companyISIN'];
			$companyISIN = implode('","',$companyISIN);
			$companyISIN = str_replace("\\","",json_encode($companyISIN));
			$newsMessage = $this->model->select("SELECT 
														news_message
												  FROM  
												  		news_details
												  WHERE 
													    isin IN (".$companyISIN.")",null);
			echo json_encode(count($newsMessage)== 0?null:$newsMessage);
		}	
	}
}
$controller = new Controller();
$newsMessageResult = $controller->listNewsMessage();
?>