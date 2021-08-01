<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include_once("controller/IndexController.php");
    $controller = new Controller();
    $companyResult  = $controller->listCompany();
?>
<!DOCTYPE html>
<html>
<head>
<title>EquityBulls</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="dist/img/favicon.jpg" type="image/x-icon" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


<style>
  .DivParent {
    height: 47px;
    white-space: nowrap;
}
.verticallyAlignedDiv {
    display: inline-block;
    vertical-align: middle;
    white-space: normal;
}
.DivHelper {
    display: inline-block;
    vertical-align: middle;
    height:100%;
}
</style>
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="index.html">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="pages/contact.html">Contact</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p><?php echo $controller->getISTDateTime();?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index.html" class="logo"><img src="images/eb_logo.jpg" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="generic.php?cat=7">Mutual Funds</a></li>
          <li><a href="generic.php?cat=1">Research</a></li>
          <li><a href="generic.php?cat=12">Commodities</a></li>
          <li><a href="generic.php?cat=3">IPO</a></li>
          <li><a href="#">Our Team</a></li>
          <li><a href="generic.php?cat=6">Industry News</a></li>
          <li><a href="#">Contact Us</a></li>
          <li>
              <div class="DivParent">
                <div class="verticallyAlignedDiv">
                  <!--input type="text" placeholder="Search Company" name="search"><button type="submit"><i class="fa fa-search"></i></button-->
                  <select id="isin" name="isin" class="form-control select2 required" style="width: 325px;">
                    <option value="0">Select a Company from the List</option>
                    <?php
                        if(!empty($companyResult))
                          {
                            $companyArray = json_decode( $companyResult, true );
                            if(!empty($companyArray))
                            {
                              foreach($companyArray as $companyInfo) {
                                $isin        = $companyInfo['isin'];
                                $companyName = $companyInfo['company_name'];
                                echo "<option value=".$isin.">".$companyName."</option>";
                              }
                            }
                          }  
                    ?>
                  </select>  
                </div>
                <div class="DivHelper"></div>
              </div>
          </li>
          <!--li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mobile</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Android</a></li>
              <li><a href="#">Samsung</a></li>
              <li><a href="#">Nokia</a></li>
              <li><a href="#">Walton Mobile</a></li>
              <li><a href="#">Sympony</a></li>
            </ul>
          </li>          
          <li><a href="pages/contact.html">Contact Us</a></li>
          <li><a href="pages/404.html">404 Page</a></li-->
        </ul>
      </div>
    </nav>
  </section>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Latest News</span>
          <ul id="ticker01" class="news_sticker">
            <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My First News Item</a></li>
            <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My Second News Item</a></li>
            <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My Third News Item</a></li>
            <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My Four News Item</a></li>
            <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My Five News Item</a></li>
            <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My Six News Item</a></li>
            <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My Seven News Item</a></li>
            <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My Eight News Item</a></li>
            <li><a href="#"><img src="images/news_thumbnail2.jpg" alt="">My Nine News Item</a></li>
          </ul>
          <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="#"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="flickr"><a href="#"></a></li>
              <li class="pinterest"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="vimeo"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          <div class="single_iteam"> <a href="pages/single_page.html"> <img src="images/slider_img4.jpg" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="pages/single_page.html">Fusce eu nulla semper porttitor felis sit amet</a></h2>
              <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui...</p>
            </div>
          </div>
          <div class="single_iteam"> <a href="pages/single_page.html"> <img src="images/slider_img2.jpg" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="pages/single_page.html">Fusce eu nulla semper porttitor felis sit amet</a></h2>
              <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui...</p>
            </div>
          </div>
          <div class="single_iteam"> <a href="pages/single_page.html"> <img src="images/slider_img3.jpg" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="pages/single_page.html">Fusce eu nulla semper porttitor felis sit amet</a></h2>
              <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui...</p>
            </div>
          </div>
          <div class="single_iteam"> <a href="pages/single_page.html"> <img src="images/slider_img1.jpg" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="pages/single_page.html">Fusce eu nulla semper porttitor felis sit amet</a></h2>
              <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui...</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest post</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
        <div class="single_post_content">
            <h2><span>Stock Report</span></h2>
            <div class="single_post_content_left">
              <ul class="spost_nav">
              <?php
                    $startFrom = 0;
                    $limit =24;
                    global $fileName;
                    $newsDetailsStockResult = $controller->listNewsDetailsCategoryTitle(4,$startFrom, $limit);
                    if(!empty($newsDetailsStockResult))
                    {
                      $newsStockArray = json_decode( $newsDetailsStockResult, true );
                      if(!empty($newsStockArray))
                      {
                        foreach($newsStockArray as $newsStockInfo) {
                          $newsID = $newsStockInfo['news_id'];
                          $newsTitle = $newsStockInfo['news_title'];
                          $fileIndividual = $newsStockInfo['file_individual'];
                          $fileGroup = $newsStockInfo['file_group'];
                          $fileName = "eb_news.jpg";
                          echo '<li>';
                          echo '  <div class="media wow fadeInDown"> <a href="category.php?cat=4&news='.$newsID.'" class="media-left"> <img alt="" src="images/'.$fileName.'"> </a>';
                          echo '  <div class="media-body"> <a href="category.php?cat=4&news='.$newsID.'" class="catg_title">'.$newsTitle.'</a> </div>';
                          echo '</div>';
                          echo '</li>';
                        }    
                      }
                    }
                  ?>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
              <?php
                    $startFrom = 25;
                    $limit =24;
                    $newsDetailsStockResult = $controller->listNewsDetailsCategoryTitle(4,$startFrom, $limit);
                    if(!empty($newsDetailsStockResult))
                    {
                      $newsStockArray = json_decode( $newsDetailsStockResult, true );
                      if(!empty($newsStockArray))
                      {
                        foreach($newsStockArray as $newsStockInfo) {
                          $newsID = $newsStockInfo['news_id'];
                          $newsTitle = $newsStockInfo['news_title'];
                          $fileIndividual = $newsStockInfo['file_individual'];
                          $fileGroup = $newsStockInfo['file_group'];
                          echo '<li>';
                          echo '  <div class="media wow fadeInDown"> <a href="category.php?cat=4&news='.$newsID.'" class="media-left"> <img alt="" src="images/'.$fileName.'"> </a>';
                          echo '  <div class="media-body"> <a href="category.php?cat=4&news='.$newsID.'" class="catg_title">'.$newsTitle.'</a> </div>';
                          echo '</div>';
                          echo '</li>';
                        }    
                      }
                    }
                  ?>
              </ul>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>Research</span></h2>
                <ul class="spost_nav">
                <?php
                    $startFrom = 0;
                    $limit =24;
                    $newsDetailsStockResult = $controller->listNewsDetailsCategoryTitle(1,$startFrom, $limit);
                    if(!empty($newsDetailsStockResult))
                    {
                      $newsStockArray = json_decode( $newsDetailsStockResult, true );
                      if(!empty($newsStockArray))
                      {
                        foreach($newsStockArray as $newsStockInfo) {
                          $newsID = $newsStockInfo['news_id'];
                          $newsTitle = $newsStockInfo['news_title'];
                          $fileIndividual = $newsStockInfo['file_individual'];
                          $fileGroup = $newsStockInfo['file_group'];
                          echo '<li>';
                          echo '  <div class="media wow fadeInDown"> <a href="category.php?cat=1&news='.$newsID.'" class="media-left"> <img alt="" src="images/'.$fileName.'"> </a>';
                          echo '  <div class="media-body"> <a href="category.php?cat=1&news='.$newsID.'" class="catg_title">'.$newsTitle.'</a> </div>';
                          echo '</div>';
                          echo '</li>';
                        }    
                      }
                    }
                  ?>
                  </ul>
              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><span>Mutual Funds</span></h2>
                <ul class="spost_nav">
                <?php
                    $startFrom = 0;
                    $limit =24;
                    $newsDetailsStockResult = $controller->listNewsDetailsCategoryTitle(7,$startFrom, $limit);
                    if(!empty($newsDetailsStockResult))
                    {
                      $newsStockArray = json_decode( $newsDetailsStockResult, true );
                      if(!empty($newsStockArray))
                      {
                        foreach($newsStockArray as $newsStockInfo) {
                          $newsID = $newsStockInfo['news_id'];
                          $newsTitle = $newsStockInfo['news_title'];
                          $fileIndividual = $newsStockInfo['file_individual'];
                          $fileGroup = $newsStockInfo['file_group'];
                          echo '<li>';
                          echo '  <div class="media wow fadeInDown"> <a href="category.php?cat=7&news='.$newsID.'" class="media-left"> <img alt="" src="images/'.$fileName.'"> </a>';
                          echo '  <div class="media-body"> <a href="category.php?cat=7&news='.$newsID.'" class="catg_title">'.$newsTitle.'</a> </div>';
                          echo '</div>';
                          echo '</li>';
                        }    
                      }
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>Commodities</span></h2>
                <ul class="spost_nav">
                <?php
                    $startFrom = 0;
                    $limit =9;
                    $newsDetailsStockResult = $controller->listNewsDetailsCategoryTitle(12,$startFrom, $limit);
                    if(!empty($newsDetailsStockResult))
                    {
                      $newsStockArray = json_decode( $newsDetailsStockResult, true );
                      if(!empty($newsStockArray))
                      {
                        foreach($newsStockArray as $newsStockInfo) {
                          $newsID = $newsStockInfo['news_id'];
                          $newsTitle = $newsStockInfo['news_title'];
                          $fileIndividual = $newsStockInfo['file_individual'];
                          $fileGroup = $newsStockInfo['file_group'];
                          echo '<li>';
                          echo '  <div class="media wow fadeInDown"> <a href="category.php?cat=12&news='.$newsID.'" class="media-left"> <img alt="" src="images/'.$fileName.'"> </a>';
                          echo '  <div class="media-body"> <a href="category.php?cat=12&news='.$newsID.'" class="catg_title">'.$newsTitle.'</a> </div>';
                          echo '</div>';
                          echo '</li>';
                        }    
                      }
                    }
                  ?>
                  </ul>
              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><span>Industry News</span></h2>
                <ul class="spost_nav">
                <?php
                    $startFrom = 0;
                    $limit =9;
                    $newsDetailsStockResult = $controller->listNewsDetailsCategoryTitle(6,$startFrom, $limit);
                    if(!empty($newsDetailsStockResult))
                    {
                      $newsStockArray = json_decode( $newsDetailsStockResult, true );
                      if(!empty($newsStockArray))
                      {
                        foreach($newsStockArray as $newsStockInfo) {
                          $newsID = $newsStockInfo['news_id'];
                          $newsTitle = $newsStockInfo['news_title'];
                          $fileIndividual = $newsStockInfo['file_individual'];
                          $fileGroup = $newsStockInfo['file_group'];
                          echo '<li>';
                          echo '  <div class="media wow fadeInDown"> <a href="category.php?cat=6&news='.$newsID.'" class="media-left"> <img alt="" src="images/'.$fileName.'"> </a>';                          
                          echo '  <div class="media-body"> <a href="category.php?cat=6&news='.$newsID.'" class="catg_title">'.$newsTitle.'</a> </div>';
                          echo '</div>';
                          echo '</li>';
                        }    
                      }
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>Market Commentary</span></h2>
                <ul class="spost_nav">
                <?php
                    $startFrom = 0;
                    $limit =9;
                    $newsDetailsStockResult = $controller->listNewsDetailsCategoryTitle(2,$startFrom, $limit);
                    if(!empty($newsDetailsStockResult))
                    {
                      $newsStockArray = json_decode( $newsDetailsStockResult, true );
                      if(!empty($newsStockArray))
                      {
                        foreach($newsStockArray as $newsStockInfo) {
                          $newsID = $newsStockInfo['news_id'];
                          $newsTitle = $newsStockInfo['news_title'];
                          $fileIndividual = $newsStockInfo['file_individual'];
                          $fileGroup = $newsStockInfo['file_group'];
                          echo '<li>';
                          echo '  <div class="media wow fadeInDown"> <a href="category.php?cat=2&news='.$newsID.'" class="media-left"> <img alt="" src="images/'.$fileName.'"> </a>';                                                    
                          echo '  <div class="media-body"> <a href="category.php?cat=2&news='.$newsID.'" class="catg_title">'.$newsTitle.'</a> </div>';
                          echo '</div>';
                          echo '</li>';
                        }    
                      }
                    }
                  ?>
                  </ul>
              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><span>IPO News</span></h2>
                <ul class="spost_nav">
                <?php
                    $startFrom = 0;
                    $limit =9;
                    $newsDetailsStockResult = $controller->listNewsDetailsCategoryTitle(3,$startFrom, $limit);
                    if(!empty($newsDetailsStockResult))
                    {
                      $newsStockArray = json_decode( $newsDetailsStockResult, true );
                      if(!empty($newsStockArray))
                      {
                        foreach($newsStockArray as $newsStockInfo) {
                          $newsID = $newsStockInfo['news_id'];
                          $newsTitle = $newsStockInfo['news_title'];
                          $fileIndividual = $newsStockInfo['file_individual'];
                          $fileGroup = $newsStockInfo['file_group'];
                          echo '<li>';
                          echo '  <div class="media wow fadeInDown"> <a href="category.php?cat=3&news='.$newsID.'" class="media-left"> <img alt="" src="images/'.$fileName.'"> </a>';                                                    
                          echo '  <div class="media-body"> <a href="category.php?cat=3&news='.$newsID.'" class="catg_title">'.$newsTitle.'</a> </div>';
                          echo '</div>';
                          echo '</li>';
                        }    
                      }
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>Interesting Articles</span></h2>
                <ul class="spost_nav">
                <?php
                    $startFrom = 0;
                    $limit =9;
                    $newsDetailsStockResult = $controller->listNewsDetailsCategoryTitle(17,$startFrom, $limit);
                    if(!empty($newsDetailsStockResult))
                    {
                      $newsStockArray = json_decode( $newsDetailsStockResult, true );
                      if(!empty($newsStockArray))
                      {
                        foreach($newsStockArray as $newsStockInfo) {
                          $newsID = $newsStockInfo['news_id'];
                          $newsTitle = $newsStockInfo['news_title'];
                          $fileIndividual = $newsStockInfo['file_individual'];
                          $fileGroup = $newsStockInfo['file_group'];
                          echo '<li>';
                          echo '  <div class="media wow fadeInDown"> <a href="category.php?cat=17&news='.$newsID.'" class="media-left"> <img alt="" src="images/'.$fileName.'"> </a>';                                                    
                          echo '  <div class="media-body"> <a href="category.php?cat=17&news='.$newsID.'" class="catg_title">'.$newsTitle.'</a> </div>';
                          echo '</div>';
                          echo '</li>';
                        }    
                      }
                    }
                  ?>
                  </ul>
              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><span>Stake Sale</span></h2>
                <ul class="spost_nav">
                <?php
                    $startFrom = 0;
                    $limit =9;
                    $newsDetailsStockResult = $controller->listNewsDetailsCategoryTitle(5,$startFrom, $limit);
                    if(!empty($newsDetailsStockResult))
                    {
                      $newsStockArray = json_decode( $newsDetailsStockResult, true );
                      if(!empty($newsStockArray))
                      {
                        foreach($newsStockArray as $newsStockInfo) {
                          $newsID = $newsStockInfo['news_id'];
                          $newsTitle = $newsStockInfo['news_title'];
                          $fileIndividual = $newsStockInfo['file_individual'];
                          $fileGroup = $newsStockInfo['file_group'];
                          echo '<li>';
                          echo '  <div class="media wow fadeInDown"> <a href="category.php?cat=5&news='.$newsID.'" class="media-left"> <img alt="" src="images/'.$fileName.'"> </a>';                                                    
                          echo '  <div class="media-body"> <a href="category.php?cat=5&news='.$newsID.'" class="catg_title">'.$newsTitle.'</a> </div>';
                          echo '</div>';
                          echo '</li>';
                        }    
                      }
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>SME Stocks</span></h2>
                <ul class="spost_nav">
                <?php
                    $startFrom = 0;
                    $limit =9;
                    $newsDetailsStockResult = $controller->listNewsDetailsCategoryTitle(16,$startFrom, $limit);
                    if(!empty($newsDetailsStockResult))
                    {
                      $newsStockArray = json_decode( $newsDetailsStockResult, true );
                      if(!empty($newsStockArray))
                      {
                        foreach($newsStockArray as $newsStockInfo) {
                          $newsID = $newsStockInfo['news_id'];
                          $newsTitle = $newsStockInfo['news_title'];
                          $fileIndividual = $newsStockInfo['file_individual'];
                          $fileGroup = $newsStockInfo['file_group'];
                          echo '<li>';
                          echo '  <div class="media wow fadeInDown"> <a href="category.php?cat=16&news='.$newsID.'" class="media-left"> <img alt="" src="images/'.$fileName.'"> </a>';                                                    
                          echo '  <div class="media-body"> <a href="category.php?cat=16&news='.$newsID.'" class="catg_title">'.$newsTitle.'</a> </div>';
                          echo '</div>';
                          echo '</li>';
                        }    
                      }
                    }
                  ?>
                  </ul>
              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><span>General</span></h2>
                <ul class="spost_nav">
                <?php
                    $startFrom = 0;
                    $limit =9;
                    $newsDetailsStockResult = $controller->listNewsDetailsCategoryTitle(8,$startFrom, $limit);
                    if(!empty($newsDetailsStockResult))
                    {
                      $newsStockArray = json_decode( $newsDetailsStockResult, true );
                      if(!empty($newsStockArray))
                      {
                        foreach($newsStockArray as $newsStockInfo) {
                          $newsID = $newsStockInfo['news_id'];
                          $newsTitle = $newsStockInfo['news_title'];
                          $fileIndividual = $newsStockInfo['file_individual'];
                          $fileGroup = $newsStockInfo['file_group'];
                          echo '<li>';
                          echo '  <div class="media wow fadeInDown"> <a href="category.php?cat=8&news='.$newsID.'" class="media-left"> <img alt="" src="images/'.$fileName.'"> </a>';                                                    
                          echo '  <div class="media-body"> <a href="category.php?cat=8&news='.$newsID.'" class="catg_title">'.$newsTitle.'</a> </div>';
                          echo '</div>';
                          echo '</li>';
                        }    
                      }
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>US Stock Markets</span></h2>
                <ul class="spost_nav">
                <?php
                    $startFrom = 0;
                    $limit =9;
                    $newsDetailsStockResult = $controller->listNewsDetailsCategoryTitle(15,$startFrom, $limit);
                    if(!empty($newsDetailsStockResult))
                    {
                      $newsStockArray = json_decode( $newsDetailsStockResult, true );
                      if(!empty($newsStockArray))
                      {
                        foreach($newsStockArray as $newsStockInfo) {
                          $newsID = $newsStockInfo['news_id'];
                          $newsTitle = $newsStockInfo['news_title'];
                          $fileIndividual = $newsStockInfo['file_individual'];
                          $fileGroup = $newsStockInfo['file_group'];
                          echo '<li>';
                          echo '  <div class="media wow fadeInDown"> <a href="category.php?cat=15&news='.$newsID.'" class="media-left"> <img alt="" src="images/'.$fileName.'"> </a>';                          
                          echo '  <div class="media-body"> <a href="category.php?cat=15&news='.$newsID.'" class="catg_title">'.$newsTitle.'</a> </div>';
                          echo '</div>';
                          echo '</li>';
                        }    
                      }
                    }
                  ?>
                  </ul>
              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><span>Union Budget</span></h2>
                <ul class="spost_nav">
                <?php
                    $startFrom = 0;
                    $limit =9;
                    $newsDetailsStockResult = $controller->listNewsDetailsCategoryTitle(10,$startFrom, $limit);
                    if(!empty($newsDetailsStockResult))
                    {
                      $newsStockArray = json_decode( $newsDetailsStockResult, true );
                      if(!empty($newsStockArray))
                      {
                        foreach($newsStockArray as $newsStockInfo) {
                          $newsID = $newsStockInfo['news_id'];
                          $newsTitle = $newsStockInfo['news_title'];
                          $fileIndividual = $newsStockInfo['file_individual'];
                          $fileGroup = $newsStockInfo['file_group'];
                          echo '<li>';
                          echo '  <div class="media wow fadeInDown"> <a href="category.php?cat=10&news='.$newsID.'" class="media-left"> <img alt="" src="images/'.$fileName.'"> </a>';                          
                          echo '  <div class="media-body"> <a href="category.php?cat=10&news='.$newsID.'" class="catg_title">'.$newsTitle.'</a> </div>';
                          echo '</div>';
                          echo '</li>';
                        }    
                      }
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                </div>
              </li>                                                                      
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                </div>
              </li>                                                                      
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
  <footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>Flickr Images</h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>Tag</h2>
            <ul class="tag_nav">
              <li><a href="#">Games</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#">Fashion</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Life &amp; Style</a></li>
              <li><a href="#">Technology</a></li>
              <li><a href="#">Photo</a></li>
              <li><a href="#">Slider</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Contact</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <address>
            Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA Phone: 123-326-789 Fax: 123-546-567
            </address>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="assets/js/jquery.newsTicker.min.js"></script> 
<script src="assets/js/jquery.fancybox.pack.js"></script> 
<script src="assets/js/custom.js"></script>
<script>
  $(function () {
    bsCustomFileInput.init();
      $('.select2').select2()
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
  });
</script>
</body>
</html>
