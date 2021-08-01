<?php
class newsSourceModel {
				public $news_source_id ;
				public $news_source_name;
				public $news_source_status;

	public function __construct($news_source_id,$news_source_name,$news_source_status)  
    {  
		$this->news_source_id 			= $news_source_id;
		$this->news_source_name 		= $news_source_name;
	    $this->news_source_status 		= $news_source_status;
    } 
}

?>