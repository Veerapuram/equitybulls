<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['logform']))
  { 
    if($_POST['logform']==="signIn")
    {
      $email = $_POST['email'];
      $password = $_POST['password'];
      include_once("controller/LoginController.php");
      $controller = new Controller();
      $loginResult = $controller->loginController($email,$password);
      if(!empty($loginResult))
        {
          $loginArray = json_decode( $loginResult, true );
          if(!empty($loginArray))
          {
            foreach($loginArray as $loginInfo) {
              $email = $loginInfo['email'];
              $password = $loginInfo['password'];
              $count = $loginInfo['count'];
            }
          }
          if($count == 1)
          {
            session_start();
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['email'] = $email;
            header("Location:ViewList.php");
            exit;
          }  
          else
          {
            echo "<b><font color='red'>Invalid Credentials. Please Try again....</font></b>";
          }
        }
      else
      {
          echo "<b><font color='red'>Invalid Credentials. Please Try again....</font></b>";
      }
    }
  }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EquityBulls | Log in</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="view/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="view/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.html"><b>EquityBulls</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form name="logform" method="post">
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" required="required" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" required="required" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" id="logform" name="logform" value="signIn" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="view/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="view/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="view/dist/js/adminlte.min.js"></script>
</body>
</html>
