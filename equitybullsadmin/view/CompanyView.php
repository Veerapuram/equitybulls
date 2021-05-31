<?php	ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		include_once("../controller/CompanyController.php");
		$controller = new Controller();
		if(isset($_POST['submit']))
		{	
			if($_POST['submit']==="add")
				$controller->addCompany($_POST);
			if($_POST['submit']==="update")
				$controller->updCompany($_POST);
		}	
		else if(isset($_POST['reset']) && ($_POST['reset']==="delete"))
		{
			$controller->delCompany($_POST);
		}
		
		$ISINResult     = $controller->listISIN();
		$industryResult = $controller->listIndustry();
		$companyResult  = $controller->listCompany();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Equity Bulls | Company Details </title>
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
            <h1>Company Entry Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company Details</li>
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
                <h3 class="card-title">Entry form for Company</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="companyForm" method="post">
                <div class="card-body">
					<div class="form-group">
						<label>ISIN</label>
						<select id="isin" name="isin" class="form-control select2 required" style="width: 100%;">
						<?php
							if(!empty($ISINResult))
							{
								$ISINArray = json_decode( $ISINResult, true );
								if(!empty($ISINArray))
								{
									foreach($ISINArray as $ISINInfo) {
											$ISIN 	= $ISINInfo['isin'];
											echo "<option value=".$ISIN.">".$ISIN."</option>";
									}
								}
							}?>							
						</select>
				   </div>
                   <div class="form-group">
						<label for="companyName">Company Name<span class="required">*</span></label>
						<input type="text" class="form-control form-control-border" required="required" id="companyName" name="companyName" placeholder="Enter Company Name">
                  </div>
				  <div class="form-group">
						<label>Industry</label>
						<select id="industry" name="industry" class="form-control select2" style="width: 100%;" required="required">
						<?php
							if(!empty($industryResult))
							{
								$industryArray = json_decode( $industryResult, true );
								if(!empty($industryArray))
								{
									foreach($industryArray as $industryInfo) {
											$industryID 	= $industryInfo['industry_id'];
											$industryName 	= $industryInfo['industry_name'];
											echo "<option value=".$industryID.">".$industryName."</option>";
									}
								}
							}?>							
						</select>
				   </div>
				   <div class="form-group">
						<label>BSE/NSE/BOTH</label>
						<select id="bse_nse_tag" name="bse_nse_tag" class="form-control select2" style="width: 100%;" required="required">
							<option value="BSE">BSE</option>
							<option value="NSE">NSE</option>
							<option value="BOTH">BOTH</option>
						</select>
				   </div>				   
                   <div class="form-group">
                        <label>About the Company</label>
                        <textarea id="aboutCompany" name="aboutCompany" class="form-control" rows="3" placeholder="About the Company ..."></textarea>
                    </div>
					<div class="form-group">
						<label for="companyTwitterURL">Company Twitter URL</label>
						<input type="text" class="form-control form-control-border" id="companyTwitterURL" name="companyTwitterURL" placeholder="Enter Twitter URL">
					</div>
					<div class="form-group">
						<label for="companyURL">Company URL</label>
						<input type="text" class="form-control form-control-border" id="companyURL" name="companyURL" placeholder="Enter Company URL">
					</div>
					<div class="form-group">
                        <label>Address of the Company</label>
                        <textarea id="companyAddress" name="companyAddress" class="form-control" rows="3" placeholder="Address of the Company ..."></textarea>
                    </div>
					<div class="form-group">
						<label for="companyContactNo">Company Contact Number</label>
						<input type="text" class="form-control form-control-border" id="companyContactNo" name="companyContactNo" placeholder="Enter Company Contact No.">
					</div>
                    <div class="form-group">
						<label for="companyEmailAddress">Email address<span class="required">*</span></label>
						<input type="email" class="form-control form-control-border" required="required" id="companyEmailAddress" name="companyEmailAddress" placeholder="Enter Email">
					</div>
					<div class="form-group">
						<label for="companyURL">Keywords</label>
						<input type="text" class="form-control form-control-border" id="companyKeywords" name="companyKeywords" placeholder="Enter Keywords">
					</div>
					<div class="form-group">
                        <label>Others</label>
                        <textarea id="others" name="others" class="form-control" rows="3" placeholder="About the Others ..."></textarea>
                    </div>
  				   <div class="form-group">
						<label>Status</label>
						<select id="status" name="status" class="form-control select2" style="width: 100%;" required="required">
							<option value="A">Active</option>
							<option value="I">Inactive</option>
						</select>
				   </div>				   
				  <!-- /.card-body -->
                <div class="card-footer">
					<input type="hidden" name="companyID" id="companyID">
					<input type="hidden" name="isinUpd" id="isinUpd">
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
                <h3 class="card-title">List of Company Entries</h3>
              </div>
				<table id="companyDetails" name="companyDetails" class="display table table-bordered table-hover" style="width:100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Company Name</th>
							<th>ISIN</th>
							<th>Industry ID</th>
							<th>Industry Name</th>
							<th>BSE NSE Tag</th>
							<th>About</th>
							<th>Twitter ID</th>
							<th>Website</th>
							<th>Address</th>
							<th>Phone</th>
							<th>E-Mail</th>
							<th>Keywords</th>
							<th>Others</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(!empty($companyResult))
							{
								$companyArray = json_decode( $companyResult, true );
								if(!empty($companyArray))
								{
									foreach($companyArray as $companyInfo) {
										$companyID	 		= $companyInfo['company_id'];
										$companyName		= $companyInfo['company_name'];
										$isin				= $companyInfo['isin'];
										$industryID			= $companyInfo['industry_id'];
										$industryName		= $companyInfo['industry_name'];
										$bseNseTag			= $companyInfo['bse_nse_tag'];
										$about				= $companyInfo['company_about'];
										$twitterID			= $companyInfo['company_twitter_id'];
										$webSite			= $companyInfo['company_website'];
										$address			= $companyInfo['company_address'];
										$phone				= $companyInfo['company_phone'];
										$email				= $companyInfo['company_email'];
										$keywords			= $companyInfo['company_keywords'];
										$others				= $companyInfo['company_others'];
										$status				= $companyInfo['company_status'];
										$status				= ($status==="A")?"Active":"Inactive";
										echo "<tr>
												<td>".$companyID."</td>
												<td>".$companyName."</td>
												<td>".$isin."</td>
												<td>".$industryID."</td>
												<td>".$industryName."</td>
												<td>".$bseNseTag."</td>
												<td>".$about."</td>
												<td>".$twitterID."</td>
												<td>".$webSite."</td>
												<td>".$address."</td>
												<td>".$phone."</td>
												<td>".$email."</td>
												<td>".$keywords."</td>
												<td>".$others."</td>
												<td>".$status."</td>
											</tr>";
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
    })
});
$(document).ready(function() {
    var table = $('#companyDetails').DataTable({
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
	$('#companyDetails tbody').on('click', 'tr', function () {
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
} );
</script>

</body>
</html>