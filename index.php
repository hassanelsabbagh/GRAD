  
<?php
	
  session_start();
  $noNavbar = '';
  $pageTitle = 'Login';
  if (isset($_SESSION['Username'])){
  	header('Location: dashboard.php');
  }


  include 'connect.php';
  include 'includes/functions/functions.php';
  include 'includes/templates/header.php';
  include 'includes/languages/english.php'; 

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  	$username = $_POST['user'];
  	$password = $_POST['pass'];
  	$hashedpass = sha1($password); 

  	$stmt = $con->prepare("SELECT usrID, username, password FROM users WHERE BINARY username = ? AND password = ? LIMIT 1");
  	$stmt->execute(array($username, $hashedpass));
    $row = $stmt->fetch();
  	$count = $stmt->rowCount();

  	if ($count>0){
  		$_SESSION['ID'] = $row['usrID'];
  		$_SESSION['Username'] = $username;
  		header('Location: dashboard.php');
  		exit();

  	}else{

      header("location:index.php?msg=failed");
    }

  }


?>

 <!-- <link rel="stylesheet" type="text/css" href="design/css/bootstrap.min.css"> -->
   <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="design/fonts/icomoon/style.css">
    <link rel="stylesheet" href="design/css/bootstrap.min.css">
    <link rel="stylesheet" href="design/css/magnific-popup.css">
    <link rel="stylesheet" href="design/css/jquery-ui.css">
    <link rel="stylesheet" href="design/css/owl.carousel.min.css">
    <link rel="stylesheet" href="design/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="design/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="design/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="design/css/aos.css">
    <link rel="stylesheet" href="design/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/design/css/font-awesome.min.css">


    

    <link rel="icon" type="image/png" href="design/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="design/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="design/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="design/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="design/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="design/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="design/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="design/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="design/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="design/css/util.css">
    <link rel="stylesheet" type="text/css" href="design/css/main.css">

    <link rel="stylesheet" href="css/bakr.css">

    <style type="text/css">
      body{
        zoom: 80%;
      }
    </style>

  <script type="text/javascript" src="design/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="design/js/backend.js"></script> 

 <!-- <form class="login" action="<?php //echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input class="form-control" type="text" name="user" placeholder="username" autocomplete="off"	 />
        <input class="form-control" type="password" name="pass" placeholder="password" autocomplete="new-password"/>
        <input class="btn btn-primary btn-block" type="submit" value="login"  />
   </form>
-->
   <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-t-30 p-b-50 overlay">
        
        <form class="login100-form validate-form p-b-33 p-t-5" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
          <span class="login100-form-title">
            <h3>sign in</h3>
          </span>

              <div style="text-align: center; color: white" id="wrong" style="color:white">
            <?php

               if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
              echo "Wrong Username / Password";
                }
                ?>
           </div>
           
          <div class="wrap-input100 validate-input" data-validate = "Username">
            <input class="input100" type="text" name="user" placeholder="User name">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password" name="pass" placeholder="Password">
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>
          
          
          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn">sign in</button>
            </div>
          </div>

           <div >
           <div class="login100-form-ttle">Don't have an account?</div>
           <a class="login100-form-title" href="signup2.php?do=Insert">signUp</a>
          </div>

             
       
          

        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
<?php
     include "includes/templates/footer.php";
?>