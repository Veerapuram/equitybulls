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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="dist/images/favicon.jpg" type="image/x-icon" >
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
              <li><a href="index.php">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="pages/contact.html">Contact</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p>Friday, December 05, 2045</p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index.php" class="logo"><img src="images/eb_logo.jpg" alt=""></a></div>
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
          <li class="active"><a href="index.php"><span class="mobile-show">Home</span></a></li>
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
                  <select id="isin" name="isin" class="form-control select2 required" style="width: 355px;">
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
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <?php
                $categoryID = $_GET['cat'];
                $newsItem   = $_GET['news'];
                if(isset($categoryID) && isset($newsItem))
                {
                  $newsItemResult = $controller->listNewsDetailsCategoryItem($categoryID, $newsItem);
                  if(!empty($newsItemResult))
                  {
                    $newsItemArray = json_decode( $newsItemResult, true );
                    if(!empty($newsItemArray))
                    {
                      foreach($newsItemArray as $newsItemInfo) {
                        $newsID = $newsItemInfo['news_id'];
                        $newsTitle = $newsItemInfo['news_title'];
                        $newsMessage = $newsItemInfo['news_message'];
                        $newsKeyword = $newsItemInfo['news_keyword'];
                        $fileIndividual = $newsItemInfo['file_individual'];
                        $fileGroup = $newsItemInfo['file_group'];
                        $fileName ="";
                      }    
                    }
                  }
                }
            ?>
            <h1><?php echo 
            $newsTitle;?></h1>
            <div class="single_page_content"> 
              <img class="img-center" src="images/single_post_img.jpg" alt="">
              <p align="justify"><?php echo $newsMessage; ?></p>
              <h3><a class="page-link" href=?cat=<?php echo $categoryID;?>&news=<?php echo $newsItem;?>>Keywords:&nbsp;&nbsp;<?php echo $newsKeyword; ?></a></h3>
            </div>
            <div class="social_link">
              <?php
                    $showRecordPerPage = 24;
                    if(isset($_GET['page']) && !empty($_GET['page'])){
                      $currentPage = $_GET['page'];
                    }else{
                      $currentPage = 1;
                    }
                    $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;    
                
                    $recCountResult = $controller->countNoofRecords($categoryID);
                    if(!empty($recCountResult))
                    {
                      $recCountArray = json_decode( $recCountResult, true );
                      if(!empty($recCountArray))
                      {
                        foreach($recCountArray as $recCountInfo) {
                          $recCount = $recCountInfo['count'];
                          $catName  = $recCountInfo['category_name'];
                        }    
                      }
                    }
                    $lastPage = ceil($recCount/$showRecordPerPage);
                    $firstPage = 1;
                    $nextPage = $currentPage + 1;
                    $previousPage = $currentPage - 1;
              ?>
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="left_content">
                  <div class="single_post_content">
                    <h2><span><?php echo $catName?></span></h2>
                      <div class="single_post_content_center">
                        <ul class="spost_nav">
                          <?php
                              global $fileName;
                              $newsDetailsStockResult = $controller->listNewsDetailsCategoryTitle($categoryID,$startFrom, $showRecordPerPage);
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
                                    $keyword = $newsStockInfo['news_keyword'];
                                    $fileName = "eb_news.jpg";
                                    echo '<li>';
                                    echo '  <div class="media wow fadeInDown"> <a href="generic.php?cat='.$categoryID.'&news='.$newsID.'" class="media-left"> <img alt="" src="images/'.$fileName.'"> </a>';
                                    echo '  <div class="media-body"> <a href="generic.php?cat='.$categoryID.'&news='.$newsID.'" class="catg_title">'.$keyword.'</a> </div>';
                                    echo '</div>';
                                    echo '</li>';
                                  }    
                                }
                              }
                          ?>
                        </ul>
                  </div>
              </div>
              <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                  <?php if($currentPage != $firstPage) { ?>
                    <li class="page-item">
                      <a class="page-link" href="?page=<?php echo $firstPage ?>&cat=<?php echo $categoryID?>&news=<?php echo $newsItem;?>" tabindex="-1" aria-label="Previous">
                        <span aria-hidden="true">First</span>			
                      </a>
                    </li>
                  <?php } ?>
                  <?php if($currentPage >= 2) { ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>&cat=<?php echo $categoryID?>&news=<?php echo $newsItem;?>"><?php echo $previousPage ?></a></li>
                  <?php } ?>
                      <li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>&cat=<?php echo $categoryID?>&news=<?php echo $newsItem;?>"><?php echo $currentPage ?></a></li>
                  <?php if($currentPage != $lastPage) { ?>
                      <li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>&cat=<?php echo $categoryID?>&news=<?php echo $newsItem;?>"><?php echo $nextPage ?></a></li>
                       <li class="page-item">
                          <a class="page-link" href="?page=<?php echo $lastPage ?>&cat=<?php echo $categoryID?>&news=<?php echo $newsItem;?>" aria-label="Next">
                            <span aria-hidden="true">Last</span>
                          </a>
                      </li>
                  <?php } ?>
                </ul>
              </nav>              
            </div>
          </div>
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
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; 2021 <a href="index.php">EquityBulls</a></p>
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
