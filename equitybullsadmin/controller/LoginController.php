<?php
include_once("model/Model.php");
class Controller {
	public $model;
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	public function loginController($email,$password)
	{
		$loginList = $this->model->select("SELECT 
												 email,
												 password,
												 count(*) as count
											FROM 	
												 login
											WHERE   
												 email ='".$email."' AND password = '".$password."'",null);
		return json_encode(count($loginList)== 0?null:$loginList);
	}

}

?>