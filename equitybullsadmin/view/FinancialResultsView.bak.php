<?php	session_start();
    if(!isset($_SESSION['email']))
    {
        header("Location:../index.php");
        exit;
    }
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		include_once("../controller/FinancialResultsController.php");
		$controller = new Controller();
		if(isset($_POST['submit']))
		{
			if($_POST['submit']==="add")
				$controller->addFinancialResults($_POST);
			if($_POST['submit']==="update")
				$controller->updFinancialResults($_POST);
		}
		else if(isset($_POST['reset']) && ($_POST['reset']==="delete"))
		{
			$controller->delFinancialResults($_POST);
		}
		$ISINResult     	= $controller->listCompany();
		$categoryResult     = $controller->listNewsCat();
		$sourceResult		= $controller->listNewsSrc();
		$financialResults   = $controller->listFinancialResults();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Equity Bulls | Financial Results </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
	  <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Admin Entries
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="BseView.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BSE Admin</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="NseView.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>NSE Admin</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="IndustryView.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Industry Admin</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="CompanyView.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company Admin</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="ProductImageView.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company Products</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="NewsCatView.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News Categories Admin</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="NewsSourceView.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News Source Admin</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="NewsDetailsView.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News Details Admin</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="CurrencyView.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Currency Master</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="SmAdminView.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Market Admin</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="GoldSilverView.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gold Silver Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>              
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Financial Results Entry Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Financial Results Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Entry form for Financial Results</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="financeViewForm" method="post">
			    <div class="card-body">
					<div class="form-group">
						<label for="resYear">Results Year<span class="required">*</span></label>&nbsp;&nbsp;
						<input type="radio" required="required" id="resYear" name="resYear" value="CY">&nbsp;&nbsp;Calendar Year&nbsp;&nbsp;
						<input type="radio" required="required" id="resYear" name="resYear" value="FY">&nbsp;&nbsp;Financial Year&nbsp;&nbsp;
				   </div>
					<div class="form-group">
						<label for="finResults">Financial Results<span class="required">*</span></label>&nbsp;&nbsp;
						<input type="radio" required="required" id="finResults" name="finResults" value="Q1">&nbsp;&nbsp;Q1&nbsp;&nbsp;
						<input type="radio" required="required" id="finResults" name="finResults" value="Q2">&nbsp;&nbsp;Q2&nbsp;&nbsp;
						<input type="radio" required="required" id="finResults" name="finResults" value="Q3">&nbsp;&nbsp;Q3&nbsp;&nbsp;
						<input type="radio" required="required" id="finResults" name="finResults" value="Q4">&nbsp;&nbsp;Q4&nbsp;&nbsp;
				   </div>
				   <div class="form-group">
						<label for="periodEnded">Period Ended<span class="required">*</span></label>
						<select id="periodEnded" name="periodEnded" class="form-control select2 required" style="width: 100%;">
							<option value="June 30">June 30</option>
							<option value="September 30">September 30</option>
							<option value="December 31">December 31</option>
							<option value="March 31">March 31</option>
						</select>
				   </div>
				   <div class="form-group">
						<label for="yearEnded">Year Ended<span class="required">*</span></label>
						<select id="yearEnded" name="yearEnded" class="form-control select2 required" style="width: 100%;">
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
							<option value="2026">2026</option>
							<option value="2027">2027</option>
							<option value="2028">2028</option>
							<option value="2029">2029</option>
							<option value="2030">2030</option>
						</select>
				   </div>
				   <div class="form-group">
						<label>Company Name</label>
						<select id="isin" name="isin" class="form-control select2 required" style="width: 100%;">
						<?php
							if(!empty($ISINResult))
							{
								$ISINArray = json_decode( $ISINResult, true );
								if(!empty($ISINArray))
								{
									foreach($ISINArray as $ISINInfo) {
											$ISIN 	= $ISINInfo['isin'];
											$companyName = $ISINInfo['company_name'];
											echo "<option value=".$ISIN.">".$companyName."</option>";
									}
								}
							}?>
						</select>
				   </div>
   				   <div class="form-group">
						<label for="industry">Industry<span class="required">*</span></label>&nbsp;&nbsp;
						<input type="radio" required="required" id="industry" name="industry" value="B">&nbsp;&nbsp;Banks&nbsp;&nbsp;
						<input type="radio" required="required" id="industry" name="industry" value="O">&nbsp;&nbsp;Others&nbsp;&nbsp;
				   </div>
					<div class="form-group">
						<label for="resultsType">Result Type<span class="required">*</span></label>&nbsp;&nbsp;
						<input type="radio" required="required" id="resultsType" name="resultsType" value="C">&nbsp;&nbsp;Consolidated&nbsp;&nbsp;
						<input type="radio" required="required" id="resultsType" name="resultsType" value="S">&nbsp;&nbsp;Standalone&nbsp;&nbsp;
				   </div>
				   <div class="form-group">
						<label for="resultsData">Results Data<span class="required">*</span></label>&nbsp;&nbsp;
						<input type="radio" required="required" id="resultsData" name="resultsData" value="D">&nbsp;&nbsp;Detailed&nbsp;&nbsp;
						<input type="radio" required="required" id="resultsData" name="resultsData" value="S">&nbsp;&nbsp;Short&nbsp;&nbsp;
				   </div>
                   <div class="form-group">
						<label for="title">Title<span class="required">*</span></label>
						<input type="text" class="form-control form-control-border" required="required" id="title" name="title" placeholder="Enter Title">
                  </div>
  				  <div class="form-group">
						<label for="resTemplate">Result Template<span class="required">*</span></label>&nbsp;&nbsp;
						<input type="radio" id="resTemplate" name="resTemplate" value="T1">&nbsp;&nbsp;T1&nbsp;&nbsp;
						<input type="radio" required="required" id="resTemplate" name="resTemplate" value="T2">&nbsp;&nbsp;T2&nbsp;&nbsp;
						<input type="radio" required="required" id="resTemplate" name="resTemplate" value="T3">&nbsp;&nbsp;T3&nbsp;&nbsp;
						<input type="radio" required="required" id="resTemplate" name="resTemplate" value="T4">&nbsp;&nbsp;T4&nbsp;&nbsp;
				  </div>
                  <div class="form-group">
						<label for="title">Keywords<span class="required">*</span></label>
						<input type="text" class="form-control form-control-border" required="required" id="keywords" name="keywords" placeholder="Enter Keywords">
                  </div>
				  <div class="form-group">
						<label for="source">Source<span class="required">*</span></label>
						<select id="source" name="source" class="form-control select2" style="width: 100%;" required="required">
						<?php
							if(!empty($sourceResult))
							{
								$sourceArray = json_decode( $sourceResult, true );
								if(!empty($sourceArray))
								{
									foreach($sourceArray as $sourceInfo) {
											$sourceID 	= $sourceInfo['news_source_id'];
											$sourceName 	= $sourceInfo['news_source_name'];
											echo "<option value=".$sourceID.">".$sourceName."</option>";
									}
								}
							}?>
						</select>
				   </div>
				   <div class="form-group">
						<label for="category">Category<span class="required">*</span></label>
						<select id="category" name="category" class="form-control select2" style="width: 100%;" required="required">
						<?php
							if(!empty($categoryResult))
							{
								$categoryArray = json_decode( $categoryResult, true );
								if(!empty($categoryArray))
								{
									foreach($categoryArray as $categoryInfo) {
											$categoryID 	= $categoryInfo['news_category_id'];
											$categoryName 	= $categoryInfo['news_category_name'];
											echo "<option value=".$categoryID.">".$categoryName."</option>";
									}
								}
							}?>
							</select>
				   </div>
 				   <div class="form-group">
						<label>Status</label>
						<select id="status" name="status" class="form-control select2" style="width: 100%;" required="required">
							<option value="A">Active</option>
							<option value="I">Inactive</option>
						</select>
				   </div>
           </div>
			    <div id="short" class="card-body">
                  <div class="card card-success">
                    <div class="card-header" style="text-align: center">
                      <h3 class="card-title">Results Data - Short</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-2" style="text-align: center">
                          <label for="shTotIncome">Total Income <span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="shtotIncome" name="shtotIncome" value="SH_TOT_INCOME" readonly>
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shTotCurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="shTotCurrQuarter" name="shTotCurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shTotPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="shTotPreviousQuarter" name="shTotPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shTotPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="shTotPreviousCQ" name="shTotPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shTotCurrentFY">Current FY<span class="required">*</span></label>
                          <input type="text" id="shTotCurrentFY" name="shTotCurrentFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shTotPreviousFY">Previous FY<span class="required">*</span></label>
                          <input type="text" id="shTotPreviousFY" name="shTotPreviousFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shNetProfit">Net Profit <span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="shNetProfit" name="shNetProfit" value="SH_NET_PROFIT" readonly>
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shNetCurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="shNetCurrQuarter" name="shNetCurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shNetPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="shNetPreviousQuarter" name="shNetPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shNetPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="shNetPreviousCQ" name="shNetPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shNetCurrentFY">Current FY<span class="required">*</span></label>
                          <input type="text" id="shNetCurrentFY" name="shNetCurrentFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shNetPreviousFY">Previous FY<span class="required">*</span></label>
                          <input type="text" id="shNetPreviousFY" name="shNetPreviousFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
						            <div class="col-2" style="text-align: center">
                          <label for="shEarPerShare">Earnings Per Share<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="shEarPerShare" name="shEarPerShare" value="SH_EAR_PER_SHARE" readonly>
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shEarCurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="shEarCurrQuarter" name="shEarCurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shEarPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="shEarPreviousQuarter" name="shEarPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shEarPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="shEarPreviousCQ" name="shEarPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shEarCurrentFY">Current FY<span class="required">*</span></label>
                          <input type="text" id="shEarCurrentFY" name="shEarCurrentFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="shEarPreviousFY">Previous FY<span class="required">*</span></label>
                          <input type="text" id="shEarPreviousFY" name="shEarfsPreviousFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                      </div>
                    </div>
                  </div>
				</div>
			    <div id="long" class="card-body">
                  <div class="card card-success">
                    <div class="card-header" style="text-align: center">
                      <h3 class="card-title">Results Data - Detailed</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-2" style="text-align: center">
                          <label for="lngNetSales">Net Sales<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="lngNetSales" name="lngNetSales" value="LNG_NET_SALES" readonly>
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngNetCurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="lngNetCurrQuarter" name="lngNetCurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngNetPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="lngNetPreviousQuarter" name="lngNetPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngNetPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="lngNetPreviousCQ" name="lngNetPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngNetCurrentFY">Current FY<span class="required">*</span></label>
                          <input type="text" id="lngNetCurrentFY" name="lngNetCurrentFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngNetPreviousFY">Previous FY<span class="required">*</span></label>
                          <input type="text" id="lngNetPreviousFY" name="lngNetPreviousFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngOthIncome">Other Income<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="lngOthIncome" name="lngOthIncome" value="LNG_OTH_INCOME" readonly value=" "> 
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngOthCurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="lngOthCurrQuarter" name="lngOthCurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngOthPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="lngOthPreviousQuarter" name="lngOthPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngOthPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="lngOthPreviousCQ" name="lngOthPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngOthCurrentFY">Current FY<span class="required">*</span></label>
                          <input type="text" id="lngOthCurrentFY" name="lngOthCurrentFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngOthPreviousFY">Previous FY<span class="required">*</span></label>
                          <input type="text" id="lngOthPreviousFY" name="lngOthPreviousFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
						            <div class="col-2" style="text-align: center">
                          <label for="lngTotIncome">Total Income<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="lngTotIncome" name="lngTotIncome" value="LNG_TOT_INCOME" readonly>
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngTotCurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="lngTotCurrQuarter" name="lngTotCurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngTotPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="lngTotPreviousQuarter" name="lngTotPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngTotPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="lngTotPreviousCQ" name="lngTotPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngTotCurrentFY">Current FY<span class="required">*</span></label>
                          <input type="text" id="lngTotCurrentFY" name="lngTotCurrentFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngTotPreviousFY">Previous FY<span class="required">*</span></label>
                          <input type="text" id="lngTotPreviousFY" name="lngTotPreviousFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
						            <div class="col-2" style="text-align: center">
                          <label for="lngIntExpFinCosts">Interest Expense / Finance Costs<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="lngIntExpFinCosts" name="lngIntExpFinCosts" value="LNG_INT_EXP_FIN_COSTS" readonly>
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngIntExpFinCurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="lngIntExpFinCurrQuarter" name="lngIntExpFinCurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngIntExpFinPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="lngIntExpFinPreviousQuarter" name="lngIntExpFinPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngIntExpFinPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="lngIntExpFinPreviousCQ" name="lngIntExpFinPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngIntExpFinCurrentFY">Current FY<span class="required">*</span></label>
                          <input type="text" id="lngIntExpFinCurrentFY" name="lngIntExpFinCurrentFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngIntExpFinPreviousFY">Previous FY<span class="required">*</span></label>
                          <input type="text" id="lngIntExpFinPreviousFY" name="lngIntExpFinPreviousFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
						            <div class="col-2" style="text-align: center">
                          <label for="lngDepreciation">Depreciation<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="lngDepreciation" name="lngDepreciation" value="LNG_DEPRECIATION" readonly>
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngDepFinCurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="lngDepCurrQuarter" name="lngDepCurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngDepFinPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="lngDepPreviousQuarter" name="lngDepPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngDepPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="lngDepPreviousCQ" name="lngDepPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngDepCurrentFY">Current FY<span class="required">*</span></label>
                          <input type="text" id="lngDepCurrentFY" name="lngDepCurrentFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngDepPreviousFY">Previous FY<span class="required">*</span></label>
                          <input type="text" id="lngDepPreviousFY" name="lngDepPreviousFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
						            <div class="col-2" style="text-align: center">
                          <label for="lngTaxes">Taxes<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="lngTaxes" name="lngTaxes" value="LNG_TAXES" readonly>
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngTaxFinCurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="lngTaxCurrQuarter" name="lngTaxCurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngTaxFinPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="lngTaxPreviousQuarter" name="lngTaxPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngTaxPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="lngTaxPreviousCQ" name="lngTaxPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngTaxCurrentFY">Current FY<span class="required">*</span></label>
                          <input type="text" id="lngTaxCurrentFY" name="lngTaxCurrentFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngTaxPreviousFY">Previous FY<span class="required">*</span></label>
                          <input type="text" id="lngTaxPreviousFY" name="lngTaxPreviousFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
						            <div class="col-2" style="text-align: center">
                          <label for="lngGrossProfit">Gross Profit<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="lngGrossProfit" name="lngGrossProfit" value="LNG_GROSS_PROFIT" readonly>
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngGrsProCurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="lngGrsProQuarter" name="lngGrsProQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngGrsProPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="lngGrsProPreviousQuarter" name="lngGrsProPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngGrsProPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="lngGrsProPreviousCQ" name="lngGrsProPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngGrsProCurrentFY">Current FY<span class="required">*</span></label>
                          <input type="text" id="lngGrsProCurrentFY" name="lngGrsProCurrentFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngGrsProPreviousFY">Previous FY<span class="required">*</span></label>
                          <input type="text" id="lngGrsProPreviousFY" name="lngGrsProPreviousFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
						            <div class="col-2" style="text-align: center">
                          <label for="lngNetProfit">Net Profit<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="lngNetProfit" name="lngNetProfit" value="LNG_NET_PROFIT" readonly>
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngNetProCurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="lngNetProCurrQuarter" name="lngNetProCurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngNetProPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="lngNetProPreviousQuarter" name="lngNetProPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngNetProProPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="lngNetProPreviousCQ" name="lngNetProPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngNetProCurrentFY">Current FY<span class="required">*</span></label>
                          <input type="text" id="lngNetProCurrentFY" name="lngNetProCurrentFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngNetProPreviousFY">Previous FY<span class="required">*</span></label>
                          <input type="text" id="lngNetProPreviousFY" name="lngNetProPreviousFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
						            <div class="col-2" style="text-align: center">
                          <label for="lngEquityCapital">Equity Capital<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="lngEquityCapital" name="lngEquityCapital" value="LNG_EQU_CAPITAL" readonly>
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngEquCapCurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="lngEquCapCurrQuarter" name="lngEquCapCurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngEquCapPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="lngEquCapPreviousQuarter" name="lngEquCapPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngEquCapProPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="lngEquCapPreviousCQ" name="lngEquCapPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngEquCapCurrentFY">Current FY<span class="required">*</span></label>
                          <input type="text" id="lngEquCapCurrentFY" name="lngEquCapCurrentFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngEquCapPreviousFY">Previous FY<span class="required">*</span></label>
                          <input type="text" id="lngEquCapPreviousFY" name="lngEquCapPreviousFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
						            <div class="col-2" style="text-align: center">
                          <label for="lngEarPerShare">Earnings Per Share<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="lngEarPerShare" name="lngEarPerShare" value="LNG_EQU_EAR_PER_SHARE" readonly>
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngEquCapCurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="lngEarPerShCurrQuarter" name="lngEarPerShCurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngEarPerShPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="lngEarPerShPreviousQuarter" name="lngEarPerShPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngEarPerShPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="lngEarPerShPreviousCQ" name="lngEarPerShPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngEarPerShCurrentFY">Current FY<span class="required">*</span></label>
                          <input type="text" id="lngEarPerShCurrentFY" name="lngEarPerShCurrentFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-2" style="text-align: center">
                          <label for="lngEarPerShPreviousFY">Previous FY<span class="required">*</span></label>
                          <input type="text" id="lngEarPerShPreviousFY" name="lngEarPerShPreviousFY" required="required" class="form-control form-control-border" value=" ">
                        </div>
					</div>
				</div>
        </div>
        </div>
                <div id="banks" class="card-body">
                  <div class="card card-success">
                    <div class="card-header" style="text-align: center">
                      <h3 class="card-title">Industry -- Banks</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                      <div class="col-3" style="text-align: center">
                          <label for="bnkGrsNPAAmt">Gross NPAs Amount<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="bnkGrsNPAAmt" name="bnkGrsNPAAmt" value="BNK_GRS_NPA_AMT" readonly>
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkGrsNPACurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="bnkGrsNPACurrQuarter" name="bnkGrsNPACurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkGrsNPAPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="bnkGrsNPAPreviousQuarter" name="bnkGrsNPAPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkGrsNPAPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="bnkGrsNPAPreviousCQ" name="bnkGrsNPAPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
						            <div class="col-3" style="text-align: center">
                          <label for="bnkNetNPAAmt">Net NPAs Amount<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="bnkNetNPAAmt" name="bnkNetNPAAmt" value="BNK_NET_NPA_AMT" readonly>
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkNetNPACurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="bnkNetNPACurrQuarter" name="bnkNetNPACurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkNetNPAPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="bnkNetNPAPreviousQuarter" name="bnkNetNPAPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkNetNPAPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="bnkNetNPAPreviousCQ" name="bnkNetNPAPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
						            <div class="col-3" style="text-align: center">
                          <label for="bnkGrsNPAPer">Gross NPA %<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="bnkGrsNPAPer" name="bnkGrsNPAPer" value="BNK_GRS_NPA_PER" readonly>
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkGrsNPACurrQuarterPer">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="bnkGrsNPACurrQuarterPer" name="bnkGrsNPACurrQuarterPer" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkGrsNPAPreviousQuarterPer">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="bnkGrsNPAPreviousQuarterPer" name="bnkGrsNPAPreviousQuarterPer" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkGrsNPAPreviousCQPer">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="bnkGrsNPAPreviousCQPer" name="bnkGrsNPAPreviousCQPer" required="required" class="form-control form-control-border" value=" ">
                        </div>
						            <div class="col-3" style="text-align: center">
                          <label for="bnkNetNPAPer">Net NPA%<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="bnkNetNPAPer" name="bnkNetNPAPer" value="BNK_NET_NPA_PER" readonly>
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkNetNPACurrQuarterPer">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="bnkNetNPACurrQuarterPer" name="bnkNetNPACurrQuarterPer" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkNetNPAPreviousQuarterPer">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="bnkNetNPAPreviousQuarterPer" name="bnkNetNPAPreviousQuarterPer" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkNetNPAPreviousCQPer">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="bnkNetNPAPreviousCQPer" name="bnkNetNPAPreviousCQPer" required="required" class="form-control form-control-border" value=" ">
                        </div>
						            <div class="col-3" style="text-align: center">
                          <label for="bnkRetAsstPer">Return on Assets %<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="bnkRetAsstPer" name="bnkRetAsstPer" value="BNK_RET_ASST_PER" readonly>
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkRetAsstCurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="bnkRetAsstCurrQuarter" name="bnkRetAsstCurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkRetAsstPreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="bnkRetAsstPreviousQuarter" name="bnkRetAsstPreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkRetAsstPreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="bnkRetAsstPreviousCQ" name="bnkRetAsstPreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
						            <div class="col-3" style="text-align: center">
                          <label for="bnkCapAdeRat">Capital Adequacy Ratio (Basel III) %<span class="required">*</span></label>
                          <input type="text" class="form-control form-control-border" id="bnkCapAdeRat" name="bnkCapAdeRat" value="BNK_CAP_ADE_RAT" readonly>
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkCapAdeCurrQuarter">Current Quarter<span class="required">*</span></label>
                          <input type="text" id="bnkCapAdeCurrQuarter" name="bnkCapAdeCurrQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkCapAdePreviousQuarter">Previous Quarter<span class="required">*</span></label>
                          <input type="text" id="bnkCapAdePreviousQuarter" name="bnkCapAdePreviousQuarter" required="required" class="form-control form-control-border" value=" ">
                        </div>
                        <div class="col-3" style="text-align: center">
                          <label for="bnkCapAdePreviousCQ">Previous Year CQ<span class="required">*</span></label>
                          <input type="text" id="bnkCapAdePreviousCQ" name="bnkCapAdePreviousCQ" required="required" class="form-control form-control-border" value=" ">
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
				  <!-- /.card-body -->
				</div>
                <div class="card-footer">
                <input type="hidden" name="test" id="test">
 					<button name="submit" id="submit" type="submit" value="add" class="btn btn-primary">Submit</button>
					<button name="reset" id="reset" type="submit" class="btn btn-primary">Reset</button>
                </div>
          </form>
           </div>
            <!-- /.card -->
    </section>
    <!-- /.content -->
	<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">List of Financial Results</h3>
              </div>
				<table id="financialResults" name="financialResults" class="display table table-bordered table-hover" style="width:100%">
					<thead>
						<tr>
							<th>Financial ID</th>
							<th>ISIN</th>
							<th>Insert Date</th>
							<th>Update Date</th>
							<th>Result Year</th>
							<th>Quarter</th>
							<th>Period Ended</th>
							<th>Year Ended</th>
							<th>Industry</th>
							<th>Results Type</th>
							<th>Results Data</th>
							<th>Title</th>
							<th>Template</th>
							<th>Keywords</th>
							<th>Source</th>
							<th>Category</th>
							<th>Total 		Caption  - Short</th>
							<th>Current   Quarter  - Short</th>
							<th>Previous  Quarter  - Short</th>
							<th>Previous  CQ			 - Short</th>
							<th>Current   FY			 - Short</th>
							<th>Previous  FY			 - Short</th>
							<th>Net   		Caption  - Short</th>
							<th>Current   Quarter  - Short</th>
							<th>Previous  Quarter  - Short</th>
							<th>Previous  CQ			 - Short</th>
							<th>Current   FY			 - Short</th>
							<th>Previous  FY			 - Short</th>
							<th>EAR   		Caption  - Short</th>
							<th>Current   Quarter  - Short</th>
							<th>Previous  Quarter  - Short</th>
							<th>Previous  CQ			 - Short</th>
							<th>Current   FY			 - Short</th>
							<th>Previous  FY			 - Short</th>
							<th>Bank GRS 	Caption  - Short</th>
							<th>Current   Quarter  - Short</th>
							<th>Previous  Quarter  - Short</th>
							<th>Previous  CQ			 - Short</th>
							<th>Bank NET 	Caption  - Short</th>
							<th>Current   Quarter  - Short</th>
							<th>Previous  Quarter  - Short</th>
							<th>Previous  CQ			 - Short</th>
							<th>Bank NPA PER Caption  - Short</th>
							<th>Current   Quarter  - Short</th>
							<th>Previous  Quarter  - Short</th>
							<th>Previous  CQ			 - Short</th>
							<th>Bank NET PER Caption  - Short</th>
							<th>Current   Quarter  - Short</th>
							<th>Previous  Quarter  - Short</th>
							<th>Previous  CQ			 - Short</th>
							<th>Bank RET ASSET PER Caption  - Short</th>
							<th>Current   Quarter  - Short</th>
							<th>Previous  Quarter  - Short</th>
							<th>Previous  CQ			 - Short</th>
							<th>Bank CAP ADE RATE Caption  - Short</th>
							<th>Current   Quarter  - Short</th>
							<th>Previous  Quarter  - Short</th>
							<th>Previous  CQ			 - Short</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(!empty($financialResults))
							{
								$financialArray = json_decode( $financialResults, true );
								if(!empty($financialArray))
								{
									foreach($financialArray as $financialInfo) {
										$fnid								=	$financialInfo['fnid'];
										$isin								=	$financialInfo['isin'];
										$insertDate					=	$financialInfo['insertDate'];
										$updateDate					=	$financialInfo['updateDate'];
										$resYear						= $financialInfo['resYear'];
										$financialResults 	= $financialInfo['financialResults'];
										$periodEnded				= $financialInfo['periodEnded'];
										$yearEnded					= $financialInfo['yearEnded'];
										$industry						= $financialInfo['industry'];
										$resultsType				=	$financialInfo['resultsType'];
										$resultsData		  	= $financialInfo['resultsData'];
										$title							= $financialInfo['title'];
										$resultsTemplate		= $financialInfo['resultsTemplate'];
										$keywords						= $financialInfo['keywords'];
										$source 						= $financialInfo['source'];
										$category 					= $financialInfo['category'];
										$fnStatus						= $financialInfo['fnStatus'];
										$fnStatus						= ($fnStatus==="A")?"Active":"Inactive";
										$shTotIncome				= $financialInfo['shTotIncome'];
										$shNetProfit				= $financialInfo['shNetProfit'];
										$shEarPerShare			= $financialInfo['shEarPerShare'];
										$bnkGrsNPAAmt				= $financialInfo['bnkGrsNPAAmt'];
										$bnkNetNPAAmt				= $financialInfo['bnkNetNPAAmt'];
										$bnkGrsNPAPer				= $financialInfo['bnkGrsNPAPer'];
										$bnkNetNPAPer       = $financialInfo['bnkNetNPAPer'];
										$bnkRetASstPer      = $financialInfo['bnkRetASstPer'];
										$bnkCapAdeRat       = $financialInfo['bnkCapAdeRat'];
										if (isset($shTotIncome))
										{
											$shTotIncomeCAP				= $shTotIncome;
											$shTotCurrQuarter 		= $financialInfo['shTotCurrQuarter'];
											$shTotPreviousQuarter	=	$financialInfo['shTotPreviousQuarter'];
											$shTotPreviousCQ			= $financialInfo['shTotPreviousCQ'];
											$shTotCurrentFY				= $financialInfo['shTotCurrentFY'];
											$shTotPreviousFY			= $financialInfo['shTotPreviousFY'];
										}
										if (isset($shNetProfit))
										{
											$shNetProfitCAP				= $shNetProfit;
											$shNetCurrQuarter 		= $financialInfo['shNetCurrQuarter'];
											$shNetPreviousQuarter	=	$financialInfo['shNetPreviousQuarter'];
											$shNetPreviousCQ			= $financialInfo['shNetPreviousCQ'];
											$shNetCurrentFY				= $financialInfo['shNetCurrentFY'];
											$shNetPreviousFY			= $financialInfo['shNetPreviousFY'];
										}
										if (isset($shEarPerShare))
										{
											$shEarPerShareCAP			=	$shEarPerShare;
											$shEarCurrQuarter 		= $financialInfo['shEarCurrQuarter'];
											$shEarPreviousQuarter	=	$financialInfo['shEarPreviousQuarter'];
											$shEarPreviousCQ			= $financialInfo['shEarPreviousCQ'];
											$shEarCurrentFY				= $financialInfo['shEarCurrentFY'];
											$shEarPreviousFY			= $financialInfo['shEarPreviousFY'];
										}
										if (isset($bnkGrsNPAAmt))
										{
											$bnkGrsNPAAmtCAP 					= $bnkGrsNPAAmt;
											$bnkGrsNPACurrQuarter 		= $financialInfo['bnkGrsNPACurrQuarter'];
											$bnkGrsNPAPreviousQuarter	=	$financialInfo['bnkGrsNPAPreviousQuarter'];
											$bnkGrsNPAPreviousCQ			= $financialInfo['bnkGrsNPAPreviousCQ'];
										}
										if (isset($bnkNetNPAAmt))
										{
											$bnkNetNPAAmtCAP					= $bnkNetNPAAmt;
											$bnkNetNPACurrQuarter 		= $financialInfo['bnkNetNPACurrQuarter'];
											$bnkNetNPAPreviousQuarter	=	$financialInfo['bnkNetNPAPreviousQuarter'];
											$bnkNetNPAPreviousCQ			= $financialInfo['bnkNetNPAPreviousCQ'];
										}
										if (isset($bnkGrsNPAPer))
										{
											$bnkGrsNPAPerCAP              = $bnkGrsNPAPer; 
											$bnkGrsNPACurrQuarterPer 			= $financialInfo['bnkGrsNPACurrQuarterPer'];
											$bnkGrsNPAPreviousQuarterPer	=	$financialInfo['bnkGrsNPAPreviousQuarterPer'];
											$bnkGrsNPAPreviousCQPer				= $financialInfo['bnkGrsNPAPreviousCQPer'];
										}
										if (isset($bnkNetNPAPer))
										{
											$bnkNetNPAPerCAP              = $bnkNetNPAPer;
											$bnkNetNPACurrQuarterPer 			= $financialInfo['bnkNetNPACurrQuarterPer'];
											$bnkNetNPAPreviousQuarterPer	=	$financialInfo['bnkNetNPAPreviousQuarterPer'];
											$bnkNetNPAPreviousCQPer				= $financialInfo['bnkNetNPAPreviousCQPer'];
										}
										if (isset($bnkRetASstPer))
										{
											$bnkRetASstPerCAP           = $bnkRetASstPer;
											$bnkRetASstCurrQuarter 			= $financialInfo['bnkRetASstCurrQuarter'];
											$bnkRetASstPreviousQuarter	=	$financialInfo['bnkRetASstPreviousQuarter'];
											$bnkRetASstPreviousCQ				= $financialInfo['bnkRetASstPreviousCQ'];
										}
										if (isset($bnkCapAdeRat))
										{
											$bnkCapAdeRatCAP            = $bnkCapAdeRat;	
											$bnkCapAdeCurrQuarter 			= $financialInfo['bnkCapAdeCurrQuarter'];
											$bnkCapAdePreviousQuarter		=	$financialInfo['bnkCapAdePreviousQuarter'];
											$bnkCapAdePreviousCQ				= $financialInfo['bnkCapAdePreviousCQ'];
											echo "<tr>
														<td>".$fnid."</td>
														<td>".$isin."</td>
														<td>".$insertDate."</td>
														<td>".$updateDate."</td>
														<td>".$resYear."</td>
														<td>".$financialResults."</td>
														<td>".$periodEnded."</td>
														<td>".$yearEnded."</td>
														<td>".$industry."</td>
														<td>".$resultsType."</td>
														<td>".$resultsData."</td>
														<td>".$title."</td>
														<td>".$resultsTemplate."</td>
														<td>".$keywords."</td>
														<td>".$source."</td>
														<td>".$category."</td>
														<td>".$shTotIncomeCAP."</td>
														<td>".$shTotCurrQuarter."</td>
														<td>".$shTotPreviousQuarter."</td>
														<td>".$shTotPreviousCQ."</td>
														<td>".$shTotCurrentFY."</td>
														<td>".$shTotPreviousFY."</td>
														<td>".$shNetProfitCAP."</td>
														<td>".$shNetCurrQuarter."</td>
														<td>".$shNetPreviousQuarter."</td>
														<td>".$shNetPreviousCQ."</td>
														<td>".$shNetCurrentFY."</td>
														<td>".$shNetPreviousFY."</td>
														<td>".$shEarPerShareCAP."</td>
														<td>".$shEarCurrQuarter."</td>
														<td>".$shEarPreviousQuarter."</td>
														<td>".$shEarPreviousCQ."</td>
														<td>".$shEarCurrentFY."</td>
														<td>".$shEarPreviousFY."</td>
														<td>".$bnkGrsNPAAmtCAP."</td>
														<td>".$bnkGrsNPACurrQuarter."</td>
														<td>".$bnkGrsNPAPreviousQuarter."</td>
														<td>".$bnkGrsNPAPreviousCQ."</td>
														<td>".$bnkNetNPAAmtCAP."</td>
														<td>".$bnkNetNPACurrQuarter."</td>
														<td>".$bnkNetNPAPreviousQuarter."</td>
														<td>".$bnkNetNPAPreviousCQ."</td>
														<td>".$bnkGrsNPAPerCAP."</td>
														<td>".$bnkGrsNPACurrQuarterPer."</td>
														<td>".$bnkGrsNPAPreviousQuarterPer."</td>
														<td>".$bnkGrsNPAPreviousCQPer."</td>
														<td>".$bnkNetNPAPerCAP."</td>
														<td>".$bnkNetNPACurrQuarterPer."</td>
														<td>".$bnkNetNPAPreviousQuarterPer."</td>
														<td>".$bnkNetNPAPreviousCQPer."</td>
														<td>".$bnkRetASstPerCAP."</td>
														<td>".$bnkRetASstCurrQuarter."</td>
														<td>".$bnkRetASstPreviousQuarter."</td>
														<td>".$bnkRetASstPreviousCQ."</td>
														<td>".$bnkCapAdeRatCAP."</td>
														<td>".$bnkCapAdeCurrQuarter."</td>
														<td>".$bnkCapAdePreviousQuarter."</td>
														<td>".$bnkCapAdePreviousCQ."</td>
														<td>".$fnStatus."</td>
													</tr>";
										}
									}
								}
							}
						?>
					</tbody>
				</table>
              <!-- /.card-header -->
            </div>
            <!-- /.card -->
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="http://www.equitybulls.com">Equitybulls</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->

