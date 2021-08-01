<?php	session_start();
    if(!isset($_SESSION['email']))
    {
        header("Location:../index.php");
        exit;
    }
    ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		include_once("../controller/NewsDetailsController.php");
		$controller = new Controller();
		if(isset($_POST['submit']))
		{	
			if($_POST['submit']==="add")
				$controller->addNewsDetail($_POST);
			if($_POST['submit']==="update")
				$controller->updNewsDetail($_POST);
		}	
		else if(isset($_POST['reset']) && ($_POST['reset']==="delete"))
		{
			$controller->delNewsDetail($_POST);
		}

    $companyResult  = $controller->listCompany();
    $newsCatResult  = $controller->listNewsCat();
    $newsSrcResult  = $controller->listNewsSrc();
    $fileResult     = $controller->listFiles();

    //print_r($_POST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Equity Bulls | News Details </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
  <!--link rel="stylesheet" href="plugins/select2/css/select2.min.css"-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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
                <a href="financialResultsView.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Financial Results</p>
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
            <h1>News Details Entry Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">News Details</li>
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
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Entry form for News Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="NewsForm" method="post" enctype="multipart/form-data">
                <div class="card-body">
				    <div class="form-group">
						<label>Company</label>
						<select id="company" name="company[]" multiple class="form-control select2" style="width: 100%;">
            <?php
							if(!empty($companyResult))
							{
								$companyArray = json_decode( $companyResult, true );
								if(!empty($companyArray))
								{
									foreach($companyArray as $companyInfo) {
											$companyISIN  = $companyInfo['isin'];
                      $companyName 	= $companyInfo['company_name'];
											echo "<option value=".$companyISIN.">".$companyName."</option>";
									}
								}
							}?>			
    				</select>
				   </div>
				   <div class="form-group">
						<label>News Source</label>
						<select id="source" name="source" class="form-control select2" style="width: 100%;">
            <?php
							if(!empty($newsSrcResult))
							{
								$sourceArray = json_decode( $newsSrcResult, true );
								if(!empty($sourceArray))
								{
                  echo "<option value='0'>Select a Source</option>";
									foreach($sourceArray as $sourceInfo) {
											$newsSourceID 	    = $sourceInfo['news_source_id'];
                      $newsSourceName   = $sourceInfo['news_source_name'];
											echo "<option value=".$newsSourceID.">".$newsSourceName."</option>";
									}
								}
							}?>			
						</select>
				   </div>		
           <div class="form-group">
						<label>News Category</label>
						<select id="category" name="category" class="form-control select2" style="width: 100%;" required="required">
            <?php
							if(!empty($newsCatResult))
							{
								$categoryArray = json_decode( $newsCatResult, true );
								if(!empty($categoryArray))
								{
                  echo "<option value='0'>Select a Category</option>";
									foreach($categoryArray as $categoryInfo) {
											$newsCatID 	      = $categoryInfo['news_category_id'];
                      $newsCatName     	= $categoryInfo['news_category_name'];
											echo "<option value=".$newsCatID.">".$newsCatName."</option>";
									}
								}
							}?>			
						</select>
				   </div>				   
		               <div class="form-group">
						<label for="newsTitle">News Title<span class="required">*</span></label>
						<input type="text" class="form-control form-control-border" required="required" id="newsTitle" name="newsTitle" placeholder="Enter News Title">
                  </div>
                   <div class="form-group">
                        <label>News Message</label>
                        <textarea id="newsMessage" name="newsMessage" class="form-control" rows="3" placeholder="News Message ..."></textarea>
                    </div>
					<div class="form-group">
						<label for="keywords">Keywords</label>
            <textarea id="keywords" name="keywords" class="form-control" rows="3" placeholder="Keywords ..."></textarea>
					</div>
					<div class="form-group">
                        <label>News Description</label>
                        <textarea id="newsDescription" name="newsDescription" class="form-control" rows="3" placeholder="News Description ..."></textarea>
                    </div>
					<div class="form-group">
						<label>News Image</label>
						<select id="newsImage" name="newsImage" class="form-control select2" style="width: 100%;">
            <?php
							if(!empty($fileResult))
							{
								$fileArray = json_decode( $fileResult, true );
								if(!empty($fileArray))
								{
                  echo "<option value='0'>Select a File</option>";
									foreach($fileArray as $fileInfo) {
											$fileID 	    = $fileInfo['file_id'];
                      $fileName     = $fileInfo['file_details'];
											echo "<option value=".$fileID.">".$fileName."</option>";
									}
								}
							}?>			
						</select>
				   </div>				   
           <div class="form-group">
						<label for="groupImage">Group Image</label>
						<input type="file" class="form-control form-control-border" id="groupImage" name="groupImage" />
					</div>
          <div class="form-group">
						<label for="dispImgName">Image Selected for Group</label>
						<input type="text" class="form-control form-control-border" id="dispImgName" name="dispImgName" readonly />
					</div>
					<div class="form-group">
						<label for="newsStatus">Description about News Status</label>
						<input type="text" class="form-control form-control-border" id="newsStatus" name="newsStatus" placeholder="Enter Description about News Status">
					</div>
   				    <div class="form-group">
						<label>News Status</label>
						<select id="status" name="status" class="form-control select2" style="width: 100%;" required="required">
							<option value="A">Active</option>
							<option value="I">Inactive</option>
						</select>
				    </div>				   
				  <!-- /.card-body -->
                <div class="card-footer">
					<input type="hidden" name="newsID" id="newsID">
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
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">List of News Entries</h3>
              </div>
				<table id="newsDetails" name="newsDetails" class="display table table-bordered table-hover" style="width:100%">
					<thead>
						<tr>
							<th>News ID</th>
              <th>ISIN</th>
              <th>ISIN Multiple</th>
              <th>Source ID</th>
              <th>Category ID</th>
              <th>File ID</th>
              <th>File Group</th>
              <th>Title</th>
              <th>Message</th>
              <th>Keyword</th>
              <th>Description</th>
							<th>News Overall Status</th>
							<th>Status</th>
						</tr>
					</thead>
				</table>		
            </div>
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
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<!--script src="plugins/select2/js/select2.full.min.js"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
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
<!--script src="dist/js/demo.js"></script-->
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({theme: 'bootstrap4'})
    var table;
});
$("#company").on('change',function(){
      var companyISIN = $("#company").val();
      $.ajax({ url: "../controller/NewsDetailsData.php",
         type: 'get',
         data: {companyISIN:companyISIN},
        success: function (output) {
                if( companyISIN.length == 0)
                {
                  //$("#newsMessage").val('');
                  //$("#keywords").val('');
                }  
                else
                {
                  var obj = JSON.parse(output);
                }  
                var overAllText = "";
                var bseText = "";
                var nseText = "";
                var keywords = "";
                var keyWordsTag = 0;
                var retainFlag = 0;
                var retainNews = "";
                $.each(obj, function(key,value) {
                  if(value.tag=="BSE")
                  {
                    bseText="Shares of " + value.company_name + " was last trading in " + value.tag + " at Rs. " + value.close + " as compared to the previous close of Rs. " + value.prevclose + " .";
                    bseText+="The total number of shares traded during the day was " + value.no_of_shrs + " in over " + value.no_trades + " trades.<br><br>The stock hit an intraday high of Rs. " + value.high + "  and intraday low of " + value.low + ".";
                    bseText+="The net turnover during the day was Rs. " + value.net_turnov + ". <br><br>";
                    overAllText+=bseText;
                    keyWordsTag = 1;
                    keywords+="#"+value.company_keywords+' ';
                  }
                  else
                  {
                    nseText="Shares of " + value.company_name + " was last trading in "+ value.tag + " at Rs. "+ value.close +" as compared to the previous close of Rs. " + value.prevclose + " .";
                    nseText+="The total number of shares traded during the day was "+ value.no_of_shrs +" in over " + value.no_trades+ " trades.<br><br>The stock hit an intraday high of Rs. " + value.high + " and intraday low of " + value.low + ".";
                    nseText+="The total traded value during the day was Rs. "+ value.net_turnov + ". <br><br>";
                    if(keyWordsTag == 0)
                      keywords+="#"+value.company_keywords+' ';
                    overAllText+=nseText;   
                    keyWordsTag = 0;
                  }
                  if(retainFlag == 0)
                  {
                    retainNews = $("#newsMessage").val();
                    $("#newsMessage").val(retainNews);
                  }
                  $("#newsMessage").val(retainNews+overAllText); 
                  $("#keywords").val(keywords);
                });
            }
      });
});
$(document).ready(function() {
  table = $('#newsDetails').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../controller/PostController.php",
            "type": "POST"
        },
        "columns": [
            { "data": "news_id" },
            { "data": "isin" },
            { "data": "isin_multiple" },
            { "data": "news_source_id" },
            { "data": "news_category_id" },
            { "data": "file_individual" },
            { "data": "file_group" },
            { "data": "news_title" },
            { "data": "news_message" },
            { "data": "news_keyword" },
            { "data": "news_description" },
            { "data": "news_status" },
            { "data": "news_details_status" }
        ],
        "columnDefs": [
                        { targets: [0], visible: true},
                        { targets: [1], visible: true},
                        { targets: [2], visible: false},
                        { targets: [3], visible: false},
                        { targets: [4], visible: false},
                        { targets: [5], visible: false},
                        { targets: [6], visible: false},
                        { targets: [7], visible: true},
                        { targets: [8], visible: false},
                        { targets: [9], visible: false},
                        { targets: [10], visible: false},
                        { targets: [11], visible: false},
                        { targets: [12], visible: true}
        ],
    });
  });      

  $('#newsDetails').on('click', 'tbody tr', function () {
    var data = table.row( this ).data();
    var newsID          = "";
    var isin            = " ";
    var isinMultiple    = "";
    var sourceID        = "";
    var categoryID      = "";
    var fileID          = "";
    var fileGroup       = "";
    var title           = "";
    var message         = "";
    var keyword         = "";
    var description     = "";
    var newsStatus      = "";
    var status          = "";
    $("#company").val(null).trigger("change");
    
    newsID          = data.news_id;
    isin            = data.isin;
    isinMultiple    = data.isin_multiple;
    sourceID        = data.news_source_id;
    categoryID      = data.news_category_id;
    fileID          = data.file_individual;
    fileGroup       = data.file_group;
    title           = data.news_title;
    message         = data.news_message;
    keyword         = data.news_keyword;
    description     = data.news_description;
    status          = data.news_status;
    newsStatus      = data.news_details_status;


    $("#newsID").val(newsID);
    $("#newsID").val();
    
    if((typeof isin !== undefined) && (isin !== null) && (isin !== ""))
        $("#company").val(isin).trigger("change");
    if((typeof isinMultiple !== undefined) && (isinMultiple !== null) && (isinMultiple !== ""))
    {
        var array = isinMultiple.split(",");
        $("#company").select2().val(array).trigger("change.select2");
    }    
    if((typeof sourceID !== undefined) && (sourceID !== null) && (sourceID !== ""))
        $("#source").val(sourceID).trigger("change.select2");
    if((typeof categoryID !== undefined) && (categoryID !== null) && (categoryID !== ""))
        $("#category").val(categoryID).trigger("change.select2");
    if((typeof fileID !== undefined) && (fileID !== null) && (fileID !== ""))
        $("#newsImage").val(fileID).trigger("change.select2");

    $("#status").select2().select2('val',newsStatus);

    $("#dispImgName").val(fileGroup);
    $('#newsTitle').val(title);
    $('#newsMessage').val(message);
	  $('#keywords').val(keyword);
		$('#newsDescription').val(description);
		$('#newsStatus').val(status);

    
    $("#submit").html("Update");
		$("#submit").val("update");
		$("#reset").html("Delete");
		$("#reset").val("delete");
	});

</script>

</body>
</html>