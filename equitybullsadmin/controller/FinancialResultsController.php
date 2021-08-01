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
											  FROM company_maSter
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
	public function listFinancialResults()
	{
		$finSrcList = $this->model->select('SELECT 
												  fn.id                AS fnid,
												  fn.isin              AS isin,
												  fn.insert_date       AS insertDate,
												  fn.update_date       AS updateDate,
												  fn.res_year          AS resYear,
												  fn.financial_results AS financialResults,
												  fn.period_ended      AS periodEnded,
												  fn.year_ended        AS yearEnded,
												  fn.industry          AS industry,
												  fn.results_type      AS resultsType,
												  fn.results_data      AS resultsData,
												  fn.title             AS title,
												  fn.results_template  AS resultsTemplate,
												  fn.keywords          AS keywords,
												  fn.source            AS source,
												  fn.category          AS category,
												  fn.status            AS fnStatus,
												  fl.id                AS flid,
												  CASE  WHEN description = "SH_TOT_INCOME"    THEN "SH_TOT_INCOME" 	  END AS shTotIncome, 
												  CASE  WHEN description = "SH_TOT_INCOME"    THEN current_quarter    END AS shTotCurrQuarter, 
												  CASE  WHEN description = "SH_TOT_INCOME"    THEN previous_quarter   END AS shTotPreviousQuarter,
												  CASE  WHEN description = "SH_TOT_INCOME"    THEN previous_CQ        END AS shTotPreviousCQ, 
												  CASE  WHEN description = "SH_TOT_INCOME"    THEN current_FY         END AS shTotCurrentFY, 
												  CASE  WHEN description = "SH_TOT_INCOME"    THEN previous_FY        END AS shTotPreviousFY, 
												  CASE  WHEN description = "SH_NET_PROFIT"    THEN "SH_NET_PROFIT"    END AS shNetProfit, 
												  CASE  WHEN description = "SH_NET_PROFIT"    THEN current_quarter    END AS shNetCurrQuarter, 
												  CASE  WHEN description = "SH_NET_PROFIT"    THEN previous_quarter   END AS shNetPreviousQuarter, 
												  CASE  WHEN description = "SH_NET_PROFIT"    THEN previous_CQ        END AS shNetPreviousCQ, 
												  CASE  WHEN description = "SH_NET_PROFIT"    THEN current_FY         END AS shNetCurrentFY, 
												  CASE  WHEN description = "SH_NET_PROFIT"    THEN previous_FY        END AS shNetPreviousFY, 
												  CASE  WHEN description = "SH_EAR_PER_SHARE" THEN "SH_EAR_PER_SHARE" END AS shEarPerShare, 
												  CASE  WHEN description = "SH_EAR_PER_SHARE" THEN current_quarter    END AS shEarCurrQuarter, 
												  CASE  WHEN description = "SH_EAR_PER_SHARE" THEN previous_quarter   END AS shEarPreviousQuarter, 
												  CASE  WHEN description = "SH_EAR_PER_SHARE" THEN previous_CQ        END AS shEarPreviousCQ,
												  CASE  WHEN description = "SH_EAR_PER_SHARE" THEN current_FY         END AS shEarCurrentFY, 
												  CASE  WHEN description = "SH_EAR_PER_SHARE" THEN previous_FY        END AS shEarPreviousFY,
												  CASE  WHEN description = "BNK_GRS_NPA_AMT"  THEN "BNK_GRS_NPA_AMT"  END AS bnkGrsNPAAmt, 
												  CASE  WHEN description = "BNK_GRS_NPA_AMT"  THEN current_quarter    END AS bnkGrsNPACurrQuarter, 
												  CASE  WHEN description = "BNK_GRS_NPA_AMT"  THEN previous_quarter   END AS bnkGrsNPAPreviousQuarter, 
												  CASE  WHEN description = "BNK_GRS_NPA_AMT"  THEN previous_CQ        END AS bnkGrsNPAPreviousCQ,
												  CASE  WHEN description = "BNK_NET_NPA_AMT"  THEN "BNK_NET_NPA_AMT"  END AS bnkNetNPAAmt, 
												  CASE  WHEN description = "BNK_NET_NPA_AMT"  THEN current_quarter    END AS bnkNetNPACurrQuarter, 
												  CASE  WHEN description = "BNK_NET_NPA_AMT"  THEN previous_quarter   END AS bnkNetNPAPreviousQuarter, 
												  CASE  WHEN description = "BNK_NET_NPA_AMT"  THEN previous_CQ        END AS bnkNetNPAPreviousCQ,
												  CASE  WHEN description = "BNK_GRS_NPA_PER"  THEN "BNK_GRS_NPA_PER"  END AS bnkGrsNPAPer, 
												  CASE  WHEN description = "BNK_GRS_NPA_PER"  THEN current_quarter    END AS bnkGrsNPACurrQuarterPer, 
												  CASE  WHEN description = "BNK_GRS_NPA_PER"  THEN previous_quarter   END AS bnkGrsNPAPreviousQuarterPer, 
												  CASE  WHEN description = "BNK_GRS_NPA_PER"  THEN previous_CQ        END AS bnkGrsNPAPreviousCQPer,
												  CASE  WHEN description = "BNK_NET_NPA_PER"  THEN "BNK_NET_NPA_PER"  END AS bnkNetNPAPer, 
												  CASE  WHEN description = "BNK_NET_NPA_PER"  THEN current_quarter    END AS bnkNetNPACurrQuarterPer, 
												  CASE  WHEN description = "BNK_NET_NPA_PER"  THEN previous_quarter   END AS bnkNetNPAPreviousQuarterPer, 
												  CASE  WHEN description = "BNK_NET_NPA_PER"  THEN previous_CQ        END AS bnkNetNPAPreviousCQPer,
												  CASE  WHEN description = "BNK_RET_ASST_PER" THEN "BNK_RET_ASST_PER" END AS bnkRetASstPer, 
												  CASE  WHEN description = "BNK_RET_ASST_PER" THEN current_quarter    END AS bnkRetASstCurrQuarter, 
  												  CASE  WHEN description = "BNK_RET_ASST_PER" THEN previous_quarter   END AS bnkRetASstPreviousQuarter, 
  												  CASE  WHEN description = "BNK_RET_ASST_PER" THEN previous_CQ        END AS bnkRetASstPreviousCQ,
  												  CASE  WHEN description = "BNK_CAP_ADE_RAT"  THEN "BNK_CAP_ADE_RAT"  END AS bnkCapAdeRat, 
  												  CASE  WHEN description = "BNK_CAP_ADE_RAT"  THEN current_quarter    END AS bnkCapAdeCurrQuarter, 
  												  CASE  WHEN description = "BNK_CAP_ADE_RAT"  THEN previous_quarter   END AS bnkCapAdePreviousQuarter, 
  												  CASE  WHEN description = "BNK_CAP_ADE_RAT"  THEN previous_CQ        END AS bnkCapAdePreviousCQ,												  
												  fl.status AS flStatus
											FROM
												  financial_results fn, financial_results_link fl
											WHERE
												  fl.financial_results_id = fn.id
											AND   fn.status = "A"
											AND   fl.status = "A"',null);
		return json_encode(count($finSrcList) ==0 ? null :$finSrcList);
	}
	public function getEODResults($isin)
	{
		$companyList = $this->model->select("(SELECT 
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
														   	company_keywords
												    FROM   	company_master, bse_eod
													WHERE  	isincode = isin
													AND    isin = '".$isin."'
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
															company_keywords
													 FROM   company_master, nse_eod
													 WHERE  nse_eod.isin = company_master.isin
													 AND    nse_eod.isin = '".$isin."')
													 ORDER BY company_name, tag",null);
		return json_encode(count($companyList)== 0?null:$companyList);

	}

	public function getMaxID()
	{
		 $stmt = $this->model->select("SELECT 
		 									 MAX(id) AS id 
		 							   FROM 
                                            financial_results",null);
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

	public function updateFinancialResultsLinkData($financialResultsLinkData)
    {
		try{
        	$financialResultsSQL = $this->model->insUpdRecords("UPDATE financial_results_link
															    SET    
																   description = ?,
																   current_quarter=?,
																   previous_quarter=?,
																   previous_CQ=?,
																   current_FY=?,
																   previous_FY=?,
																   status=?
																WHERE  financial_results_id =?
																AND    description = ?", $financialResultsLinkData);  
		}
		catch (Exception $ex) { 
			$this->error = $ex->getMessage(); 
			echo $this->error;
		}
    }

	public function addFinancialResults($requestData,$newsTemplate,$newsTamilTemplate)
	{

		$isin 			 = $requestData['isin'];
		$resYear         = $requestData['resYear'];
		$finResults      = $requestData['finResults'];
		$periodEnded     = $requestData['periodEnded'];
		$yearEnded       = $requestData['yearEnded'];
		$industry        = $requestData['industry'];
		$resultsType     = $requestData['resultsType'];
		$resultsData     = $requestData['resultsData'];
		$title           = $requestData['title'];
		$resTemplate     = $requestData['resTemplate'];
		$keywords        = $requestData['keywords'];
		$source          = $requestData['source'];
		$category        = $requestData['category'];
		$status          = $requestData['status'];

		$shtotIncome            = $requestData['shtotIncome'];
		$shTotCurrQuarter       = $requestData['shTotCurrQuarter'];
		$shTotPreviousQuarter   = $requestData['shTotPreviousQuarter'];
		$shTotPreviousCQ        = $requestData['shTotPreviousCQ'];
		$shTotCurrentFY         = $requestData['shTotCurrentFY'];
		$shTotPreviousFY        = $requestData['shTotPreviousFY'];

		$shNetProfit            = $requestData['shNetProfit'];
		$shNetCurrQuarter       = $requestData['shNetCurrQuarter'];
		$shNetPreviousQuarter   = $requestData['shNetPreviousQuarter'];
		$shNetPreviousCQ        = $requestData['shNetPreviousCQ'];
		$shNetCurrentFY         = $requestData['shNetCurrentFY'];
		$shNetPreviousFY        = $requestData['shNetPreviousFY'];

		$shEarPerShare          = $requestData['shEarPerShare'];
		$shEarCurrQuarter       = $requestData['shEarCurrQuarter'];
		$shEarPreviousQuarter   = $requestData['shEarPreviousQuarter'];
		$shEarPreviousCQ        = $requestData['shEarPreviousCQ'];
		$shEarCurrentFY         = $requestData['shEarCurrentFY'];
		$shEarPreviousFY        = $requestData['shEarPreviousFY'];

		$bnkGrsNPAAmt               = $requestData['bnkGrsNPAAmt'];
		$bnkGrsNPACurrQuarter       = $requestData['bnkGrsNPACurrQuarter'];
		$bnkGrsNPAPreviousQuarter   = $requestData['bnkGrsNPAPreviousQuarter'];
		$bnkGrsNPAPreviousCQ        = $requestData['bnkGrsNPAPreviousCQ'];

		$bnkNetNPAAmt               = $requestData['bnkNetNPAAmt'];
		$bnkNetNPACurrQuarter       = $requestData['bnkNetNPACurrQuarter'];
		$bnkNetNPAPreviousQuarter   = $requestData['bnkNetNPAPreviousQuarter'];
		$bnkNetNPAPreviousCQ        = $requestData['bnkNetNPAPreviousCQ'];

		$bnkGrsNPAPer               = $requestData['bnkGrsNPAPer'];
		$bnkGrsNPACurrQuarterPer    = $requestData['bnkGrsNPACurrQuarterPer'];
		$bnkGrsNPAPreviousQuarterPer= $requestData['bnkGrsNPAPreviousQuarterPer'];
		$bnkGrsNPAPreviousCQPer     = $requestData['bnkGrsNPAPreviousCQPer'];

		$bnkNetNPAPer               = $requestData['bnkNetNPAPer'];
		$bnkNetNPACurrQuarterPer    = $requestData['bnkNetNPACurrQuarterPer'];
		$bnkNetNPAPreviousQuarterPer= $requestData['bnkNetNPAPreviousQuarterPer'];
		$bnkNetNPAPreviousCQPer     = $requestData['bnkNetNPAPreviousCQPer'];
		
		$bnkRetAsstPer              = $requestData['bnkRetAsstPer'];
		$bnkRetAsstCurrQuarter      = $requestData['bnkRetAsstCurrQuarter'];
		$bnkRetAsstPreviousQuarter  = $requestData['bnkRetAsstPreviousQuarter'];
		$bnkRetAsstPreviousCQ       = $requestData['bnkRetAsstPreviousCQ'];
		
		$bnkCapAdeRat               = $requestData['bnkCapAdeRat'];
		$bnkCapAdeCurrQuarter       = $requestData['bnkCapAdeCurrQuarter'];
		$bnkCapAdePreviousQuarter   = $requestData['bnkCapAdePreviousQuarter'];
		$bnkCapAdePreviousCQ        = $requestData['bnkCapAdePreviousCQ'];

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

		//if($requestData['test'] != "None")
		//{

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
		//}	
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
		header("Location:../view/FinancialResultsView.php");
		exit;
	}
public function updFinancialResults($requestData,$newsTemplate,$newsTamilTemplate)
	{	
		$financialResultsID = $requestData['fnID'];
		$isin            = $requestData['isin'];
		$resYear         = $requestData['resYear'];
		$finResults      = $requestData['finResults'];
		$periodEnded     = $requestData['periodEnded'];
		$yearEnded       = $requestData['yearEnded'];
		$industry        = $requestData['industry'];
		$resultsType     = $requestData['resultsType'];
		$resultsData     = $requestData['resultsData'];
		$title           = $requestData['title'];
		$resTemplate     = $requestData['resTemplate'];
		$keywords        = $requestData['keywords'];
		$source          = $requestData['source'];
		$category        = $requestData['category'];
		$status          = $requestData['status'];

		$shtotIncome            = $requestData['shtotIncome'];
		$shTotCurrQuarter       = $requestData['shTotCurrQuarter'];
		$shTotPreviousQuarter   = $requestData['shTotPreviousQuarter'];
		$shTotPreviousCQ        = $requestData['shTotPreviousCQ'];
		$shTotCurrentFY         = $requestData['shTotCurrentFY'];
		$shTotPreviousFY        = $requestData['shTotPreviousFY'];

		$shNetProfit            = $requestData['shNetProfit'];
		$shNetCurrQuarter       = $requestData['shNetCurrQuarter'];
		$shNetPreviousQuarter   = $requestData['shNetPreviousQuarter'];
		$shNetPreviousCQ        = $requestData['shNetPreviousCQ'];
		$shNetCurrentFY         = $requestData['shNetCurrentFY'];
		$shNetPreviousFY        = $requestData['shNetPreviousFY'];

		$shEarPerShare          = $requestData['shEarPerShare'];
		$shEarCurrQuarter       = $requestData['shEarCurrQuarter'];
		$shEarPreviousQuarter   = $requestData['shEarPreviousQuarter'];
		$shEarPreviousCQ        = $requestData['shEarPreviousCQ'];
		$shEarCurrentFY         = $requestData['shEarCurrentFY'];
		$shEarPreviousFY        = $requestData['shEarPreviousFY'];

		$bnkGrsNPAAmt               = $requestData['bnkGrsNPAAmt'];
		$bnkGrsNPACurrQuarter       = $requestData['bnkGrsNPACurrQuarter'];
		$bnkGrsNPAPreviousQuarter   = $requestData['bnkGrsNPAPreviousQuarter'];
		$bnkGrsNPAPreviousCQ        = $requestData['bnkGrsNPAPreviousCQ'];

		$bnkNetNPAAmt               = $requestData['bnkNetNPAAmt'];
		$bnkNetNPACurrQuarter       = $requestData['bnkNetNPACurrQuarter'];
		$bnkNetNPAPreviousQuarter   = $requestData['bnkNetNPAPreviousQuarter'];
		$bnkNetNPAPreviousCQ        = $requestData['bnkNetNPAPreviousCQ'];

		$bnkGrsNPAPer               = $requestData['bnkGrsNPAPer'];
		$bnkGrsNPACurrQuarterPer    = $requestData['bnkGrsNPACurrQuarterPer'];
		$bnkGrsNPAPreviousQuarterPer= $requestData['bnkGrsNPAPreviousQuarterPer'];
		$bnkGrsNPAPreviousCQPer     = $requestData['bnkGrsNPAPreviousCQPer'];

		$bnkNetNPAPer               = $requestData['bnkNetNPAPer'];
		$bnkNetNPACurrQuarterPer    = $requestData['bnkNetNPACurrQuarterPer'];
		$bnkNetNPAPreviousQuarterPer= $requestData['bnkNetNPAPreviousQuarterPer'];
		$bnkNetNPAPreviousCQPer     = $requestData['bnkNetNPAPreviousCQPer'];
		
		$bnkRetAsstPer              = $requestData['bnkRetAsstPer'];
		$bnkRetAsstCurrQuarter      = $requestData['bnkRetAsstCurrQuarter'];
		$bnkRetAsstPreviousQuarter  = $requestData['bnkRetAsstPreviousQuarter'];
		$bnkRetAsstPreviousCQ       = $requestData['bnkRetAsstPreviousCQ'];
		
		$bnkCapAdeRat               = $requestData['bnkCapAdeRat'];
		$bnkCapAdeCurrQuarter       = $requestData['bnkCapAdeCurrQuarter'];
		$bnkCapAdePreviousQuarter   = $requestData['bnkCapAdePreviousQuarter'];
		$bnkCapAdePreviousCQ        = $requestData['bnkCapAdePreviousCQ'];

		$financeResultsUpdateDateTime = $this->getISTDateTime();

		$financialResultsData =  array ( $isin,
										 $financeResultsUpdateDateTime,
										 $resYear,
										 $finResults,
										 $periodEnded,
										 $yearEnded,
										 $industry,
										 $resultsType,
										 $resultsData,
										 $title,
										 $resTemplate,
										 $keywords,
										 $source,
										 $category,
										 $status,
										 $financialResultsID
										);
			try{		
				$financialUpdateSQL = $this->model->insUpdRecords("UPDATE financial_results 
										 SET     isin = ?, 
										 		 update_date = ?,
												 res_year = ?,
												 financial_results = ?,
												 period_ended = ?,
												 year_ended = ?,
												 industry = ?,
												 results_type = ?,
												 results_data = ?,
												 title = ?,
												 results_template = ?,
												 keywords = ?,
												 source = ?,
												 category = ?,
												 status = ?
										 WHERE   id = ?",$financialResultsData);
			}
			catch (Exception $ex) { 
				$this->error = $ex->getMessage(); 
				echo $this->error;
			}
			$financialResultsLinkTotData =  array(  
													$shtotIncome,
													$shTotCurrQuarter,
													$shTotPreviousQuarter,
													$shTotPreviousCQ,
													$shTotCurrentFY,
													$shTotPreviousFY,
													$status,
													$financialResultsID,
													$shtotIncome
													);
			$financialResultsLinkTotUpdate = $this->updateFinancialResultsLinkData($financialResultsLinkTotData);

			$financialResultsLinkNetData =  array(   
													$shNetProfit,
													$shNetCurrQuarter,
													$shNetPreviousQuarter,
													$shNetPreviousCQ,
													$shNetCurrentFY,
													$shNetPreviousFY,
													$status,
													$financialResultsID,
													$shNetProfit
												);
			$financialResultsLinkNetUpdate = $this->updateFinancialResultsLinkData($financialResultsLinkNetData);            

			$financialResultsLinkEarData =  array(  
													$shEarPerShare,
													$shEarCurrQuarter,
													$shEarPreviousQuarter,
													$shEarPreviousCQ,
													$shEarCurrentFY,
													$shEarPreviousFY,
													$status,
													$financialResultsID,
													$shEarPerShare
													);
			$financialResultsLinkEarUpdate = $this->updateFinancialResultsLinkData($financialResultsLinkEarData);

			$financialResultsLinkBankGrsData =  array( $bnkGrsNPAAmt,
													   $bnkGrsNPACurrQuarter, 
													   $bnkGrsNPAPreviousQuarter, 
													   $bnkGrsNPAPreviousCQ, 
													   0, 
													   0, 
													   $status, 
													   $financialResultsID, 
													   $bnkGrsNPAAmt);
			$financialResultsLinkBankGrsUpdate = $this->updateFinancialResultsLinkData($financialResultsLinkBankGrsData);

			$financialResultsLinkBankNetData =  array(   
														$bnkNetNPAAmt,
														$bnkNetNPACurrQuarter,
														$bnkNetNPAPreviousQuarter,
														$bnkNetNPAPreviousCQ,
														0,
														0,
														$status,
														$financialResultsID,
														$bnkNetNPAAmt
														);

			$financialResultsLinkBankNetUpdate = $this->updateFinancialResultsLinkData($financialResultsLinkBankNetData);

			$financialResultsLinkBankGrsNpaData =  array(
															$bnkGrsNPAPer,
															$bnkGrsNPACurrQuarterPer,
															$bnkGrsNPAPreviousQuarterPer,
															$bnkGrsNPAPreviousCQPer,
															0,
															0,
															$status,
															$financialResultsID,
															$bnkGrsNPAPer
															);

			$financialResultsLinkBankNetGrsNpaUpdate = $this->updateFinancialResultsLinkData($financialResultsLinkBankGrsNpaData);

			$financialResultsLinkBankNetNpaPerData =  array( 
															$bnkNetNPAPer,
															$bnkNetNPACurrQuarterPer,
															$bnkNetNPAPreviousQuarterPer,
															$bnkNetNPAPreviousCQPer,
															0,
															0,
															$status,
															$financialResultsID,
															$bnkNetNPAPer
															);

			$financialResultsLinkBankNetNpaPerUpdate = $this->updateFinancialResultsLinkData($financialResultsLinkBankNetNpaPerData);

			$financialResultsLinkBankRetAssetPerData =  array(  
																$bnkRetAsstPer,
																$bnkRetAsstCurrQuarter,
																$bnkRetAsstPreviousQuarter,
																$bnkRetAsstPreviousCQ,
																0,
																0,
																$status,
																$financialResultsID,
																$bnkRetAsstPer
															);

			$financialResultsLinkBankRetAssetPerUpdate = $this->updateFinancialResultsLinkData($financialResultsLinkBankRetAssetPerData);

			$financialResultsLinkBankCapAdeRateData =  array(   
																$bnkCapAdeRat,
																$bnkCapAdeCurrQuarter,
																$bnkCapAdePreviousQuarter,
																$bnkCapAdePreviousCQ,
																0,
																0,
																$status,
																$financialResultsID,
																$bnkCapAdeRat
																);

			$financialResultsLinkBankCapAdeRateUpdate = $this->updateFinancialResultsLinkData($financialResultsLinkBankCapAdeRateData);

			$newsDetailsUpdateData = array ( $isin,
										     $financialResultsID,
											 $source,
											 $category,
								 	         $title,
								 			 $newsTemplate,
								 			 $financeResultsUpdateDateTime,
								 			 $keywords,
								 			 $status,
								 			 $financialResultsID
											);

			$newsResultsUpdateSQL = $this->model->insUpdRecords("UPDATE news_details
													 SET    isin = ?,
													 		financial_results_id = ?,
															news_source_id = ?,
															news_category_id = ?,
															news_title = ?,
															news_message = ?,
															news_upd_date = ?,
															news_keyword = ?,
															news_details_status = ?
													 WHERE		
													 		financial_results_id = ?",$newsDetailsUpdateData);

			$newsTamilDetailsUpdateData = array ( 
													$isin,
													$financialResultsID,
													$source,
													$category,
													$title,
													$newsTamilTemplate,
													$financeResultsUpdateDateTime,
													$keywords,
													$status,
													$financialResultsID
												);

			$tamilNewsResultsUpdateSQL = $this->model->insUpdRecords("UPDATE tamil_news_details
														  SET    isin = ?,
														  		 financial_results_id = ?,
																 source_id = ?,
																 category_id = ?,
																 title = ?,
																 message = ?,
																 upd_date = ?,
																 keyword = ?,
																 status = ?
														 WHERE   financial_results-id = ?",$newsTamilDetailsUpdateData);	 

	  	header("Location:../view/FinancialResultsView.php");
		exit;
	}
	public function delFinancialResults($requestData)
	{

		$newsDeleteSQL = $this->model->delRecord("DELETE FROM 
															news_details
														WHERE 
															financial_results_id = ?",$requestData['fnID']);
		$tamilNewsDeleteSQL = $this->model->delRecord("DELETE FROM 
															tamil_news_details
					                                   WHERE 
 														    financial_results_id = ?",$requestData['fnID']);

		$financialResultLinkDeleteSQL = $this->model->delRecord("DELETE FROM 
																	financial_results_link
					                                   			 WHERE 
 														    		financial_results_id = ?",$requestData['fnID']);

		$financialResultLinkDeleteSQL = $this->model->delRecord("DELETE FROM 
																	financial_results
					                                   			 WHERE 
 														    		id = ?",$requestData['fnID']);
		
	  	header("Location:../view/FinancialResultsView.php");
		exit;
	}	
}

?>