<script>

$(function () {
  bsCustomFileInput.init();
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
});

$(document).ready(function() {

  $("#banks").hide();
  $("#long").hide();
  var $industry = $("input:radio[name=industry]");
      $(industry).on("change", function() {
         if ($(this).val() == "B" )
            $("#banks").show();
         else
            $("#banks").hide();
  });

  var $resultsData = $("input:radio[name=resultsData]");
    $resultsData.on("change", function() {
         if ($(this).val() == "D" )
         {
            $("#long").show();
            $("#short").hide();
         }
         else
         {
            $("#long").hide();
           $("#short").show();
         }
  });

 var table = $('#financialResults').DataTable({
		"columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
            },
			{
                "targets": [ 3 ],
                "visible": false,
            },
        ]
	});

  $('#financialResults tbody').on('click', 'tr', function () {
    var data = table.row( this ).data();
		var companyID     = data[0];
		var isin          = data[2];
		var industryID 	  = data[3];
		var bseNseTag     = data[5];
		var companyStatus = data[14];

		$("#companyID").val(companyID);
		$("#companyID").val();


		$("#isinUpd").val(isin);
		$("#isinUpd").val();

		//$("#isin").select2().select2('val',isin)
		//$("#industry").select2().select2('val',industryID);


		$("#industry").select2();
		$("#industry").val(industryID).trigger("change");

		$("#bse_nse_tag").select2();
		$("#bse_nse_tag").val(bseNseTag).trigger("change");

		//$("#status").select2();
		//$("#status").val(companyStatus).trigger("change");


		$("#status").select2().select2('val',companyStatus);
		$('#companyName').val(data[1]);

		//$('#bse_nse_tag').val(data[5]);

		$('#aboutCompany').val(data[6]);
		$('#companyTwitterURL').val(data[7]);
		$('#companyURL').val(data[8]);
		$('#companyAddress').val(data[9]);
		$('#companyContactNo').val(data[10]);
		$('#companyEmailAddress').val(data[11]);
		$('#companyKeywords').val(data[12]);
		$('#others').val(data[13]);

		$("#submit").html("Update");
		$("#submit").val("update");
		$("#reset").html("Delete");
		$("#reset").val("delete");
	});

  $(document).on("click", ":submit", function(e){
  //$("form").bind('submit',function(e){
  e.preventDefault();	
    //if ($('#long').css('display') == 'none') {
    //  alert('Car 2 is hidden');
    //}
    var newsTemplate="";
    var bankTemplate="";
    var bankTamilTemplate = "";
    var tamilTemplate="";
    var newsTamilTemplate="";
    var action = "";

    if ($(this).val() == "add")
    {
      action = "Insert";
      alert("Action");
    }
    //alert(action);
    if ($("#short").css('display') != 'none') 
    {
      alert("IN");
      periodEnded = $("#periodEnded").val();
      yearEnded = $("#yearEnded").val();
      finResults = $('input[name="finResults"]:checked').val();
      resYear = $('input[name="resYear"]:checked').val();
      resTemplate = $('input[name="resTemplate"]:checked').val();
      shTotCurrQuarter = $("#shTotCurrQuarter").val();
      shTotPreviousQuarter = $("#shTotPreviousQuarter").val();
      shNetCurrQuarter = $("#shNetCurrQuarter").val();
      shNetPreviousQuarter = $("#shNetPreviousQuarter").val();
      shEarCurrQuarter = $("#shEarCurrQuarter").val();
      shEarPreviousQuarter = $("#shEarPreviousQuarter").val();
      shTotPreviousCQ = $("#shTotPreviousCQ").val();
      shEarPreviousCQ = $("#shEarPreviousCQ").val();
      shNetPreviousCQ = $("#shNetPreviousCQ").val();
      shEarCurrentFY = $("#shEarCurrentFY").val();
      shEarPreviousFY= $("#shEarPreviousFY").val();
      shTotCurrentFY = $("#shTotCurrentFY").val();
      shTotPreviousFY = $("#shTotPreviousFY").val();
      shNetCurrentFY = $("#shNetCurrentFY").val();
      shNetPreviousFY = $("#shNetPreviousFY").val();
      resultsType = ($('input[name="resultsType"]:checked').val() == "C")?"Consolidated":"Standalone";
      currentQuarter = periodEnded+', '+yearEnded;
      currentQuarterShort =  finResults +' '+ resYear + yearEnded;
      prevYearCurrentQuarter = periodEnded+", "+ (yearEnded - 1);
      previousYearQuarterShort = finResults+' '+ resYear + (yearEnded - 1);
      var indicatorImage = "";
      if ($("#short").css('banks') != 'none')
      {
        bnkGrsNPACurrQuarter = $("#bnkGrsNPACurrQuarter").val();
        bnkGrsNPAPreviousQuarter = $("#bnkGrsNPAPreviousQuarter").val();
        bnkGrsNPAPreviousCQ = $("#bnkGrsNPAPreviousCQ").val();
        bnkNetNPACurrQuarter = $("#bnkNetNPACurrQuarter").val();
        bnkNetNPAPreviousQuarter = $("#bnkNetNPAPreviousQuarter").val();
        bnkNetNPAPreviousCQ = $("#bnkNetNPAPreviousCQ").val();
        bnkGrsNPACurrQuarterPer = $("#bnkGrsNPACurrQuarterPer").val();
        bnkGrsNPAPreviousQuarterPer = $("#bnkGrsNPAPreviousQuarterPer").val();
        bnkGrsNPAPreviousCQPer = $("#bnkGrsNPAPreviousCQPer").val();
        bnkNetNPACurrQuarterPer = $("#bnkNetNPACurrQuarterPer").val();
        bnkNetNPAPreviousQuarterPer = $("#bnkNetNPAPreviousQuarterPer").val();
        bnkNetNPAPreviousCQPer = $("#bnkNetNPAPreviousCQPer").val();
        bnkRetAsstCurrQuarter = $("#bnkRetAsstCurrQuarter").val();
        bnkRetAsstPreviousQuarter = $("#bnkRetAsstPreviousQuarter").val();
        bnkRetAsstPreviousCQ = $("#bnkRetAsstPreviousCQ").val();
        bnkCapAdeCurrQuarter = $("#bnkCapAdeCurrQuarter").val();
        bnkCapAdePreviousQuarter = $("#bnkCapAdePreviousQuarter").val();
        bnkCapAdePreviousCQ = $("#bnkCapAdePreviousCQ").val();
        
      }
      if((shTotCurrQuarter != " ") && (shTotPreviousQuarter != " ") && (shNetCurrQuarter != " ") && (shNetPreviousQuarter != " ") && (shEarCurrQuarter != " ") && (shEarPreviousQuarter != " ") && 
        (shTotPreviousCQ != " ") && (shNetPreviousCQ != " ") && (shEarPreviousCQ != " ") && (shEarCurrentFY != " ") && (shEarPreviousFY != " ") && (shTotCurrentFY != " ") && (shTotPreviousFY) && (shNetCurrentFY != " ") &&
        (shNetPreviousFY != " ")) 
      {  
      	alert ("IN");
        $.fn.caption = function (assignCaptionCalc)
        {
          var assignCaptionValue = "";
          if(assignCaptionCalc == 0)
            assignCaptionValue = " " ;
          if(assignCaptionCalc > 0)
            assignCaptionValue = " an increase " ;
          if(assignCaptionCalc < 0)
            assignCaptionValue = " a drop " ;
          return assignCaptionValue;
        }
        $.fn.myFunction = function(currentQuarter, previousQuarter, checkAndImplementImageManipulationValues)
        { 
          indicatorImage="Up.png";
          if((currentQuarter > previousQuarter) && (checkAndImplementImageManipulationValues > 0))      
            indicatorImage ="Up.png";
      
          if((currentQuarter > previousQuarter ) && (previousQuarter <0) && (checkAndImplementImageManipulationValues < 0))
          {
            indicatorImage ="Up.png";
            checkAndImplementImageManipulationValues = checkAndImplementImageManipulationValues * -1;
          }
          if((currentQuarter < previousQuarter) && (checkAndImplementImageManipulationValues < 0))      
            indicatorImage ="Down.png";
          
          if((currentQuarter == previousQuarter))      
            indicatorImage ="no-change.png";
        
          if((currentQuarter < previousQuarter) && (currentQuarter < 0) && ( previousQuarter < 0 ) && (checkAndImplementImageManipulationValues < 0))      
            indicatorImage ="Down-Green.png";

          if((currentQuarter > previousQuarter) && (currentQuarter < 0) && ( previousQuarter < 0 ) && (checkAndImplementImageManipulationValues > 0))      
            indicatorImage ="Up-Red.png";
          return checkAndImplementImageManipulationValues;
        }
        var resCurrentPeriod = "";
        var resPreviousPeriod = "";
        var resShortCurrentPeriod ="";
        var previousQuarter = "";
        var previousQuarterShort ="";
        var tag ="";
        if((resYear == "FY") && (finResults == "Q4"))
        {
          previousQuarter = "December 31, "+ (yearEnded - 1);
          previousQuarterShort = "Q3 "+ resYear + yearEnded;
          resCurrentPeriod = "Financial Year ended ";
          resShortCurrentPeriod = "Year Ended ";
          resPreviousPeriod = "Financial Year ended ";
        }
        if((resYear == "FY") && (finResults == "Q3"))
        {
          previousQuarter = "September 30, "+ (yearEnded - 1);
          previousQuarterShort = "Q2 "+ resYear + yearEnded;
          resCurrentPeriod = "9 Months period ended ";
          resShortCurrentPeriod = "9 Months Ended ";
          resPreviousPeriod = "9 Months period ended ";
        }
        if((resYear == "FY") && (finResults == "Q2"))
        {
          previousQuarter = "June 30, "+ (yearEnded - 1);
          previousQuarterShort = "Q1 "+ resYear + yearEnded;
          resCurrentPeriod = "6 Months period ended ";
          resShortCurrentPeriod = "Half Year Ended ";
          resPreviousPeriod = "6 Months period ended ";
        }
        if((resYear == "FY") && (finResults == "Q1"))
        {
          previousQuarter = "March 31, "+ yearEnded;
          previousQuarterShort = "Q4 "+ resYear + (yearEnded - 1);
        }
        if((resYear == "CY") && (finResults == "Q4"))
        {
          previousQuarter = "September 30, "+ yearEnded;
          previousQuarterShort = "Q3 "+ resYear + yearEnded;
          resCurrentPeriod = "Calendar Year ended ";
          resShortCurrentPeriod = "Year Ended ";
          resPreviousPeriod = "Calender Year ended ";
        }
        if((resYear == "CY") && (finResults == "Q3"))
        {
          previousQuarter = "June 30, "+ yearEnded;
          previousQuarterShort = "Q2 "+ resYear + yearEnded;
          resCurrentPeriod = "9 Months period ended ";
          resShortCurrentPeriod = "9 Months Ended ";
          resPreviousPeriod = "9 Months period ended ";
        }
        if((resYear == "CY") && (finResults == "Q2"))
        {
          previousQuarter = "March 31, "+ yearEnded;
          previousQuarterShort = "Q1 "+ resYear + yearEnded;
          presCurrentPeriod = "6 Months period ended ";
          resShortCurrentPeriod = "Half Year Ended ";
          resPreviousPeriod = "6 Months period ended ";
        }
        if((resYear == "CY") && (finResults == "Q1"))
        {
          previousQuarter = "December 31, "+ (yearEnded - 1);
          previousQuarterShort = "Q4 "+ resYear + (yearEnded - 1);
        }
        $.fn.banksFunction = function()
        {
          bankTemplate =   '<b>Asset Quality:</b><br><br>';
          bankTemplate +=  '<table width="100%" border="2" bordercolor="#789940" cellspacing="0" cellpadding="0">';
          bankTemplate +=  '<tr>';
          bankTemplate +=  '  <td class="newsheader"><b>Asset Quality</b></td>';
          bankTemplate +=  '  <td class="newsheader"><b>'+currentQuarterShort+'</b></td>';
          bankTemplate +=  '  <td class="newsheader"><b>'+previousQuarterShort+'</b></td>';
          bankTemplate +=  '  <td class="newsheader"><b>'+previousYearQuarterShort+'</b></td>';
          bankTemplate +=  '</tr>';
          bankTemplate +=  '<tr>';
          bankTemplate +=  ' <td><b>Gross NPA</b></td>';
          bankTemplate +=  ' <td>&#x20B9;'+bnkGrsNPACurrQuarter+' crs</td>';
          bankTemplate +=  ' <td>&#x20B9;'+bnkGrsNPAPreviousQuarter+'  crs</td>';
          bankTemplate +=  ' <td>&#x20B9;'+bnkGrsNPAPreviousCQ+' crs</td>';
          bankTemplate +=  '</tr><tr>';
          bankTemplate +=  '  <td><b>Gross NPA %</b></td>';
          bankTemplate +=  '  <td>'+bnkGrsNPACurrQuarterPer+'%</td>';
          bankTemplate +=  '  <td>'+bnkGrsNPAPreviousQuarterPer+'%</td>';
          bankTemplate +=  '  <td>'+bnkGrsNPAPreviousCQPer+'%</td>';
          bankTemplate +=  '</tr>';
          bankTemplate +=  '<tr>';
          bankTemplate +=  '  <td><b>Net NPA</b></td>';
          bankTemplate +=  '  <td>&#x20B9;'+bnkNetNPACurrQuarter+' crs</td>';
          bankTemplate +=  '  <td>&#x20B9;'+bnkNetNPAPreviousQuarter+'  crs</td>';
          bankTemplate +=  '  <td>&#x20B9;'+bnkNetNPAPreviousCQ+' crs</td>';
          bankTemplate +=  '</tr>';
          bankTemplate +=  '<tr>';
          bankTemplate +=  '  <td><b>Net NPA %</b></td>';
          bankTemplate +=  '  <td>'+bnkNetNPACurrQuarterPer+'%</td>';
          bankTemplate +=  '  <td>'+bnkNetNPAPreviousQuarterPer+'%</td>';
          bankTemplate +=  '  <td>'+bnkNetNPAPreviousCQPer+'%</td>';
          bankTemplate +=  '</tr>';
          bankTemplate +=  '</table><br><br>';
          bankTemplate +=  'Gross NPA was at &#x20B9; '+bnkGrsNPACurrQuarter+' crs in '+currentQuarterShort+' against &#x20B9; '+bnkGrsNPAPreviousCQ+' crs in '+previousYearQuarterShort+'. The same was at &#x20B9; '+bnkGrsNPAPreviousQuarter+' crs in '+previousQuarterShort+'.<br><br>';
          bankTemplate +=  'Net NPA was at &#x20B9; '+bnkNetNPACurrQuarter+' crs in '+currentQuarterShort+' against &#x20B9; '+bnkNetNPAPreviousCQ+' crs in '+previousYearQuarterShort+'. The same was at &#x20B9; '+bnkNetNPAPreviousQuarter+' crs in '+previousQuarterShort+'.<br><br>';
          bankTemplate +=  "GNPA was at "+bnkGrsNPACurrQuarterPer+"% of Gross advances as on "+currentQuarter+" as compared to "+bnkGrsNPAPreviousCQPer+"% as on "+previousYearQuarterShort+" and "+bnkGrsNPAPreviousQuarterPer+"% as of "+prevYearCurrentQuarter+".<br><br>";
          bankTemplate +=  "Net NPA was at "+bnkNetNPACurrQuarterPer+"% of Gross advances as on "+currentQuarter+" as compared to "+bnkNetNPAPreviousCQPer+"% as on "+previousYearQuarterShort+" and "+bnkNetNPAPreviousQuarterPer+"% as of "+prevYearCurrentQuarter+".<br><br>";
          bankTemplate +=  '<table width="100%" border="2" bordercolor="#789940" cellspacing="0" cellpadding="0">';
          bankTemplate +=  '  <tr>';
          bankTemplate +=  '    <td class="newsheader"><b>Ratios</b></td>';
          bankTemplate +=  '    <td class="newsheader"><b>'+currentQuarterShort+'</b></td>';
          bankTemplate +=  '    <td class="newsheader"><b>'+previousQuarterShort+'</b></td>';
          bankTemplate +=  '    <td class="newsheader"><b>'+previousYearQuarterShort+'</b></td>';
          bankTemplate +=  '  </tr>';
          bankTemplate +=  '    <tr>';
          bankTemplate +=  '      <td><b>RoA %</b></td>';
          bankTemplate +=  '      <td>'+bnkRetAsstCurrQuarter+'%</td>';
          bankTemplate +=  '      <td>'+bnkRetAsstPreviousQuarter+'%</td>';
          bankTemplate +=  '      <td>'+bnkRetAsstPreviousCQ+'%</td>';
          bankTemplate +=  '    </tr>';
          bankTemplate +=  '      <td><b>CAR (BASEL III) %</b></td>';
          bankTemplate +=  '      <td>'+bnkCapAdeCurrQuarter+'%</td>';
          bankTemplate +=  '      <td>'+bnkCapAdePreviousQuarter+'%</td>';
          bankTemplate +=  '      <td>'+bnkCapAdePreviousCQ+'%</td>';
          bankTemplate +=  '    </tr></table><br><br>';
          bankTemplate +=  'Return on Average Assets (RoA) is at '+bnkRetAsstCurrQuarter+'% for '+currentQuarterShort+' against '+bnkRetAsstPreviousQuarter+'% in '+previousQuarterShort+' and '+bnkRetAsstPreviousCQ+'% in '+previousYearQuarterShort+'.<br><br>';
          bankTemplate +=  "In "+currentQuarterShort+", Bank's total Capital Adequacy Ratio (CAR) was at "+bnkCapAdeCurrQuarter+"%, as compared to "+bnkCapAdePreviousQuarter+"% in "+previousQuarterShort+" and "+bnkCapAdePreviousCQ+"% in "+previousYearQuarterShort+".<br><br>";
          return bankTemplate;
        }  
        $.fn.banksTamilFunction = function()
        {
          bankTamilTemplate =   '<b>சொத்து தரம்:</b><br><br>';
          bankTamilTemplate +=  '<table width="100%" border="2" bordercolor="#789940" cellspacing="0" cellpadding="0">';
          bankTamilTemplate +=  ' <tr>';
          bankTamilTemplate +=  '   <td class="newsheader"><b>சொத்து தரம்</b></td>';
          bankTamilTemplate +=  '   <td class="newsheader"><b>'+currentQuarterShort+'</b></td>';
          bankTamilTemplate +=  '   <td class="newsheader"><b>'+previousQuarterShort+'</b></td>';
          bankTamilTemplate +=  '   <td class="newsheader"><b>'+previousYearQuarterShort+'</b></td>';
          bankTamilTemplate +=  '</tr>';
          bankTamilTemplate +=  '<tr>';
          bankTamilTemplate +=  ' <td><b>மொத்த வாராக் கடன்</b></td>';
          bankTamilTemplate +=  ' <td>&#x20B9;'+bnkGrsNPACurrQuarter+' கோடி</td>';
          bankTamilTemplate +=  ' <td>&#x20B9;'+bnkGrsNPAPreviousQuarter+' கோடி</td>';
          bankTamilTemplate +=  ' <td>&#x20B9;'+bnkGrsNPAPreviousCQ+' கோடி</td>';
          bankTamilTemplate +=  '</tr>';
          bankTamilTemplate +=  '<td><b>மொத்த வாராக் கடன் %</b></td>';
          bankTamilTemplate +=  '<td>'+bnkGrsNPACurrQuarterPer+'%</td>';
          bankTamilTemplate +=  '<td>'+bnkGrsNPAPreviousQuarterPer+'%</td>'
          bankTamilTemplate +=  '<td>'+bnkGrsNPAPreviousCQPer+'%</td>';
          bankTamilTemplate +=  '</tr>';
          bankTamilTemplate +=  '<tr>';
          bankTamilTemplate +=  ' <td><b>நிகர வாராக் கடன்</b></td>';
          bankTamilTemplate +=  ' <td>&#x20B9;'+bnkNetNPACurrQuarter+' கோடி</td>';
          bankTamilTemplate +=  '<td>&#x20B9;'+bnkNetNPAPreviousQuarter+' கோடி</td>';
          bankTamilTemplate +=  '<td>&#x20B9;'+bnkNetNPAPreviousCQ+' கோடி</td>';
          bankTamilTemplate +=  '</tr>';
          bankTamilTemplate +=  '<tr>';
          bankTamilTemplate +=  ' <td><b>நிகர வாராக் கடன் %</b></td>';
          bankTamilTemplate +=  ' <td>'+bnkNetNPACurrQuarterPer+'%</td>';
          bankTamilTemplate +=  ' <td>'+bnkNetNPAPreviousQuarterPer+'%</td>';
          bankTamilTemplate +=  ' <td>'+bnkNetNPAPreviousCQPer+'%</td>';
          bankTamilTemplate +=  '</tr>';
          bankTamilTemplate +=  '</table><br><br>';
          bankTamilTemplate +=  'வங்கியின் மொத்த வாராக் கடன் ஜூன் 30, 2021ல் முடிவடைந்த காலாண்டில் ('+currentQuarterShort+') &#x20B9; '+bnkGrsNPACurrQuarter+' கோடியாக இருந்தது, இது முந்தய நிதி ஆண்டின் இதே காலாண்டில் ('+previousYearQuarterShort+') &#x20B9; '+bnkGrsNPAPreviousCQ+' கோடியாகவும்,  '+previousQuarterShort+'ல் (முந்தய காலாண்டில்) &#x20B9; '+bnkGrsNPAPreviousQuarter+' கோடியாகவும் இருந்தது.<br><br>';
          bankTamilTemplate +=  'நிகர வாராக் கடன் '+currentQuarterShort+'ல் (ஜூன் 30, 2021ல் முடிவடைந்த காலாண்டு) &#x20B9; '+bnkNetNPACurrQuarter+' கோடியாக இருந்தது, இது  '+previousYearQuarterShort+'ல் &#x20B9; '+bnkNetNPAPreviousCQ+' கோடியாகவும், முந்தய காலாண்டில் ('+previousQuarterShort+') &#x20B9; '+bnkNetNPAPreviousQuarter+' கோடியாகவும் இருந்தது.<br><br>';
          bankTamilTemplate +=  'ஜூன் 30, 2021ல் மொத்த கடன்களில் வாராக் கடன் விகிதம் '+bnkGrsNPACurrQuarterPer+'% ஆக இருந்தது. இது முந்தய நிதி ஆண்டின் இதே காலாண்டில் '+bnkGrsNPAPreviousCQPer+'%ஆகவும், '+previousQuarter+'ல் '+bnkGrsNPAPreviousQuarterPer+'%ஆகவும் இருந்தது.<br><br>';
          bankTamilTemplate +=  'வங்கியின் நிகர வாராக் கடன் விகிதம் ஜூன் 30, 2021ல் முடிவடைந்த காலாண்டில் மொத்த கடன்களில் '+bnkNetNPACurrQuarterPer+'%ஆக இருந்தது. இது சென்ற நிதி ஆண்டின் இதே காலாண்டில் ('+prevYearCurrentQuarter+') '+bnkNetNPAPreviousCQPer+'%ஆகவும் முந்தய காலாண்டில் '+bnkNetNPAPreviousQuarterPer+'% ஆகவும் இருந்தது.<br><br>';
          bankTamilTemplate +=  '<table width="100%" border="2" bordercolor="#789940" cellspacing="0" cellpadding="0">';
          bankTamilTemplate +=  ' <tr>';
          bankTamilTemplate +=  ' <td class="newsheader"><b>விகிதங்கள்</b></td>';
          bankTamilTemplate +=  ' <td class="newsheader"><b>'+currentQuarterShort+'</b></td>';
          bankTamilTemplate +=  ' <td class="newsheader"><b>'+previousQuarterShort+'</b></td>';
          bankTamilTemplate +=  ' <td class="newsheader"><b>'+previousYearQuarterShort+'</b></td>';
          bankTamilTemplate +=  '</tr>';
          bankTamilTemplate +=  '<tr>';
          bankTamilTemplate +=  ' <td><b>சொத்துக்களின் மீது வருவாய்%</b></td>';
          bankTamilTemplate +=  ' <td>'+bnkRetAsstCurrQuarter+'%</td>';
          bankTamilTemplate +=  '<td>'+bnkRetAsstPreviousQuarter+'%</td>';
          bankTamilTemplate +=  '<td>'+bnkRetAsstPreviousCQ+'%</td>';
          bankTamilTemplate +=  '</tr>';
          bankTamilTemplate +=  '<tr>';
          bankTamilTemplate +=  ' <td><b>போதுமான மூலதன விகிதம் (CAR - BASEL III)</b></td>';
          bankTamilTemplate +=  ' <td>'+bnkCapAdeCurrQuarter+'%</td>';
          bankTamilTemplate +=  ' <td>'+bnkCapAdePreviousQuarter+'%</td>';
          bankTamilTemplate +=  ' <td>'+bnkCapAdePreviousCQ+'%</td>';
          bankTamilTemplate +=  '</tr>';
          bankTamilTemplate +=  '</table><br><br>';
          bankTamilTemplate +=  'ஜூன் 30, 2021ல் முடிவடைந்த காலாண்டில் ('+currentQuarterShort+') சொத்துக்களின் மீதான வருவாய் '+bnkRetAsstCurrQuarter+'% ஆக இருந்தது. இது முந்தய காலாண்டில் ('+previousQuarterShort+') '+bnkRetAsstPreviousQuarter+'% மற்றும் '+previousYearQuarterShort+'ல் '+bnkRetAsstPreviousCQ+'% ஆக இருந்தது.<br><br>';
          bankTamilTemplate +=  currentQuarterShort+'ல், வங்கியின் மொத்த போதுமான மூலதன விகிதம் (Capital Adequacy Ratio - CAR) '+bnkCapAdeCurrQuarter+'%ஆகவும், '+previousQuarterShort+'ல் '+bnkCapAdePreviousQuarter+'% ஆகவும் '+previousYearQuarterShort+'ல் '+bnkCapAdePreviousCQ+'% ஆகவும் இருந்தது.<br><br>';
          return bankTamilTemplate;
        }  
        var companyISIN = $("#isin").val();
        var overAllText = "";
        $.ajax({ url: "../controller/CompanyNameController.php",
            type: 'get',
            data: {companyISIN:companyISIN},
            success: function (output)
            {
              var obj = JSON.parse(output);
              var bseText = "";
              var nseText = "";
              $.each(obj, function(key,value)
              {
                companyName = value.company_name;
                alert(companyName);
                if(value.tag=="BSE")
                {
                  bseText="Shares of " + value.company_name + " was last trading in " + value.tag + " at Rs. " + value.close + " as compared to the previous close of Rs. " + value.prevclose + " .";
                  bseText+="The total number of shares traded during the day was " + value.no_of_shrs + " in over " + value.no_trades + " trades.<br><br>The stock hit an intraday high of Rs. " + value.high + "  and intraday low of " + value.low + ".";
                  bseText+="The net turnover during the day was Rs. " + value.net_turnov + ". <br><br>";
                  overAllText+=bseText;
                }
                else
                {
                  nseText="Shares of " + value.company_name + " was last trading in "+ value.tag + " at Rs. "+ value.close +" as compared to the previous close of Rs. " + value.prevclose + " .";
                  nseText+="The total number of shares traded during the day was "+ value.no_of_shrs +" in over " + value.no_trades+ " trades.<br><br>The stock hit an intraday high of Rs. " + value.high + " and intraday low of " + value.low + ".";
                  nseText+="The total traded value during the day was Rs. "+ value.net_turnov + ". <br><br>";
                  overAllText+=nseText;
                }
                });
                $('input[id=test]').val(overAllText);
                alert(overAllText);
                }
              });  
              if(resTemplate == "T1")
              {
                newsTemplate =   companyName+" has reported "+resultsType+" financial results for the period ended "+currentQuarter+".<br><br>";
                newsTemplate += "<b>Financial Results ("+finResults+' '+resYear+yearEnded+") - QoQ Comparison </b><br><br>";
                newsTemplate += "The company has reported total income of Rs. "+shTotCurrQuarter+" crores during the period ended "+currentQuarter+" as compared to Rs. "+shTotPreviousQuarter+" crores during the period ended "+previousQuarter+".<br><br>";
                newsTemplate += "The company has posted net profit / (loss) of Rs. "+shNetCurrQuarter+" crores for the period ended "+currentQuarter+" as against net profit / (loss) of Rs. "+shNetPreviousQuarter+" crores for the period ended "+previousQuarter+".<br><br>";
                newsTemplate += "The company has reported EPS of Rs. "+shEarCurrQuarter+" for the period ended "+currentQuarter+" as compared to Rs. "+shEarPreviousQuarter+" for the period ended "+previousQuarter+".<br><br>";
                newsTemplate +=  '<table width="100%" border="2" bordercolor="#789940" cellspacing="0" cellpadding="0">';
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td class="newsheader"><b>Financials</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+currentQuarterShort+'</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+previousQuarterShort+'</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>% Change</b></td>';
                newsTemplate +=  '  </tr>';
                totRetValPercentage = $.fn.myFunction(shTotCurrQuarter,shTotPreviousQuarter,parseFloat(((shTotCurrQuarter/shTotPreviousQuarter)-1)*100).toFixed(2));
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '     <td><b>Total Income</b></td>';
                newsTemplate +=  '     <td>&#x20B9;'+shTotCurrQuarter+' crs</td>';
                newsTemplate +=  '     <td>&#x20B9;'+shTotPreviousQuarter+'  crs</td>';
                newsTemplate +=  '     <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+totRetValPercentage+'%</td>';
                newsTemplate +=  '  </tr>';
                netRetValPercentage = $.fn.myFunction(shNetCurrQuarter,shNetPreviousQuarter,parseFloat(((shNetCurrQuarter/shNetPreviousQuarter)-1)*100).toFixed(2));
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td><b>Net Profit</b></td>';
                newsTemplate +=  '    <td>&#x20B9;'+shNetCurrQuarter+' crs</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shNetPreviousQuarter+'  crs</td>';
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+netRetValPercentage+'%</td>';
                newsTemplate +=  '  </tr>';
                earRetValPercentage = $.fn.myFunction(shEarCurrQuarter,shEarPreviousQuarter,parseFloat(((shEarCurrQuarter/shEarPreviousQuarter)-1)*100).toFixed(2));
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td><b>EPS</b></td>';
                newsTemplate +=  '    <td>&#x20B9;'+shEarCurrQuarter+'</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shEarPreviousQuarter+'</td>';
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+earRetValPercentage+'%</td>';
                newsTemplate +=  '  </tr>';
                newsTemplate +=  '</table><br>';
                newsTemplate +=  "<b>Financial Results  ("+finResults+" "+resYear+yearEnded+") - YoY Comparison </b> <br><br>";
                newsTemplate +=  "The company has reported total income of Rs."+shTotCurrQuarter+" crores during the period ended "+currentQuarter+" as compared to Rs."+shTotPreviousCQ+" crores during the period ended "+prevYearCurrentQuarter+".<br><br>";
                newsTemplate +=  "The company has posted net profit / (loss) of Rs."+shNetCurrQuarter+" crores for the period ended "+currentQuarter+" as against net profit / (loss) of Rs."+shNetPreviousCQ+" crores for the period ended "+prevYearCurrentQuarter+".<br><br>";
                newsTemplate +=  "The company has reported EPS of Rs."+shEarCurrQuarter+" for the "+resCurrentPeriod+" "+currentQuarter+" as compared to Rs."+shEarPreviousCQ+" for the "+resPreviousPeriod+" "+prevYearCurrentQuarter+".<br><br>";
                newsTemplate +=  '<table width="100%" border="2" bordercolor="#789940" cellspacing="0" cellpadding="0">';
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td class="newsheader"><b>Financials</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+currentQuarterShort+'</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+previousYearQuarterShort+'</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>% Change</td></b>';
                newsTemplate +=  '  </tr>';
                newsTemplate +=  '  <tr>';
                totRetValPercentage = $.fn.myFunction(shTotCurrQuarter,shTotPreviousCQ,parseFloat(((shTotCurrQuarter/shTotPreviousCQ)-1)*100).toFixed(2));
                newsTemplate +=  '    <td><b>Total Income</b></td>';
                newsTemplate +=  '    <td>&#x20B9;'+shTotCurrQuarter+' crs</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shTotPreviousCQ+' crs</td>';
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+totRetValPercentage+'%</td>';
                newsTemplate +=  '  </tr>';
                netRetValPercentage = $.fn.myFunction(shNetCurrQuarter,shNetPreviousCQ,parseFloat(((shNetCurrQuarter/shNetPreviousCQ)-1)*100).toFixed(2));
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td><b>Net Profit</b></td>';
                newsTemplate +=  '    <td>&#x20B9;'+shNetCurrQuarter+'  crs</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shNetPreviousCQ+' crs</td>';
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+netRetValPercentage+'%</td>';
                newsTemplate +=  '  </tr>';
                earRetValPercentage = $.fn.myFunction(shEarCurrQuarter,shEarPreviousCQ,parseFloat(((shEarCurrQuarter/shEarPreviousCQ)-1)*100).toFixed(2));              
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td><b>EPS</b></td>';
                newsTemplate +=  '    <td>&#x20B9;'+shEarCurrQuarter+'</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shEarPreviousCQ+'</td>';
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+earRetValPercentage+'%</td>';
                newsTemplate +=  '  </tr>';
                newsTemplate +=  ' </table><br>';
                newsTemplate +=  "<b>Financial Results ("+resShortCurrentPeriod+" "+resYear+yearEnded+") - YoY Comparison </b> <br><br>";
                newsTemplate +=  "The company has reported total income of Rs."+shTotCurrentFY+" crores during the "+resCurrentPeriod+" "+currentQuarter+" as compared to Rs."+shTotPreviousFY+" crores during the "+resPreviousPeriod+" "+prevYearCurrentQuarter+".<br><br>";
                newsTemplate +=  "The company has posted net profit / (loss) of Rs."+shNetCurrentFY+" crores for the "+resCurrentPeriod+" "+currentQuarter+" as against net profit / (loss) of Rs."+shNetPreviousFY+" crores for the "+resPreviousPeriod+" "+prevYearCurrentQuarter+".<br><br>";
                newsTemplate +=  "The company has reported EPS of Rs."+shEarCurrentFY+" for the "+resCurrentPeriod+" "+currentQuarter+" as compared to Rs."+shEarPreviousFY+ " for the "+resPreviousPeriod+" "+prevYearCurrentQuarter+".<br><br>";
                newsTemplate +=  '<table width="100%" border=2 bordercolor=#789940 cellspacing=0 cellpadding=0>';
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td class="newsheader"><b>Financials</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+resShortCurrentPeriod+' '+resYear+yearEnded+'</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+resShortCurrentPeriod+' '+resYear+(yearEnded-1)+'</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>% Change</b></td>';
                newsTemplate +=  '  </tr>';
                totRetValPercentage = $.fn.myFunction(shTotCurrentFY,shTotPreviousFY,parseFloat(((shTotCurrentFY/shTotPreviousFY)-1)*100).toFixed(2));              
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td><b>Total Income</b></td>';
                newsTemplate +=  '    <td>&#x20B9;'+shTotCurrentFY+' crs</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shTotPreviousFY+' crs</td>';
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+totRetValPercentage+'%</td>';
                newsTemplate +=  '  </tr>';
                netRetValPercentage = $.fn.myFunction(shNetCurrentFY,shNetPreviousFY,parseFloat(((shNetCurrentFY/shNetPreviousFY)-1)*100).toFixed(2));
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td><b>Net Profit</b></td>';
                newsTemplate +=  '    <td>&#x20B9;'+shNetCurrentFY+' crs</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shNetPreviousFY+' crs</td>';
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+netRetValPercentage+'%</td>';
                newsTemplate +=  '  </tr>';
                earRetValPercentage = $.fn.myFunction(shEarCurrentFY,shEarPreviousFY,parseFloat(((shEarCurrentFY/shEarPreviousFY)-1)*100).toFixed(2));              
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td><b>EPS</b></td>';
                newsTemplate +=  '    <td>&#x20B9;'+shEarCurrentFY+'</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shEarPreviousFY+'</td>';
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+earRetValPercentage+'%</td>';
                newsTemplate +=  '  </tr>';
                newsTemplate +=  '</table><br>';
                newsTamilTemplate = companyName+" நிறுவனம் "+currentQuarter+" அன்று முடிவடைந்த காலாண்டுக்கான நிதிநிலை முடிவுகளை அறிவித்துவுள்ளது.<br><br>இந்த நிறுவனம் "+currentQuarter+" ல் முடிவடைந்த காலாண்டில் செயல்பாடுகளின் மூலம் ரூபாய் "+shTotCurrQuarter+" கோடி மொத்த வருமானம்  ஈட்டியுள்ளது, இது "+previousQuarter+" ல் முடிவடைந்த காலாண்டில் ரூ. "+shTotPreviousQuarter+" கோடியாகவும் "+prevYearCurrentQuarter+"ல் முடிவடைந்த காலாண்டில் ரூ. "+shTotPreviousCQ+" கோடியாகவும் இருந்தது.<br><br>";
                newsTamilTemplate += '<table width="100%" border="2" bordercolor="#000000" cellspacing="0" cellpadding="0">';
                newsTamilTemplate += '<tr>';
                newsTamilTemplate += '<td>நிதிநிலை முடிவுகள்</td>';
                newsTamilTemplate += '<td>'+currentQuarterShort+'</td>';
                newsTamilTemplate += '<td>'+previousQuarterShort+'</td>'
                newsTamilTemplate += '<td>% மாற்றம் காலாண்டு QoQ </td>'
                newsTamilTemplate += '</tr><tr>';
                newsTamilTemplate += '<td>மொத்த வருவாய்</td><td>&#x20B9; '+shTotCurrQuarter+' crs</td>';
                newsTamilTemplate += '<td>&#x20B9; '+shTotPreviousQuarter+' கோடி</td>';
                totRetValPercentage = $.fn.myFunction(shTotCurrQuarter,shTotPreviousQuarter,parseFloat(((shTotCurrQuarter/shTotPreviousQuarter)-1)*100).toFixed(2));
                newsTamilTemplate += '<td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+totRetValPercentage+'%</td></tr>';
                newsTamilTemplate += '<tr><td>நிகர லாபம்</td><td>&#x20B9;'+shNetCurrQuarter+' crs</td>';
                newsTamilTemplate += '<td>&#x20B9;'+shNetPreviousQuarter+' கோடி</td>';
                netRetValPercentage = $.fn.myFunction(shNetCurrQuarter,shNetPreviousQuarter,parseFloat(((shNetCurrQuarter/shNetPreviousQuarter)-1)*100).toFixed(2));                
                newsTamilTemplate += '<td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+netRetValPercentage+'%</td></tr>';
                newsTamilTemplate += '<tr><td>ஒரு பங்கு விகித ஈட்டுத் தொகை</td>';
                newsTamilTemplate += '<td>&#x20B9;'+shEarCurrQuarter+'</td>';
                newsTamilTemplate += '<td>&#x20B9;'+shEarPreviousQuarter+'</td>';
                earRetValPercentage = $.fn.myFunction(shEarCurrQuarter,shEarPreviousQuarter,parseFloat(((shEarCurrQuarter/shEarPreviousQuarter)-1)*100).toFixed(2));                
                newsTamilTemplate += '<td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+earRetValPercentage+'%</td></tr></table><br>';
                newsTamilTemplate += currentQuarter+"ல் முடிவடைந்த காலாண்டில் நிறுவனத்தின் வரிக்கு பின் நிகர லாபம் ரூபாய் "+shNetCurrQuarter+" கோடியாக இருந்தது. இது "+previousQuarter+"ல் முடிவடைந்த காலாண்டில் ரூ. "+shNetPreviousQuarter+" கோடியாகவும், "+prevYearCurrentQuarter+"ல் முடிவடைந்த காலாண்டில் ரூ. "+shNetPreviousCQ+" ஆக இருந்தது.<br><br>";
                newsTamilTemplate += '<table width="100%" border=2 bordercolor=#000000 cellspacing=0 cellpadding=0>';
                newsTamilTemplate += ' <tr>';
                newsTamilTemplate += '  <td>நிதிநிலை முடிவுகள்</td>';
                newsTamilTemplate += '  <td>'+currentQuarterShort+'</td>';
                newsTamilTemplate += '  <td>'+previousYearQuarterShort+'</td>';
                newsTamilTemplate += '  <td>% மாற்றம் காலாண்டு YoY</td>';
                newsTamilTemplate += '</tr>';
                newsTamilTemplate += '<tr>';
                newsTamilTemplate += '  <td>மொத்த வருவாய்</td>';
                newsTamilTemplate += '  <td>&#x20B9; '+shTotCurrQuarter+' கோடி</td>';
                newsTamilTemplate += '  <td>&#x20B9; '+shTotPreviousCQ+' கோடி</td>';
                totRetValPercentage = $.fn.myFunction(shTotCurrQuarter,shTotPreviousCQ,parseFloat(((shTotCurrQuarter/shTotPreviousCQ)-1)*100).toFixed(2));                
                newsTamilTemplate += '  <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+totRetValPercentage+'%</td>';
                newsTamilTemplate += '</tr>';
                newsTamilTemplate += '<tr>';
                newsTamilTemplate += '  <td>நிகர லாபம்</td>';
                newsTamilTemplate += '  <td>&#x20B9; '+shNetCurrQuarter+' கோடி</td>';
                newsTamilTemplate += '  <td>&#x20B9; '+shNetPreviousCQ+' கோடி</td>';
                netRetValPercentage = $.fn.myFunction(shNetCurrQuarter,shNetPreviousCQ,parseFloat(((shNetCurrQuarter/shNetPreviousCQ)-1)*100).toFixed(2));
                newsTamilTemplate += '  <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+netRetValPercentage+'%</td>';
                newsTamilTemplate += '</tr>';
                newsTamilTemplate += '<tr>';
                newsTamilTemplate += '  <td>ஒரு பங்கு விகித ஈட்டுத் தொகை</td>';
                newsTamilTemplate += '  <td>&#x20B9; '+shEarCurrQuarter+'</td>';
                newsTamilTemplate += '  <td>&#x20B9; '+shEarPreviousCQ+'</td>';
                earRetValPercentage = $.fn.myFunction(shEarCurrQuarter,shEarPreviousCQ,parseFloat(((shEarCurrQuarter/shEarPreviousCQ)-1)*100).toFixed(2));
                newsTamilTemplate += '  <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+earRetValPercentage+'%</td>';
                newsTamilTemplate += '</tr>';
                newsTamilTemplate += '</table><br>';
                newsTamilTemplate += currentQuarter+'ல் முடிவடைந்த காலாண்டில் ஒரு பங்கு விகித ஈட்டுத் தொகை ரூ. '+shEarCurrQuarter+' ஆக இருந்தது. இது '+previousQuarter+'ல் முடிவடைந்த காலாண்டில் ரூ. '+shEarPreviousQuarter+' ஆக இருந்தது, '+prevYearCurrentQuarter+'ல் முடிவடைந்த காலாண்டில் ரூ. '+shEarPreviousCQ+' ஆக இருந்தது.<br><br>';
                if($("#banks").css('display') != 'none')
                {
                  bankTemplate = $.fn.banksFunction();
                  bankTamilTemplate = $.fn.banksTamilFunction();
                  newsTamilTemplate = newsTamilTemplate + bankTamilTemplate;
                  newsTemplate = newsTemplate + bankTemplate + overAllText ;
                }
                else
                  newsTemplate = newsTemplate + overAllText;
                //$("#test").val(newsTemplate); 
                // $("input[type=hidden][id=test]").val(newsTemplate);
                // $("input[type=hidden][id=test]").val();
								// alert( $("input[type=hidden][id=test]").val());
                $('input[id=test]').val(newsTemplate);
                alert(newsTemplate);
              }
              if(resTemplate == "T2")
              {
                newsTemplate =  "The Board of Directors of "+companyName+", at its meeting held today have approved the unaudited "+resultsType+" financial results of the company for the period ended "+currentQuarter+".<br><br>";
                newsTemplate += "For the quarter ended <Current Quarter> ("+finResults+" "+resYear+yearEnded+", the company's total income was &#x20B9;"+shTotCurrQuarter+" crore, against &#x20B9;"+shTotPreviousCQ+" crore in the corresponding quarter of the previous year (YoY) and &#x20B9;"+shTotPreviousQuarter+" crore in previous quarter of current year (QoQ).<br><br>";
                newsTemplate += "For the quarter ended "+currentQuarter+"("+finResults+" "+resYear+yearEnded+"), the company's net profit / (loss) was &#x20B9;"+shNetCurrQuarter+" crore, against &#x20B9;"+shNetPreviousCQ+" crore in the corresponding quarter of the previous year (YoY) and &#x20B9;"+shNetPreviousQuarter+" crore in previous quarter of current year (QoQ).<br><br>";
                newsTemplate += "For the quarter ended "+currentQuarter+"("+finResults+" "+resYear+yearEnded+"), the company's Earnings Per Share (EPS) was &#x20B9;"+shEarCurrQuarter+", against &#x20B9;"+shEarPreviousCQ+" in the corresponding quarter of the previous year (YoY) and &#x20B9;"+shEarPreviousQuarter+" in previous quarter of current year (QoQ).<br><br>";
                newsTemplate +=  '<table width="100%" border="2" bordercolor="#789940" cellspacing="0" cellpadding="0">';
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td class="newsheader"><b>Financials</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+currentQuarterShort+'</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+previousQuarterShort+'</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>QoQ % Change</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+previousYearQuarterShort+'</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>YoY % Change</b></td>';
                newsTemplate +=  '  </tr>';
                totRetValPercentage = $.fn.myFunction(shTotCurrQuarter,shTotPreviousQuarter,parseFloat(((shTotCurrQuarter/shTotPreviousQuarter)-1)*100).toFixed(2));
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '     <td><b>Total Income</b></td>';
                newsTemplate +=  '     <td>&#x20B9;'+shTotCurrQuarter+' crs</td>';
                newsTemplate +=  '     <td>&#x20B9;'+shTotPreviousQuarter+'  crs</td>';
                newsTemplate +=  '     <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+totRetValPercentage+'%</td>';
                newsTemplate +=  '     <td>&#x20B9;'+shTotPreviousCQ+' crs</td>';
                totRetValPercentage = $.fn.myFunction(shTotCurrQuarter,shTotPreviousCQ,parseFloat(((shTotCurrQuarter/shTotPreviousCQ)-1)*100).toFixed(2));
                newsTemplate +=  '     <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+totRetValPercentage+'%</td>';
                newsTemplate +=  '  </tr>';
                netRetValPercentage = $.fn.myFunction(shNetCurrQuarter,shNetPreviousQuarter,parseFloat(((shNetCurrQuarter/shNetPreviousQuarter)-1)*100).toFixed(2));
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td><b>Net Profit</b></td>';
                newsTemplate +=  '    <td>&#x20B9;'+shNetCurrQuarter+' crs</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shNetPreviousQuarter+'  crs</td>';
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+netRetValPercentage+'%</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shNetPreviousCQ+' crs</td>';
                netRetValPercentage = $.fn.myFunction(shNetCurrQuarter,shNetPreviousCQ,parseFloat(((shNetCurrQuarter/shNetPreviousCQ)-1)*100).toFixed(2));
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+netRetValPercentage+' %</td>'; 
                newsTemplate +=  '  </tr>';
                newsTemplate +=  '  <tr>';
                earRetValPercentage = $.fn.myFunction(shEarCurrQuarter,shEarPreviousQuarter,parseFloat(((shEarCurrQuarter/shEarPreviousQuarter)-1)*100).toFixed(2));
                newsTemplate +=  '    <td><b>EPS</b></td>';
                newsTemplate +=  '    <td>&#x20B9;'+shEarCurrQuarter+'</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shEarPreviousQuarter+'</td>';
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+earRetValPercentage+'%</td>';
                earRetValPercentage = $.fn.myFunction(shEarCurrQuarter,shEarPreviousCQ,parseFloat(((shEarCurrQuarter/shEarPreviousCQ)-1)*100).toFixed(2));              
                newsTemplate +=  '    <td>&#x20B9;'+shEarPreviousCQ+'</td>';
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+earRetValPercentage+'%</td>';                    
                newsTemplate +=  '  </tr>';
                newsTemplate +=  '</table><br>';
                newsTemplate +=  "For the "+resCurrentPeriod+" "+currentQuarter+"("+resShortCurrentPeriod+" "+resYear+" "+yearEnded+"), the company's total income was &#x20B9;"+shTotCurrentFY+" crore, against &#x20B9;"+shTotPreviousFY+" crore in the previous year (YoY) ("+resShortCurrentPeriod+" "+resYear+" "+(yearEnded - 1)+").<br><br>";
                newsTemplate +=  "The net profit / (loss) was at &#x20B9;"+shNetCurrentFY+" crore for the "+resCurrentPeriod+" "+currentQuarter+" ("+resShortCurrentPeriod+" "+resYear+" "+yearEnded+"), compared to &#x20B9;"+shNetPreviousFY+" crore in the previous year (YoY) ("+resShortCurrentPeriod+" "+resYear+" "+(yearEnded - 1)+").<br><br>";
                newsTemplate +=  "The Earnings Per Share stood at &#x20B9;"+shEarCurrentFY+" for the "+resCurrentPeriod+" "+currentQuarter+" ("+resShortCurrentPeriod+" "+resYear+" "+yearEnded+"), against &#x20B9;"+shEarPreviousFY+" in the previous year (YoY) ("+resShortCurrentPeriod+" "+resYear+" "+(yearEnded - 1)+").<br><br>";
                newsTemplate +=  '<table width="100%" border="2" bordercolor="#789940" cellspacing="0" cellpadding="0">';
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td class="newsheader"><b>Financials</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+resShortCurrentPeriod+' '+resYear+yearEnded+'</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+resShortCurrentPeriod+' '+resYear+(yearEnded - 1)+'</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>% Change</td></b>';
                newsTemplate +=  '  </tr>';
                totRetValPercentage = $.fn.myFunction(shTotCurrentFY,shTotPreviousFY,parseFloat(((shTotCurrentFY/shTotPreviousFY)-1)*100).toFixed(2));              
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td><b>Total Income</b></td>';
                newsTemplate +=  '    <td>&#x20B9;'+shTotCurrentFY+' crs</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shTotPreviousFY+' crs</td>';
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+totRetValPercentage+'%</td>';
                newsTemplate +=  '  </tr>';
                newsTemplate +=  '  <tr>';
                netRetValPercentage = $.fn.myFunction(shNetCurrentFY,shNetPreviousFY,parseFloat(((shNetCurrentFY/shNetPreviousFY)-1)*100).toFixed(2));
                newsTemplate +=  '    <td><b>Net Profit</b></td>';
                newsTemplate +=  '    <td>&#x20B9;'+shNetCurrentFY+'  crs</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shNetPreviousFY+' crs</td>';
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+netRetValPercentage+'%</td>';
                newsTemplate +=  '  </tr>';
                earRetValPercentage = $.fn.myFunction(shEarCurrentFY,shEarPreviousFY,parseFloat(((shEarCurrentFY/shEarPreviousFY)-1)*100).toFixed(2));
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td><b>EPS</b></td>';
                newsTemplate +=  '    <td>&#x20B9;'+shEarCurrentFY+'</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shEarPreviousFY+'</td>';
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'"  alt="Up Tick / Down Tick">'+earRetValPercentage+'%</td>';
                newsTemplate +=  '  </tr>';
                newsTemplate +=  ' </table><br>';
                newsTamilTemplate =  companyName +' நிறுவனம் ஜூன் 30, 2021 அன்று முடிவடைந்த காலாண்டுக்கான நிதிநிலை முடிவுகளை அறிவித்துவுள்ளது.<br><br>';
                newsTamilTemplate += '<table width="100%" border=2 bordercolor=#000000 cellspacing=0 cellpadding=0>';
                newsTamilTemplate += '<tr>';
                newsTamilTemplate += ' <td>நிதிநிலை முடிவுகள்</td>';
                newsTamilTemplate +=  '<td>'+currentQuarterShort+'</td>';
                newsTamilTemplate +=  '<td>'+previousYearQuarterShort+'</td>';
                newsTamilTemplate +=  '<td>% மாற்றம் காலாண்டு YoY</td>';
                newsTamilTemplate +=  ' </tr>';
                newsTamilTemplate +=  '<tr>';
                newsTamilTemplate +=  ' <td>மொத்த வருவாய்</td>';
                newsTamilTemplate +=  ' <td>&#x20B9; '+shTotCurrQuarter+' கோடி</td>';
                newsTamilTemplate +=  ' <td>&#x20B9; '+shTotPreviousCQ+' கோடி</td>';
                totRetValPercentage = $.fn.myFunction(shTotCurrQuarter,shTotPreviousCQ,parseFloat(((shTotCurrQuarter/shTotPreviousCQ)-1)*100).toFixed(2));
                newsTamilTemplate +=  ' <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+totRetValPercentage+'%</td>';
                newsTamilTemplate +=  '</tr>';
                newsTamilTemplate +=  '<tr>';
                newsTamilTemplate +=  ' <td>நிகர லாபம்</td>';
                newsTamilTemplate +=  ' <td>&#x20B9; '+shNetCurrQuarter+' கோடி</td>';
                newsTamilTemplate +=  ' <td>&#x20B9; '+shNetPreviousCQ+' கோடி</td>';
                netRetValPercentage = $.fn.myFunction(shNetCurrQuarter,shNetPreviousCQ,parseFloat(((shNetCurrQuarter/shNetPreviousCQ)-1)*100).toFixed(2));
                newsTamilTemplate +=  ' <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+netRetValPercentage+'%</td>';
                newsTamilTemplate +=  '</tr>';
                newsTamilTemplate +=  '<tr>';
                newsTamilTemplate +=  ' <td>ஒரு பங்கு விகித ஈட்டுத் தொகை</td><td>&#x20B9; '+shEarCurrQuarter+'</td>';
                newsTamilTemplate +=  ' <td>&#x20B9; '+shEarPreviousCQ+'</td><td>'
                earRetValPercentage = $.fn.myFunction(shEarCurrQuarter,shEarPreviousCQ,parseFloat(((shEarCurrQuarter/shEarPreviousCQ)-1)*100).toFixed(2));
                newsTamilTemplate +=  ' <img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+earRetValPercentage+'%</td>';
                newsTamilTemplate +=  '</tr>';
                newsTamilTemplate +=  '</table><br>';
                newsTamilTemplate +=  'இந்த நிறுவனம் ஜூன் 30, 2021ல் முடிவடைந்த காலாண்டில் செயல்பாடுகளின் மூலம் ரூபாய் '+shTotCurrQuarter+' கோடி மொத்த வருமானம் ஈட்டியுள்ளது, இது ஜூன் 30, 2020ல் முடிவடைந்த காலாண்டில் ரூபாய் '+shTotPreviousCQ+' கோடியாக இருந்தது.<br><br>';
                newsTamilTemplate +=  'ஜூன் 30, 2021ல் முடிவடைந்த காலாண்டில் வரிக்கு பின் நிகர லாபமாக ரூபாய் '+shNetCurrQuarter+' கோடி ஈட்டியுள்ளது. இது ஜூன் 30, 2020ல் முடிவடைந்த காலாண்டில் ரூபாய் '+shNetPreviousCQ+' கோடியாக இருந்தது.<br><br>';
                newsTamilTemplate +=  'ஜூன் 30, 2021ல் முடிவடைந்த காலாண்டில் ஒரு பங்கு விகித ஈட்டுத் தொகை ரூ. '+shEarCurrQuarter+' ஆக இருந்தது. இது ஜூன் 30, 2020ல் முடிவடைந்த காலாண்டில் ரூபாய் '+shEarPreviousCQ+' ஆக இருந்தது.<br><br>';
                newsTamilTemplate +=  '<table width="100%" border=2 bordercolor=#000000 cellspacing=0 cellpadding=0>';
                newsTamilTemplate +=  '<tr><td>நிதிநிலை முடிவுகள்</td>';
                newsTamilTemplate +=  ' <td>'+currentQuarterShort+'</td>';
                newsTamilTemplate +=  ' <td>'+previousQuarterShort+'</td>';
                newsTamilTemplate +=  ' <td>% மாற்றம் காலாண்டு QoQ </td>';
                newsTamilTemplate +=  '</tr>';
                newsTamilTemplate +=  '<tr>';
                newsTamilTemplate +=  ' <td>மொத்த வருவாய்</td>';
                newsTamilTemplate +=  ' <td>&#x20B9; '+shTotCurrQuarter+' கோடி</td>';
                newsTamilTemplate +=  ' <td>&#x20B9; '+shTotPreviousQuarter+' கோடி</td>';
                totRetValPercentage = $.fn.myFunction(shTotCurrQuarter,shTotPreviousQuarter,parseFloat(((shTotCurrQuarter/shTotPreviousQuarter)-1)*100).toFixed(2));
                newsTamilTemplate +=  ' <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+totRetValPercentage+'%</td>';
                newsTamilTemplate +=  '</tr>'
                newsTamilTemplate +=  '<tr>'
                newsTamilTemplate +=  ' <td>நிகர லாபம்</td><td>&#x20B9;'+shNetCurrQuarter+' கோடி</td>';
                newsTamilTemplate +=  ' <td>&#x20B9;'+shNetPreviousQuarter+' கோடி</td>';
                netRetValPercentage = $.fn.myFunction(shNetCurrQuarter,shNetPreviousQuarter,parseFloat(((shNetCurrQuarter/shNetPreviousQuarter)-1)*100).toFixed(2));
                newsTamilTemplate +=  ' <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+netRetValPercentage+'%</td>';
                newsTamilTemplate +=  '</tr>';
                newsTamilTemplate +=  '<tr>';
                newsTamilTemplate +=  ' <td>ஒரு பங்கு விகித ஈட்டுத் தொகை</td>';
                newsTamilTemplate +=  ' <td>&#x20B9;'+shEarCurrQuarter+'</td>';
                newsTamilTemplate +=  ' <td>&#x20B9;'+shEarPreviousQuarter+'</td>';
                earRetValPercentage = $.fn.myFunction(shEarCurrQuarter,shEarPreviousQuarter,parseFloat(((shEarCurrQuarter/shEarPreviousQuarter)-1)*100).toFixed(2));
                newsTamilTemplate +=  ' <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+earRetValPercentage+'%</td>';
                newsTamilTemplate +=  '</tr>';
                newsTamilTemplate +=  '</table><br>';
                newsTamilTemplate +=  'இந்த நிறுவனம் ஜூன் 30, 2021ல் முடிவடைந்த காலாண்டில் செயல்பாடுகளின் மூலம் ரூபாய் '+shTotCurrQuarter+' கோடி மொத்த வருமானம் ஈட்டியுள்ளது, இது மார்ச் 31, 2021ல் முடிவடைந்த காலாண்டில் ரூபாய் '+shTotPreviousQuarter+' கோடியாக இருந்தது.<br><br>';
                newsTamilTemplate +=  'ஜூன் 30, 2021ல் முடிவடைந்த காலாண்டில் வரிக்கு பின் நிகர லாபமாக ரூபாய் '+shNetCurrQuarter+' கோடி ஈட்டியுள்ளது. இது மார்ச் 31, 2021ல் முடிவடைந்த காலாண்டில் ரூபாய் '+shNetPreviousQuarter+' கோடியாக இருந்தது.<br><br>';
                newsTamilTemplate +=  'ஜூன் 30, 2021ல் முடிவடைந்த காலாண்டில் ஒரு பங்கு விகித ஈட்டுத் தொகை ரூ. '+shEarCurrQuarter+' ஆக இருந்தது. இது மார்ச் 31, 2021ல் முடிவடைந்த காலாண்டில் ரூபாய் '+shEarPreviousQuarter+' ஆக இருந்தது.<br><br>';
                if($("#banks").css('display') != 'none')
                {
                  bankTemplate = $.fn.banksFunction();
                  bankTamilTemplate = $.fn.banksTamilFunction();
                  newsTamilTemplate = newsTamilTemplate + bankTamilTemplate;
                  newsTemplate = newsTemplate + bankTemplate + overAllText ;
                }
                else
                  newsTemplate = newsTemplate + overAllText;
              }
              if(resTemplate == "T3")
              {
                var shNetPreviousFYCaption = "";
                newsTemplate =  "The Board of Directors of "+companyName+", at its meeting held today have approved the "+resultsType+" financial results of the company for the period ended "+currentQuarter+".<br><br>";
                newsTemplate +=  '<table width="100%" border="2" bordercolor="#789940" cellspacing="0" cellpadding="0">';
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td class="newsheader"><b>Financials</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+currentQuarterShort+'</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+previousQuarterShort+'</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+previousYearQuarterShort+'</b></td>';                    
                newsTemplate +=  '    <td class="newsheader"><b>QoQ % Change</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>YoY % Change</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+resShortCurrentPeriod+' '+resYear+yearEnded+'</b></td>';
                newsTemplate +=  '    <td class="newsheader"><b>'+resShortCurrentPeriod+' '+resYear+(yearEnded - 1)+'</b></td>';                    
                newsTemplate +=  '    <td class="newsheader"><b>% Change</b></td>';                    
                newsTemplate +=  '  </tr>';
                totRetValPercentage = $.fn.myFunction(shTotCurrQuarter,shTotPreviousQuarter,parseFloat(((shTotCurrQuarter/shTotPreviousQuarter)-1)*100).toFixed(2));
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '     <td><b>Total Income</b></td>';
                newsTemplate +=  '     <td>&#x20B9;'+shTotCurrQuarter+' crs</td>';
                newsTemplate +=  '     <td>&#x20B9;'+shTotPreviousQuarter+'  crs</td>';
                newsTemplate +=  '     <td>&#x20B9;'+shTotPreviousCQ+' crs</td>';                    
                newsTemplate +=  '     <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+totRetValPercentage+'%</td>';
                totRetValPercentage = $.fn.myFunction(shTotCurrQuarter,shTotPreviousCQ,parseFloat(((shTotCurrQuarter/shTotPreviousCQ)-1)*100).toFixed(2));
                newsTemplate +=  '     <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+totRetValPercentage+'%</td>';
                newsTemplate +=  '     <td>&#x20B9;'+shTotCurrentFY+' crs</td>';
                newsTemplate +=  '     <td>&#x20B9;'+shTotPreviousFY +' crs</td>';                    
                totRetValPercentage = $.fn.myFunction(shTotCurrentFY,shTotPreviousFY,parseFloat(((shTotCurrentFY/shTotPreviousFY)-1)*100).toFixed(2));
                newsTemplate +=  '     <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+totRetValPercentage+'%</td>';                    
                newsTemplate +=  '  </tr>';
                netRetValPercentage = $.fn.myFunction(shNetCurrQuarter,shNetPreviousQuarter,parseFloat(((shNetCurrQuarter/shNetPreviousQuarter)-1)*100).toFixed(2));
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td><b>Net Profit</b></td>';
                newsTemplate +=  '    <td>&#x20B9;'+shNetCurrQuarter+' crs</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shNetPreviousQuarter+'  crs</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shNetPreviousCQ+' crs</td>';                    
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+netRetValPercentage+'%</td>';
                netRetValPercentage = $.fn.myFunction(shNetCurrQuarter,shNetPreviousCQ,parseFloat(((shNetCurrQuarter/shNetPreviousCQ)-1)*100).toFixed(2));              
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+netRetValPercentage+'%</td>'; 
                newsTemplate +=  '     <td>&#x20B9;'+shNetCurrentFY+' crs</td>';
                newsTemplate +=  '     <td>&#x20B9;'+shNetPreviousFY+' crs</td>';                    
                netRetValPercentage = $.fn.myFunction(shNetCurrentFY,shNetPreviousFY,parseFloat(((shNetCurrentFY/shNetPreviousFY)-1)*100).toFixed(2));
                newsTemplate +=  '     <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+netRetValPercentage+'%</td>';                    
                newsTemplate +=  '  </tr>';
                earRetValPercentage = $.fn.myFunction(shEarCurrQuarter,shEarPreviousQuarter,parseFloat(((shEarCurrQuarter/shEarPreviousQuarter)-1)*100).toFixed(2));
                newsTemplate +=  '  <tr>';
                newsTemplate +=  '    <td><b>EPS</b></td>';
                newsTemplate +=  '    <td>&#x20B9;'+shEarCurrQuarter+'</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shEarPreviousQuarter+'</td>';
                newsTemplate +=  '    <td>&#x20B9;'+shEarPreviousCQ+'</td>';                    
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+earRetValPercentage+'%</td>';
                earRetValPercentage = $.fn.myFunction(shEarCurrQuarter,shEarPreviousCQ,parseFloat(((shEarCurrQuarter/shEarPreviousCQ)-1)*100).toFixed(2));              
                newsTemplate +=  '    <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+earRetValPercentage+'%</td>';                    
                newsTemplate +=  '     <td>&#x20B9;'+shEarCurrentFY+'</td>';
                newsTemplate +=  '     <td>&#x20B9;'+shEarPreviousFY+'</td>';                    
                earRetValPercentage = $.fn.myFunction(shEarCurrentFY,shEarPreviousFY,parseFloat(((shEarCurrentFY/shEarPreviousFY)-1)*100).toFixed(2));
                newsTemplate +=  '     <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+earRetValPercentage+'%</td>';                    
                newsTemplate +=  '  </tr>';
                newsTemplate +=  '</table><br>';
                shTotPreviousQuarterValue = $.fn.myFunction(shTotCurrQuarter,shTotPreviousQuarter,parseFloat(((shTotCurrQuarter/shTotPreviousQuarter)-1)*100).toFixed(2));
                shTotPreviousQuarterCaption = $.fn.caption(shTotPreviousQuarterValue);
                shTotpreviousYearQuarterValue = $.fn.myFunction(shTotCurrQuarter,shTotPreviousCQ,parseFloat(((shTotCurrQuarter/shTotPreviousCQ)-1)*100).toFixed(2));
                shTotpreviousYearQuarterShortCaption = $.fn.caption(shTotpreviousYearQuarterValue);
                shNetPreviousQuarterValue = $.fn.myFunction(shNetCurrQuarter,shNetPreviousQuarter,parseFloat(((shNetCurrQuarter/shNetPreviousQuarter)-1)*100).toFixed(2));
                shNetPreviousQuarterCaption = $.fn.caption(shNetPreviousQuarterValue);
                netPreviousYearQuarterShortValue = $.fn.myFunction(shNetCurrQuarter,shNetPreviousCQ,parseFloat(((shNetCurrQuarter/shNetPreviousCQ)-1)*100).toFixed(2));
                netPreviousYearQuarterShortCaption = $.fn.caption(netPreviousYearQuarterShortValue);
                shEarPreviousQuarterValue = $.fn.myFunction(shEarCurrQuarter,shEarPreviousQuarter,parseFloat(((shEarCurrQuarter/shEarPreviousQuarter)-1)*100).toFixed(2));
                shEarPreviousQuarterCaption = $.fn.caption(shEarPreviousQuarterValue);
                earPreviousYearQuarterShortValue = $.fn.myFunction(shEarCurrQuarter,shEarPreviousCQ,parseFloat(((shEarCurrQuarter/shEarPreviousCQ)-1)*100).toFixed(2));
                earPreviousYearQuarterShortCaption = $.fn.caption(earPreviousYearQuarterShortValue);
                shTotPreviousFYValue = $.fn.myFunction(shTotCurrentFY,shTotPreviousFY,parseFloat(((shTotCurrentFY/shTotPreviousFY)-1)*100).toFixed(2));
                shTotPreviousFYCaption = $.fn.caption(shTotPreviousFYValue);
                shNetPreviousFYValue = $.fn.myFunction(shNetCurrentFY,shNetPreviousFY,parseFloat(((shNetCurrentFY/shNetPreviousFY)-1)*100).toFixed(2));
                shNetPreviousFYCaption = $.fn.caption(shNetPreviousFYValue);
                shEarPreviousFYValue = $.fn.myFunction(shEarCurrentFY,shEarPreviousFY,parseFloat(((shEarCurrentFY/shEarPreviousFY)-1)*100).toFixed(2));
                shEarPreviousFYCaption = $.fn.caption(shEarPreviousFYValue);
                newsTemplate +=  "For "+currentQuarterShort+", the Company has achieved total income of &#x20B9;"+shTotCurrQuarter+" crore as against &#x20B9;"+shTotPreviousQuarter+" crore "+shTotPreviousQuarterCaption+" of "+shTotPreviousQuarterValue+" %  over "+previousQuarterShort+" and &#x20B9;"+shTotPreviousCQ+" crore during "+previousYearQuarterShort+", "+shTotpreviousYearQuarterShortCaption+" of "+shTotpreviousYearQuarterValue+"% YoY.<br><br>";
                newsTemplate +=  "For "+currentQuarterShort+", the company has posted profit after tax of &#x20B9;"+shNetCurrQuarter+" crore as against profit after tax of &#x20B9;"+shNetPreviousQuarter+" crore "+shNetPreviousQuarterCaption+" of "+shNetPreviousQuarterValue+"% QoQ and &#x20B9;"+shNetPreviousCQ+" crore during "+previousYearQuarterShort+", "+netPreviousYearQuarterShortCaption+" of "+netPreviousYearQuarterShortValue+"% YoY.<br><br>";
                newsTemplate +=  "For "+currentQuarterShort+", the company has reported earnings per share (EPS) of  &#x20B9;"+shEarCurrQuarter+" crore as against EPS of  &#x20B9;"+shEarPreviousQuarter+" crore "+shEarPreviousQuarterCaption+" of "+shEarPreviousQuarterValue+"% QoQ and  &#x20B9;"+shEarPreviousCQ+" crore during "+previousYearQuarterShort+", "+earPreviousYearQuarterShortCaption+" of "+earPreviousYearQuarterShortValue+"% YoY.<br><br>";                    
                newsTemplate +=  "For the "+resShortCurrentPeriod+resYear+yearEnded+", the Company has achieved total income of &#x20B9;"+shTotCurrentFY+" crore as against &#x20B9;"+shTotPreviousFY+" crore "+shTotPreviousFYCaption+" of "+shTotPreviousFYValue+"% over the corresponding period of the previous year.<br><br>";
                newsTemplate +=  "For the "+resShortCurrentPeriod+resYear+yearEnded+", the Company has reported profit after tax of &#x20B9;"+shNetCurrentFY+" crore as against &#x20B9;"+shNetPreviousFY+" "+shNetPreviousFYCaption+" of "+shNetPreviousFYValue+"% over the corresponding period of the previous year.<br><br>";
                newsTemplate +=  "For the "+resShortCurrentPeriod+resYear+yearEnded+", the Company has posted earnings per share (EPS) of &#x20B9;"+shEarCurrentFY+" crore as against &#x20B9;"+shEarPreviousFY+" crore "+shEarPreviousFYCaption+" of "+shEarPreviousFYValue+"% over the corresponding period of the previous year.<br><br>";
                newsTamilTemplate  =  companyName+' நிறுவனம் ஜூன் 30, 2021 அன்று முடிவடைந்த காலாண்டுக்கான நிதிநிலை முடிவுகளை அறிவித்துவுள்ளது.<br><br>';
                newsTamilTemplate +=  '<table width="100%" border=2 bordercolor=#000000 cellspacing=0 cellpadding=0>';
                newsTamilTemplate +=  '<tr>';
                newsTamilTemplate +=  ' <td>நிதிநிலை முடிவுகள்</td>';
                newsTamilTemplate +=  ' <td>'+currentQuarterShort+'</td>';
                newsTamilTemplate +=  ' <td>'+previousQuarterShort+'</td>';
                newsTamilTemplate +=  ' <td>% மாற்றம் காலாண்டு QoQ </td>';
                newsTamilTemplate +=  ' <td>'+previousYearQuarterShort+'</td>';
                newsTamilTemplate +=  ' <td>% மாற்றம் காலாண்டு YoY</td>';
                newsTamilTemplate +=  '</tr>';
                newsTamilTemplate +=  '<tr>';
                newsTamilTemplate +=  ' <td>மொத்த வருவாய்</td>';
                newsTamilTemplate +=  ' <td>&#x20B9; '+shTotCurrQuarter+' crs</td>';
                newsTamilTemplate +=  ' <td>&#x20B9; '+shTotPreviousQuarter+' crs</td>';
                totRetValPercentage = $.fn.myFunction(shTotCurrQuarter,shTotPreviousQuarter,parseFloat(((shTotCurrQuarter/shTotPreviousQuarter)-1)*100).toFixed(2));
                newsTamilTemplate +=  ' <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+totRetValPercentage+'%</td>';
                newsTamilTemplate +=  ' <td>&#x20B9; '+shTotPreviousCQ+' crs</td>';
                totRetValPercentage = $.fn.myFunction(shTotCurrQuarter,shTotPreviousCQ,parseFloat(((shTotCurrQuarter/shTotPreviousCQ)-1)*100).toFixed(2));
                newsTamilTemplate +=  ' <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+totRetValPercentage+'%</td>';
                newsTamilTemplate +=  '</tr>';
                newsTamilTemplate +=  '<tr>';
                newsTamilTemplate +=  ' <td>நிகர லாபம்</td>';
                newsTamilTemplate +=  ' <td>&#x20B9;'+shNetCurrQuarter+' crs</td>';
                newsTamilTemplate +=  ' <td>&#x20B9;'+shNetPreviousQuarter+' crs</td>';
                netRetValPercentage = $.fn.myFunction(shNetCurrQuarter,shNetPreviousQuarter,parseFloat(((shNetCurrQuarter/shNetPreviousQuarter)-1)*100).toFixed(2));
                newsTamilTemplate +=  ' <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+netRetValPercentage+'%</td>';
                newsTamilTemplate +=  ' <td>&#x20B9; '+shNetPreviousCQ+' crs</td>';
                netRetValPercentage = $.fn.myFunction(shNetCurrQuarter,shNetPreviousCQ,parseFloat(((shNetCurrQuarter/shNetPreviousCQ)-1)*100).toFixed(2));
                newsTamilTemplate +=  ' <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+netRetValPercentage+'%</td>';
                newsTamilTemplate +=  '</tr>';
                newsTamilTemplate +=  '<tr>';
                newsTamilTemplate +=  ' <td>ஒரு பங்கு விகித ஈட்டுத் தொகை</td>';
                newsTamilTemplate +=  ' <td>&#x20B9;'+shEarCurrQuarter+'</td>';
                newsTamilTemplate +=  ' <td>&#x20B9;'+shEarPreviousQuarter+'</td>';
                earRetValPercentage = $.fn.myFunction(shEarCurrQuarter,shEarPreviousQuarter,parseFloat(((shEarCurrQuarter/shEarPreviousQuarter)-1)*100).toFixed(2));
                newsTamilTemplate +=  ' <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+earRetValPercentage+'%</td>';
                newsTamilTemplate +=  ' <td>&#x20B9; '+shEarPreviousCQ+'</td>';
                earRetValPercentage = $.fn.myFunction(shEarCurrQuarter,shEarPreviousCQ,parseFloat(((shEarCurrQuarter/shEarPreviousCQ)-1)*100).toFixed(2));
                newsTamilTemplate +=  ' <td><img src="dist/img/'+indicatorImage+'" alt="Up Tick / Down Tick">'+earRetValPercentage+'%</td>';
                newsTamilTemplate +=  '</tr>'
                newsTamilTemplate +=  '</table><br>';
                newsTamilTemplate +=  '<b>சென்ற ஆண்டு இதே காலாண்டுடன் ஒப்பீடு:</b><br><br>'; 
                newsTamilTemplate +=  'இந்த நிறுவனம் ஜூன் 30, 2021 முடிவடைந்த காலாண்டில் செயல்பாடுகளின் மூலம் ரூபாய் '+shTotCurrQuarter+' கோடி மொத்த வருமானம் ஈட்டியுள்ளது, இது ஜூன் 30, 2020ல் முடிவடைந்த காலாண்டில் ரூபாய் '+shTotPreviousCQ+' கோடியாக இருந்தது.<br><br>';
                newsTamilTemplate +=  'இந்த நிறுவனம் ஜூன் 30, 2021 முடிவடைந்த காலாண்டில் வரிக்கு பின் நிகர லாபமாக ரூபாய் '+shNetCurrQuarter+' கோடி ஈட்டியுள்ளது. இது ஜூன் 30, 2020ல் முடிவடைந்த காலாண்டில் ரூபாய் '+shNetPreviousCQ+' கோடியாக இருந்தது.<br><br>';
                newsTamilTemplate +=  'இந்த நிறுவனம் ஜூன் 30, 2021 முடிவடைந்த காலாண்டில் ஒரு பங்கு விகித ஈட்டுத் தொகை ரூ. '+shEarCurrQuarter+' ஆக இருந்தது. இது ஜூன் 30, 2020ல் முடிவடைந்த காலாண்டில் ரூபாய் '+shEarPreviousCQ+' ஆக இருந்தது.<br><br>';
                newsTamilTemplate +=  '<b>முந்தய காலாண்டுடன் ஒப்பீடு:</b><br><br>';
                newsTamilTemplate +=  'இந்த நிறுவனம் ஜூன் 30, 2021 முடிவடைந்த காலாண்டில் செயல்பாடுகளின் மூலம் ரூபாய் '+shTotCurrQuarter+' கோடி மொத்த வருமானம் ஈட்டியுள்ளது, இது மார்ச் 31, 2021ல் முடிவடைந்த காலாண்டில் ரூபாய் '+shTotPreviousQuarter+' கோடியாக இருந்தது.<br><br>';
                newsTamilTemplate +=  'இந்த நிறுவனம் ஜூன் 30, 2021 முடிவடைந்த காலாண்டில் வரிக்கு பின் நிகர லாபமாக ரூபாய் '+shNetCurrQuarter+' கோடி ஈட்டியுள்ளது. இது மார்ச் 31, 2021ல் முடிவடைந்த காலாண்டில் ரூபாய் '+shNetPreviousQuarter+' கோடியாக இருந்தது.<br><br>';
                newsTamilTemplate +=  'இந்த நிறுவனம் ஜூன் 30, 2021 முடிவடைந்த காலாண்டில் ஒரு பங்கு விகித ஈட்டுத் தொகை ரூ. '+shEarCurrQuarter+' ஆக இருந்தது. இது மார்ச் 31, 2021ல் முடிவடைந்த காலாண்டில் ரூபாய் '+shEarPreviousQuarter+' ஆக இருந்தது.<br><br>';                
                if($("#banks").css('display') != 'none')
                {
                  bankTemplate = $.fn.banksFunction();
                  bankTamilTemplate = $.fn.banksTamilFunction();
                  newsTamilTemplate = newsTamilTemplate + bankTamilTemplate;
                  newsTemplate = newsTemplate + bankTemplate + overAllText ;
                }
                else
                  newsTemplate = newsTemplate + overAllText;
              } 
              /*periodEnded=$("#periodEnded").val();
              yearEnded=$("#yearEnded").val();
              industry = $('input[name="industry"]:checked').val();
              resultsType=$('input[name="resultsType"]:checked').val();
              resultsData=$('input[name="resultsData"]:checked').val();
              title=$("#title").val();
              resTemplate=$('input[name="resTemplate"]:checked').val();
              keywords=$("#keywords").val();
              source=$("#source").val();
              category=$("#category").val();
              status=$("#status").val();
              shtotIncome=$("#shtotIncome").val();
              shTotCurrQuarter=$("#shTotCurrQuarter").val();
              shTotPreviousQuarter=$("#shTotPreviousQuarter").val();
              shTotPreviousCQ=$("#shTotPreviousCQ").val();
              shTotCurrentFY=$("#shTotCurrentFY").val();
              shTotPreviousFY=$("#shTotPreviousFY").val();
              shNetProfit=$("#shNetProfit").val();
              shNetCurrQuarter=$("#shNetCurrQuarter").val();
              shNetPreviousQuarter=$("#shNetPreviousQuarter").val();
              shNetPreviousCQ=$("#shNetPreviousCQ").val();
              shNetCurrentFY=$("#shNetCurrentFY").val();
              shNetPreviousFY=$("#shNetPreviousFY").val();
              shEarPerShare=$("#shEarPerShare").val();
              shEarCurrQuarter=$("#shEarCurrQuarter").val();
              shEarPreviousQuarter=$("#shEarPreviousQuarter").val();
              shEarPreviousCQ=$("#shEarPreviousCQ").val();
              shEarCurrentFY=$("#shEarCurrentFY").val();
              shEarPreviousFY=$("#shEarPreviousFY").val();
              bnkGrsNPAAmt=$("#bnkGrsNPAAmt").val();
              bnkGrsNPACurrQuarter=$("#bnkGrsNPACurrQuarter").val();
              bnkGrsNPAPreviousQuarter=$("#bnkGrsNPAPreviousQuarter").val();
              bnkGrsNPAPreviousCQ=$("#bnkGrsNPAPreviousCQ").val();
              bnkNetNPAAmt=$("#bnkNetNPAAmt").val();
              bnkNetNPACurrQuarter=$("#bnkNetNPACurrQuarter").val();
              bnkNetNPAPreviousQuarter=$("#bnkNetNPAPreviousQuarter").val();
              bnkNetNPAPreviousCQ=$("#bnkNetNPAPreviousCQ").val();
              bnkGrsNPAPer=$("#bnkGrsNPAPer").val();
              bnkGrsNPACurrQuarterPer=$("#bnkGrsNPACurrQuarterPer").val();
              bnkGrsNPAPreviousQuarterPer=$("#bnkGrsNPAPreviousQuarterPer").val();
              bnkGrsNPAPreviousCQPer=$("#bnkGrsNPAPreviousCQPer").val();
              bnkNetNPAPer=$("#bnkNetNPAPer").val();
              bnkNetNPACurrQuarterPer=$("#bnkNetNPACurrQuarterPer").val();
              bnkNetNPAPreviousQuarterPer=$("#bnkNetNPAPreviousQuarterPer").val();
              bnkNetNPAPreviousCQPer=$("#bnkNetNPAPreviousCQPer").val();
              bnkRetAsstPer=$("#bnkRetAsstPer").val();
              bnkRetAsstCurrQuarter=$("#bnkRetAsstCurrQuarter").val();
              bnkRetAsstPreviousQuarter=$("#bnkRetAsstPreviousQuarter").val();
              bnkRetAsstPreviousCQ=$("#bnkRetAsstPreviousCQ").val();
              bnkCapAdeRat=$("#bnkCapAdeRat").val();
              bnkCapAdeCurrQuarter=$("#bnkCapAdeCurrQuarter").val();
              bnkCapAdePreviousQuarter=$("#bnkCapAdePreviousQuarter").val();
              bnkCapAdePreviousCQ=$("#bnkCapAdePreviousCQ").val();*/
              /*
	            if (action == "Insert")
  	          {
    	          $.ajax({ url: "../controller/ShortFinanceController.php",
      	        type: "POST",
        	      data: {
                    isin:companyISIN,
                    resYear:resYear,
                    finResults:finResults,
                    periodEnded:periodEnded,
                    yearEnded:yearEnded,
                    industry:industry,
                    resultsType:resultsType,
                    resultsData:resultsData,
                    title:title,
                    resTemplate:resTemplate,
                    keywords:keywords,
                    source:source,
                    category:category,
                    status:status,
                    shtotIncome:shtotIncome,
                    shTotCurrQuarter:shTotCurrQuarter,
                    shTotPreviousQuarter:shTotPreviousQuarter,
                    shTotPreviousCQ:shTotPreviousCQ,
                    shTotCurrentFY:shTotCurrentFY,
                    shTotPreviousFY:shTotPreviousFY,
                    shNetProfit:shNetProfit,
                    shNetCurrQuarter:shNetCurrQuarter,
                    shNetPreviousQuarter:shNetPreviousQuarter,
                    shNetPreviousCQ:shNetPreviousCQ,
                    shNetCurrentFY:shNetCurrentFY,
                    shNetPreviousFY:shNetPreviousFY,
                    shEarPerShare:shEarPerShare,
                    shEarCurrQuarter:shEarCurrQuarter,
                    shEarPreviousQuarter:shEarPreviousQuarter,
                    shEarPreviousCQ:shEarPreviousCQ,
                    shEarCurrentFY:shEarCurrentFY,
                    shEarPreviousFY:shEarPreviousFY,
                    bnkGrsNPAAmt:bnkGrsNPAAmt,
                    bnkGrsNPACurrQuarter:bnkGrsNPACurrQuarter,
                    bnkGrsNPAPreviousQuarter:bnkGrsNPAPreviousQuarter,
                    bnkGrsNPAPreviousCQ:bnkGrsNPAPreviousCQ,
                    bnkNetNPAAmt:bnkNetNPAAmt,
                    bnkNetNPACurrQuarter:bnkNetNPACurrQuarter,
                    bnkNetNPAPreviousQuarter:bnkNetNPAPreviousQuarter,
                    bnkNetNPAPreviousCQ:bnkNetNPAPreviousCQ,
                    bnkGrsNPAPer:bnkGrsNPAPer,
                    bnkGrsNPACurrQuarterPer:bnkGrsNPACurrQuarterPer,
                    bnkGrsNPAPreviousQuarterPer:bnkGrsNPAPreviousQuarterPer,
                    bnkGrsNPAPreviousCQPer:bnkGrsNPAPreviousCQPer,
                    bnkNetNPAPer:bnkNetNPAPer,
                    bnkNetNPACurrQuarterPer:bnkNetNPACurrQuarterPer,
                    bnkNetNPAPreviousQuarterPer:bnkNetNPAPreviousQuarterPer,
                    bnkNetNPAPreviousCQPer:bnkNetNPAPreviousCQPer,
                    bnkRetAsstPer:bnkRetAsstPer,
                    bnkRetAsstCurrQuarter:bnkRetAsstCurrQuarter,
                    bnkRetAsstPreviousQuarter:bnkRetAsstPreviousQuarter,
                    bnkRetAsstPreviousCQ:bnkRetAsstPreviousCQ,
                    bnkCapAdeRat:bnkCapAdeRat,
                    bnkCapAdeCurrQuarter:bnkCapAdeCurrQuarter,
                    bnkCapAdePreviousQuarter:bnkCapAdePreviousQuarter,
                    bnkCapAdePreviousCQ:bnkCapAdePreviousCQ,
                    newsTamilTemplate:newsTamilTemplate,
                    newsTemplate:newsTemplate
                },
                success: function (output)
                {
                    //alert(output);
                    //return false;
                }
	             });*/
          // }
        //}
    //});
   }
  }
});
});
</script>
</body>
</html>