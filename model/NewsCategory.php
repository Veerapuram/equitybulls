<?php
class NewsCategory {
	public $news_category_id;
	public $news_category_name;
	public $news_category_status;

	public function __construct($news_category_id,$news_category_name, $news_category_status)  
    {  
		$this->news_category_id = $news_category_id;
        $this->news_category_name = $news_category_name;
	    $this->news_category_status = $news_category_status;
    } 
}

?>