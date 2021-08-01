<?php
include_once("../model/Model.php");
class Controller {
	public $model;
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	public function getMaxID()
	{
		 $stmt = $this->model->select("SELECT 
		 									 MAX(id) id 
		 							   FROM 
                                            financial_results
		 							   WHERE  status ='A'",null);
		 return json_encode(count($stmt)== 0?null:$stmt);    
    }
    public function getISTDateTime()
	{
		if(function_exists('date_default_timezone_set')) {
			date_default_timezone_set("Asia/Kolkata");
		}
		$date = date("Y-m-d");
		$time =  date("H:i:s");
		$resultsPublishDateTime = $date." ".$time;
		return $resultsPublishDateTime;
	}

    public function insertFinancialResultsLinkData($financialResultsLinkData)
    {
        $financialResultsSQL = $this->model->insUpdRecords("INSERT INTO  financial_results_link
            (
                financial_results_id, 
                description,
                current_quarter,
                previous_quarter,
                previous_CQ,
                current_FY,
                previous_FY,
                status
            ) 
            VALUES 
            (   
                :financial_results_id, 
                :description,
                :current_quarter,
                :previous_quarter,
                :previous_CQ,
                :current_FY,
                :previous_FY,
                :status
            )",$financialResultsLinkData);

    }
	public function addFinanceResults()
	{
        if (isset($_POST['isin']))
		{
        	$isin            = $_POST['isin'];
            $resYear         = $_POST['resYear'];
            $finResults      = $_POST['finResults'];
            $periodEnded     = $_POST['periodEnded'];
            $yearEnded       = $_POST['yearEnded'];
            $industry        = $_POST['industry'];
            $resultsType     = $_POST['resultsType'];
            $resultsData     = $_POST['resultsData'];
            $title           = $_POST['title'];
            $resTemplate     = $_POST['resTemplate'];
            $keywords        = $_POST['keywords'];
            $source          = $_POST['source'];
            $category        = $_POST['category'];
            $status          = $_POST['status'];

            $shtotIncome            = $_POST['shtotIncome'];
            $shTotCurrQuarter       = $_POST['shTotCurrQuarter'];
            $shTotPreviousQuarter   = $_POST['shTotPreviousQuarter'];
            $shTotPreviousCQ        = $_POST['shTotPreviousCQ'];
            $shTotCurrentFY         = $_POST['shTotCurrentFY'];
            $shTotPreviousFY        = $_POST['shTotPreviousFY'];

            $shNetProfit            = $_POST['shNetProfit'];
            $shNetCurrQuarter       = $_POST['shNetCurrQuarter'];
            $shNetPreviousQuarter   = $_POST['shNetPreviousQuarter'];
            $shNetPreviousCQ        = $_POST['shNetPreviousCQ'];
            $shNetCurrentFY         = $_POST['shNetCurrentFY'];
            $shNetPreviousFY        = $_POST['shNetPreviousFY'];

            $shEarPerShare          = $_POST['shEarPerShare'];
            $shEarCurrQuarter       = $_POST['shEarCurrQuarter'];
            $shEarPreviousQuarter   = $_POST['shEarPreviousQuarter'];
            $shEarPreviousCQ        = $_POST['shEarPreviousCQ'];
            $shEarCurrentFY         = $_POST['shEarCurrentFY'];
            $shEarPreviousFY        = $_POST['shEarPreviousFY'];

            $bnkGrsNPAAmt               = $_POST['bnkGrsNPAAmt'];
            $bnkGrsNPACurrQuarter       = $_POST['bnkGrsNPACurrQuarter'];
            $bnkGrsNPAPreviousQuarter   = $_POST['bnkGrsNPAPreviousQuarter'];
            $bnkGrsNPAPreviousCQ        = $_POST['bnkGrsNPAPreviousCQ'];

            $bnkNetNPAAmt               = $_POST['bnkNetNPAAmt'];
            $bnkNetNPACurrQuarter       = $_POST['bnkNetNPACurrQuarter'];
            $bnkNetNPAPreviousQuarter   = $_POST['bnkNetNPAPreviousQuarter'];
            $bnkNetNPAPreviousCQ        = $_POST['bnkNetNPAPreviousCQ'];

            $bnkGrsNPAPer               = $_POST['bnkGrsNPAPer'];
            $bnkGrsNPACurrQuarterPer    = $_POST['bnkGrsNPACurrQuarterPer'];
            $bnkGrsNPAPreviousQuarterPer= $_POST['bnkGrsNPAPreviousQuarterPer'];
            $bnkGrsNPAPreviousCQPer     = $_POST['bnkGrsNPAPreviousCQPer'];

            $bnkNetNPAPer               = $_POST['bnkNetNPAPer'];
            $bnkNetNPACurrQuarterPer    = $_POST['bnkNetNPACurrQuarterPer'];
            $bnkNetNPAPreviousQuarterPer= $_POST['bnkNetNPAPreviousQuarterPer'];
            $bnkNetNPAPreviousCQPer     = $_POST['bnkNetNPAPreviousCQPer'];
            
            $bnkRetAsstPer              = $_POST['bnkRetAsstPer'];
            $bnkRetAsstCurrQuarter      = $_POST['bnkRetAsstCurrQuarter'];
            $bnkRetAsstPreviousQuarter  = $_POST['bnkRetAsstPreviousQuarter'];
            $bnkRetAsstPreviousCQ       = $_POST['bnkRetAsstPreviousCQ'];
            
            $bnkCapAdeRat               = $_POST['bnkCapAdeRat'];
            $bnkCapAdeCurrQuarter       = $_POST['bnkCapAdeCurrQuarter'];
            $bnkCapAdePreviousQuarter   = $_POST['bnkCapAdePreviousQuarter'];
            $bnkCapAdePreviousCQ        = $_POST['bnkCapAdePreviousCQ'];

            $newsTamilTemplate          = $_POST['newsTamilTemplate'];
            $newsTemplate               = $_POST['newsTemplate'];

            $financeResultsPublishDateTime = $this->getISTDateTime();

            $financialResultsData =  array ( 'isin'              => $isin,
                                             'insert_date'       => $financeResultsPublishDateTime,
                                             'res_year'          => $resYear,
                                             'financial_results' => $finResults,
                                             'period_ended'      => $periodEnded,
                                             'year_ended'        => $yearEnded,
                                             'industry'          => $industry,
                                             'results_type'      => $resultsType,
                                             'results_data'      => $resultsData,
                                             'title'             => $title,
                                             'results_template'  => $resTemplate,
                                             'keywords'          => $keywords,
                                             'source'            => $source,
                                             'category'          => $category,
                                             'status'        	 => $status
                                            );

            $financialResultsInsertSQL = $this->model->insUpdRecords("INSERT INTO financial_results
                                                                            (
                                                                                isin, 
                                                                                insert_date,
                                                                                res_year,
                                                                                financial_results,
                                                                                period_ended,
                                                                                year_ended,
                                                                                industry,
                                                                                results_type,
                                                                                results_data,
                                                                                title,
                                                                                results_template,
                                                                                keywords,
                                                                                source,
                                                                                category,
                                                                                status
                                                                            ) 
                                                                VALUES 
                                                                            (
                                                                                :isin, 
                                                                                :insert_date,
                                                                                :res_year,
                                                                                :financial_results,
                                                                                :period_ended,
                                                                                :year_ended,
                                                                                :industry,
                                                                                :results_type,
                                                                                :results_data,
                                                                                :title,
                                                                                :results_template,
                                                                                :keywords,
                                                                                :source,
                                                                                :category,
                                                                                :status
                                                                            )",$financialResultsData);
            $maxFinancialResultsID = $this->getMaxID();
            if(!empty($maxFinancialResultsID))
            {
                $maxArray = json_decode( $maxFinancialResultsID, true );
                if(!empty($maxArray))
                {
                    foreach($maxArray as $maxIDInfo) {
                       $financialResultsID = $maxIDInfo['id'];
                    }
                }
            }

            $financialResultsLinkTotData =  array(   'financial_results_id'  =>  $financialResultsID,
                'description'           =>  $shtotIncome,
                'current_quarter'       =>  $shTotCurrQuarter,
                'previous_quarter'      =>  $shTotPreviousQuarter,
                'previous_CQ'           =>  $shTotPreviousCQ,
                'current_FY'            =>  $shTotCurrentFY,
                'previous_FY'           =>  $shTotPreviousFY,
                'status'                =>  'A'
            );
            
            $financialResultsLinkTotInsert = $this->insertFinancialResultsLinkData($financialResultsLinkTotData);

            $financialResultsLinkNetData =  array(   'financial_results_id'  =>  $financialResultsID,
                'description'           =>  $shNetProfit,
                'current_quarter'       =>  $shNetCurrQuarter,
                'previous_quarter'      =>  $shNetPreviousQuarter,
                'previous_CQ'           =>  $shNetPreviousCQ,
                'current_FY'            =>  $shNetCurrentFY,
                'previous_FY'           =>  $shNetPreviousFY,
                'status'                =>  'A'
            );

            $financialResultsLinkNetInsert = $this->insertFinancialResultsLinkData($financialResultsLinkNetData);            
            
            $financialResultsLinkEarData =  array(   'financial_results_id'  =>  $financialResultsID,
                'description'           =>  $shEarPerShare,
                'current_quarter'       =>  $shEarCurrQuarter,
                'previous_quarter'      =>  $shEarPreviousQuarter,
                'previous_CQ'           =>  $shEarPreviousCQ,
                'current_FY'            =>  $shEarCurrentFY,
                'previous_FY'           =>  $shEarPreviousFY,
                'status'                =>  'A'
            );
            
            $financialResultsLinkEarInsert = $this->insertFinancialResultsLinkData($financialResultsLinkEarData);

            $financialResultsLinkBankGrsData =  array(   'financial_results_id'  =>  $financialResultsID,
                'description'           =>  $bnkGrsNPAAmt,
                'current_quarter'       =>  $bnkGrsNPACurrQuarter,
                'previous_quarter'      =>  $bnkGrsNPAPreviousQuarter,
                'previous_CQ'           =>  $bnkGrsNPAPreviousCQ,
                'current_FY'            =>  0,
                'previous_FY'           =>  0,
                'status'                =>  'A'
            );
            
            $financialResultsLinkBankGrsInsert = $this->insertFinancialResultsLinkData($financialResultsLinkBankGrsData);

            $financialResultsLinkBankNetData =  array(   'financial_results_id'  =>  $financialResultsID,
                'description'           =>  $bnkNetNPAAmt,
                'current_quarter'       =>  $bnkNetNPACurrQuarter,
                'previous_quarter'      =>  $bnkNetNPAPreviousQuarter,
                'previous_CQ'           =>  $bnkNetNPAPreviousCQ,
                'current_FY'            =>  0,
                'previous_FY'           =>  0,
                'status'                =>  'A'
            );
            
            $financialResultsLinkBankNetInsert = $this->insertFinancialResultsLinkData($financialResultsLinkBankNetData);

            $financialResultsLinkBankGrsNpaData =  array(   'financial_results_id'  =>  $financialResultsID,
                'description'           =>  $bnkGrsNPAPer,
                'current_quarter'       =>  $bnkGrsNPACurrQuarterPer,
                'previous_quarter'      =>  $bnkGrsNPAPreviousQuarterPer,
                'previous_CQ'           =>  $bnkGrsNPAPreviousCQPer,
                'current_FY'            =>  0,
                'previous_FY'           =>  0,
                'status'                =>  'A'
            );
            
            $financialResultsLinkBankNetGrsNpaInsert = $this->insertFinancialResultsLinkData($financialResultsLinkBankGrsNpaData);

            $financialResultsLinkBankNetNpaPerData =  array(   'financial_results_id'  =>  $financialResultsID,
                'description'           =>  $bnkNetNPAPer,
                'current_quarter'       =>  $bnkNetNPACurrQuarterPer,
                'previous_quarter'      =>  $bnkNetNPAPreviousQuarterPer,
                'previous_CQ'           =>  $bnkNetNPAPreviousCQPer,
                'current_FY'            =>  0,
                'previous_FY'           =>  0,
                'status'                =>  'A'
            );
            
            $financialResultsLinkBankNetNpaPerInsert = $this->insertFinancialResultsLinkData($financialResultsLinkBankNetNpaPerData);

            $financialResultsLinkBankRetAssetPerData =  array(   'financial_results_id'  =>  $financialResultsID,
                'description'           =>  $bnkRetAsstPer,
                'current_quarter'       =>  $bnkRetAsstCurrQuarter,
                'previous_quarter'      =>  $bnkRetAsstPreviousQuarter,
                'previous_CQ'           =>  $bnkRetAsstPreviousCQ,
                'current_FY'            =>  0,
                'previous_FY'           =>  0,
                'status'                =>  'A'
            );
            
            $financialResultsLinkBankRetAssetPerInsert = $this->insertFinancialResultsLinkData($financialResultsLinkBankRetAssetPerData);

            $financialResultsLinkBankCapAdeRateData =  array(   'financial_results_id'  =>  $financialResultsID,
                'description'           =>  $bnkCapAdeRat,
                'current_quarter'       =>  $bnkCapAdeCurrQuarter,
                'previous_quarter'      =>  $bnkCapAdePreviousQuarter,
                'previous_CQ'           =>  $bnkCapAdePreviousCQ,
                'current_FY'            =>  0,
                'previous_FY'           =>  0,
                'status'                =>  'A'
            );
            
            $financialResultsLinkBankCapAdeRateInsert = $this->insertFinancialResultsLinkData($financialResultsLinkBankCapAdeRateData);

            $newsDetailsInsertData = array ( 'isin' => $isin,
            'financial_results_id' => $financialResultsID,
            'news_source_id'       => $source,
            'news_category_id'     => $category,
            'news_title'           => $title,
            'news_message'         => $newsTemplate,
            'news_pub_date'        => $financeResultsPublishDateTime,
            'news_keyword'         => $keywords,
            'news_details_status'  => $status
           );
           $newsResultsInsertSQL = $this->model->insUpdRecords("INSERT INTO  news_details
                                           (
                                               isin, 
                                               financial_results_id,
                                               news_source_id,
                                               news_category_id,
                                               news_title,
                                               news_message,
                                               news_pub_date,
                                               news_keyword,
                                               news_details_status
                                           ) 
                               VALUES 
                                           (
                                               :isin, 
                                               :financial_results_id,
                                               :news_source_id,
                                               :news_category_id,
                                               :news_title,
                                               :news_message,
                                               :news_pub_date,
                                               :news_keyword,
                                               :news_details_status
                                           )",$newsDetailsInsertData);

            $newsTamilDetailsInsertData = array ( 
                'isin'                      => $isin,
                'financial_results_id'      => $financialResultsID,
                'source_id'                 => $source,
                'category_id'               => $category,
                'title'                     => $title,
                'message'                   => $newsTamilTemplate,
                'pub_date'                  => $financeResultsPublishDateTime,
                'keyword'                   => $keywords,
                'status'                    => $status
           );

            $tamilNewsResultsInsertSQL = $this->model->insUpdRecords("INSERT INTO  tamil_news_details
                                           (
                                               isin, 
                                               financial_results_id,
                                               source_id,
                                               category_id,
                                               title,
                                               message,
                                               pub_date,
                                               keyword,
                                               status
                                           ) 
                                            VALUES 
                                           (
                                               :isin, 
                                               :financial_results_id,
                                               :source_id,
                                               :category_id,
                                               :title,
                                               :message,
                                               :pub_date,
                                               :keyword,
                                               :status
                                           )",$newsTamilDetailsInsertData);
            /*header("Location:../view/FinancialResultsView.php");
            exit;*/
  		}	
	}
}
$controller = new Controller();
$addFinanceResults = $controller->addFinanceResults();
?>