  <?php 
  session_start();
  include 'connect.php';
    include 'includes/functions/functions.php';
    include 'includes/templates/header.php';
    include "includes/languages/english.php";
   // include 'includes/templates/navbar.php';
    include "includes/templates/footer.php";

        $do = '';
  if( isset($_GET['do'])){
    $do = $_GET['do'];
}

if ($do == 'Insert') {?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>The Swap &mdash; Signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!---extended link for css / bootstrap--->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bakr.css">






      <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
  </head>
  

  <body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-t-30 p-b-40">

        <form class="login100-form validate-form p-b-10 p-t-5" action="?do=Insert" method="POST" enctype="multipart/form-data">

          <div class="login100-form-title">
            <h3>create account</h3>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Enter username">
            <input class="input100" type="text" name="Username" placeholder="User name">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>
               <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="Password" name="Password" placeholder="Password">
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Enter Your Fullname">
            <input class="input100" type="text" name="fullname" placeholder="Full Name">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Enter Email">
            <input class="input100" type="text" name="E-mail" placeholder="E-mail">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Enter Your Phone Number">
            <input class="input100" type="text" name="phoneNumber" placeholder="Phone Number">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>
          
          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button type="submit" class="login100-form-btn">sign me up</button>
            </div>
          </div>
        
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>

<?php
  

      if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        

        $user   = $_POST['Username'];
        $pass   = $_POST['Password'];
        $mail   = $_POST['E-mail'];
        $full   = $_POST['fullname'];
        $phone = $_POST['phoneNumber'];



        $hashpass = sha1($_POST['Password']);

        $errors = array();

        if (empty($user))

          $errors[] = 'username cannot be empty</div>';

         if (empty($pass))

          $errors[] = 'password cannot be empty</div>';

        if (strlen($user) < 4)

          $errors[] = 'username cannot be less than 4 characters</div>';

        if (empty($mail))

          $errors[] = 'E-mail cannot be empty</div>';

        if (empty($full))

          $errors[] = 'fullname cannot be empty</div>';

        if(empty($phone))

          $errors[] = 'phone number cannot be empty</div>';

        
        foreach ($errors as $error) {
          echo '<div class="alert alert-danger">' . $error . '</div>' ; 
        }

        if (empty($errors)){

          $check = checkItem("username", "users", $user);

       

          if ($check == 1){

            $Msg = '<div class="alert alert-danger">this user already exists</div>';

            redirectHome($Msg, 'back'); 
            
          }else{

         

          $stmt = $con->prepare("INSERT INTO users(username, password, Email, Fullname, PhoneNumber) VALUES(:zuser, :zpass, :zmail, :zname, :zphone)");
          $stmt->execute(array(
            'zuser' => $user,
            'zpass' => $hashpass,
            'zmail' => $mail,
            'zname' => $full,
            'zphone' => $phone
    
          ));

          echo '<div class="alert alert-success">' . $stmt->rowCount(). 'record inserted</div>';
         

        }

      }

      } 
    
    }
 
    ?>

  