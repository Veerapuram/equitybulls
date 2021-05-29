<?php	ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		include_once("../controller/NseController.php");
		$controller = new Controller();
		if(isset($_POST['submit']))
		{	
			if($_POST['submit']==="add")
				$controller->addNse($_POST);
			if($_POST['submit']==="update")
				$controller->updNse($_POST);
		}	
		else if(isset($_POST['reset']) && ($_POST['reset']==="delete"))
		{
			$controller->delNse($_POST);
		}
		$nseResult = $controller->listNse();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Equity Bulls | NSE Master </title>
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
            <h1>NSE Detail Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">NSE Detail Form</li>
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
                <h3 class="card-title">Entry form for NSE</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="nseForm" method="post">
                <div class="card-body">
                   <div class="form-group">
						<label for="nseISIN">ISIN<span class="required">*</span></label>
						<input type="text" class="form-control form-control-border" required="required" id="nseISIN" name="nseISIN" placeholder="Enter ISIN">
                  </div>
                  <div class="form-group">
						<label for="nseSymbol">Symbol<span class="required">*</span></label>
						<input type="text" class="form-control form-control-border" required="required" id="nseSymbol" name="nseSymbol" placeholder="Enter Symbol">
                  </div>
                  <div class="form-group">
						<label for="nseDOL">Date of Launch<span class="required">*</span></label>
						<input type="text" class="form-control form-control-border" required="required" id="nseDOL" name="nseDOL" placeholder="Enter Date of Launch">
                  </div>
                  <div class="form-group">
						<label for="nsePUV">NSE PUV<span class="required">*</span></label>
						<input type="text" class="form-control form-control-border" required="required" id="nsePUV" name="nsePUV" placeholder="Enter PUV">
                  </div>
                  <div class="form-group">
						<label for="nseFaceValue">Face Value<span class="required">*</span></label>
						<input type="text" class="form-control form-control-border" required="required" id="nseFaceValue" name="nseFaceValue" placeholder="Enter Face Value">
                  </div>
				  <div class="form-group">
						<label>BSE Status<span class="required">*</span></label>
						<select name="status" id="status" name="status" class="form-control select2" style="width: 100%;">
							<option value="A">Active</option>
							<option value="I">Inactive</option>
						</select>
				   </div>				 
                <!-- /.card-body -->
                <div class="card-footer">
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
                <h3 class="card-title">List of NSE Entries</h3>
              </div>
				<table id="nseDetails" name="nseDetails" class="display table table-bordered table-hover" style="width:100%">
					<thead>
						<tr>
							<th>ISIN</th>
							<th>Symbol</th>
							<th>DOL</th>
							<th>PUV</th>
							<th>Face Value</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(!empty($nseResult))
							{
								$nseArray = json_decode( $nseResult, true );
								if(!empty($nseArray))
								{
									foreach($nseArray as $nseInfo) {
										$isin  				= $nseInfo['isin'];
										$symbol		 		= $nseInfo['nse_symbol'];
										$dol		        = $nseInfo['nse_dol'];
										$puv 		 		= $nseInfo['nse_puv'];
										$faceValue			= $nseInfo['nse_face_value'];
										$nseStatus 			= $nseInfo['nse_status'];
										$nseStatus			= ($nseStatus==="A")?"Active":"Inactive";
										echo "<tr>
												<td>".$isin."</td>
												<td>".$symbol."</td>
												<td>".$dol."</td>
												<td>".$puv."</td>
												<td>".$faceValue."</td>
												<td>".$nseStatus."</td>
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
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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
  //Initialize Select2 Elements
$(document).ready(function() {
    var table = $('#nseDetails').DataTable({});
	$('#nseDetails tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
		var nseStatus 		 = data[5];
		$('#nseISIN').val(data[0])
		$('#nseSymbol').val(data[1]);
		$('#nseDOL').val(data[2]);
		$('#nsePUV').val(data[3]);
		$('#nseFaceValue').val(data[4]);
		
		$("#status").select2().select2('val',bseStatus);
		
		$("#submit").html("Update");
		$("#submit").val("update");
		$("#reset").html("Delete");
		$("#reset").val("delete");
	});
} );
</script>

</body>
</html>