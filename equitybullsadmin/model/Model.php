<?php
include_once("BseModel.php");
include_once("NseModel.php");
include_once("IndustryModel.php");
include_once("NewsSourceModel.php");
include_once("CurrencyModel.php");
include_once("SmAdminModel.php");
include_once("GoldSilverModel.php");
include_once("NewsCategory.php");
include_once("CompanyModel.php");
include_once("FileModel.php");
class Model {
	
		  public $error = "";
		  private $pdo = null;
		  private $stmt = null;
		  function __construct () {
			try {
			  $this->pdo = new PDO(
				"mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET, 
				DB_USER, DB_PASSWORD, array(
				  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				  PDO::MYSQL_ATTR_FOUND_ROWS => true,
				  PDO::ATTR_EMULATE_PREPARES   => false,
				)
			  );
			} catch (Exception $ex) { die($ex->getMessage()); }
		  }

		  function __destruct(){
			if ($this->stmt!==null) { $this->stmt = null; }
			if ($this->pdo!==null) { $this->pdo = null; }
		  }

		  public function select($sql, $cond=null){
			$result = false;
			try {
			  $this->stmt = $this->pdo->prepare($sql);
			  $this->stmt->execute($cond);
			  $result = $this->stmt->fetchAll();
			  return $result;
			} catch (Exception $ex) { 
			  $this->error = $ex->getMessage(); 
			  return false;
			}
		  }

		  public function insUpdRecords($sql,$data){
			try {
			  $this->stmt = $this->pdo->prepare($sql);
			  $result = $this->stmt->execute($data);
			  $count = $this->stmt->rowCount();
			  //$log_file = getcwd()."\\model.log";
			  //error_log("\n[" . date("Y-m-d H:i:s") . "] SQL = ".$sql.", Result = ". $result .", Count = ".$count, 3, $log_file);
			} catch (Exception $ex) { 
			  $this->error = $ex->getMessage(); 
			  return false;
			}
		  }
		  
		  public function delRecord($sql,$data){
			try {
			  $this->stmt = $this->pdo->prepare($sql);
			  $this->stmt->bindParam(1, $data);
			  $result = $this->stmt->execute();
			  $count = $this->stmt->rowCount();
			  $log_file = getcwd()."\\model.log";
			  //error_log("\n[" . date("Y-m-d H:i:s") . "] SQL = ".$sql.", Result = ". $result .", Count = ".$count, 3, $log_file);
			} catch (Exception $ex) { 
			  $this->error = $ex->getMessage(); 
			  return false;
			}
		  }
}
		define('DB_HOST', '208.91.198.197');
		define('DB_NAME', 'eqbulls');
		define('DB_CHARSET', 'utf8');
		define('DB_USER', 'eqbulls');
		define('DB_PASSWORD', 'd1S~9nx9');
?>