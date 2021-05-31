<?php
include_once("../model/Model.php");
class Controller {
	public $model;
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	public function listExchangeDetails()
	{
		if (isset($_GET['companyISIN']))
		{
        	$companyISIN = $_GET['companyISIN'];
			$companyISIN = implode('","',$companyISIN);
			$companyISIN = str_replace("\\","",json_encode($companyISIN));
			$exchangeList = $this->model->select("(SELECT 
												'BSE' AS tag,
												isincode AS isin,
												company_name,
												close,
												prevclose,
												no_of_shrs,
												no_trades,
												high,
												low,
												net_turnov,
												sc_code,
												industry_name,
												company_keywords
										FROM   company_master, bse_eod, industry_master
										WHERE  isincode = isin
										AND    isin IN (".$companyISIN.")
										AND    company_master.industry_id = industry_master.industry_id
										)
										UNION
										(
										SELECT 
												'NSE' AS tag,
												nse_eod.isin,
												company_name ,
												close ,
												prevclose,
												tottrdqty,
												totaltrades,
												high,
												low,
												tottrdval,
												symbol,
												industry_name,
												company_keywords
										FROM   company_master, nse_eod, industry_master
										WHERE  nse_eod.isin = company_master.isin
										AND    nse_eod.isin IN (".$companyISIN.")
										AND    company_master.industry_id = industry_master.industry_id)
										ORDER BY company_name, tag",null);
			echo json_encode(count($exchangeList)== 0?null:$exchangeList);
		}	
	}
}
$controller = new Controller();
$exchangeList = $controller->listExchangeDetails();
?>