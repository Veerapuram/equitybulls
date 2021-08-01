<?php
include_once("model/Model.php");
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
												    company_status = 'A'
											  ORDER BY company_name",null);
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
	public function listNewsDetailsCategoryTitle($categoryID, $paginationStart, $limit)
	{
		$newsDetailsCategoryTitle = $this->model->select("SELECT
														        news_id,
																news_title,
																file_individual,
																file_group,
																news_keyword
   														  FROM  news_details
														  WHERE news_category_id =".$categoryID."	 
														  AND   news_details_status = 'A'
														  ORDER BY news_id DESC 
														  LIMIT ".$paginationStart.",".$limit,null);
		return json_encode(count($newsDetailsCategoryTitle)==0 ? null : $newsDetailsCategoryTitle);
	}
	public function listNewsDetailsCategoryKeyWords($categoryID, $keyWords, $paginationStart, $limit)
	{
		$newsDetailsCategoryTitle = $this->model->select("SELECT
														        news_id,
																news_title,
																file_individual,
																file_group,
																news_keyword
   														  FROM  news_details
														  WHERE news_category_id =".$categoryID."
														  AND   news_keyword = '".$keyWords."'
														  AND   news_details_status = 'A'
														  ORDER BY news_id DESC 
														  LIMIT ".$paginationStart.",".$limit,null);
		return json_encode(count($newsDetailsCategoryTitle)==0 ? null : $newsDetailsCategoryTitle);
	}

	public function listNewsDetailsCategoryItem($categoryID, $newsItem)
	{
		$newsDetailsCategoryItem = $this->model->select("SELECT
														        news_id,
																news_title,
																news_message,
																news_keyword,
																file_individual,
																file_group
   														  FROM  news_details
														  WHERE news_id =".$newsItem."		 
														  AND   news_details_status = 'A'

														  AND	news_category_id =".$categoryID,null);
		return json_encode(count($newsDetailsCategoryItem)==0 ? null : $newsDetailsCategoryItem);
	}	
	public function countNoofRecords($categoryID)
	{
		$newsPaginationCategoryItem = $this->model->select("SELECT
																news_title,
																count(news_id) AS count,
																b.news_category_name AS category_name
   														  FROM  news_details AS a, news_categories AS b
														  WHERE a.news_category_id = b.news_category_id
														  AND	a.news_category_id =".$categoryID."
														  AND	a.news_details_status = 'A'",null);
		return json_encode(count($newsPaginationCategoryItem)==0 ? null : $newsPaginationCategoryItem);
	}	
	public function listCategoryNames()
	{
		$listNewsCategoryNames = $this->model->select("SELECT
															    news_category_id,
																news_category_name
														FROM
																news_categories
														WHERE 
																news_category_status = 'A'",null);
		return json_encode(count($listNewsCategoryNames)==0 ? null : $listNewsCategoryNames);

	}
	public function getISTDateTime()
	{
		if(function_exists('date_default_timezone_set')) {
			date_default_timezone_set("ASia/Kolkata");
		}
		$date = date("d-m-Y");
		$time =  date("H:i:s");
		$newsPublishDateTime = $date." ".$time;
		return $newsPublishDateTime;
	}
}
?>