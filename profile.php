<?php
  session_start();
  if (isset($_SESSION['Username'])){

    $pageTitle = 'Games';
    include 'connect.php';
    include 'includes/functions/functions.php';
    include 'includes/templates/header.php';
    include "includes/languages/english.php";
    //include 'includes/templates/navbar.php';
    include "includes/templates/footer.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>The Swap &mdash; Games</title>
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
  </head>
  

  <body>
  <!----Mobile view---> 
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <!----menue yetlam--->
    <header class="site-navbar py-3" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-11 col-xl-2">
            <h1 class="mb-0"><a href="Home.html" class="text-white h2 mb-0">The<span class="text-primary">Swap</span> </a></h1>
          </div>
    <!----Navbar--->
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li><a href="Home.html">Home</a></li>
                <li class="active"><a href="Profile.html">Profile</a></li>
                <li><a href="Traders.html">Traders</a></li>
                <li><a href="Games.html">Games</a></li>
                <li><a href="Books.html">Books</a></li>
                <li><a href="#"> <span class="fa fa-shopping-cart"></span></a></li>  
                <li class="cta"><a href="login.html">Logout</a></li>              
              </ul>
            </nav>
          </div>
          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
          </div>
        </div>
      </div>
</header>
 <!-----tittle----->
</br></br></br>


<?php


    $stmt = $con->prepare("SELECT username, Email, Fullname, PhoneNumber, Image FROM users WHERE usrID = ? ");
    $stmt->execute(array($_SESSION['ID']));
    $row = $stmt->fetch();



   ?>

    <div class="container">
      <input type="hidden" name="userid" value="<?php echo $userid ?>">
      <div class="form-group">
        <label class="col-sm-2 control-label"> Image </label>
        <div class="col-sm-10">
         <?php echo "<img width='200' height='100' src='Uploads/Games/" . $row['Image'] . "' alt='' >";?>
          </div>
          </div>
      <div class="form-group">
        <label class="col-sm-2 control-label"> Username</label>
        <div class="col-sm-10">
          <label class="control-label"><?php echo $row['username'] ?></label>
          </div>
          </div> 
          <div class="form-group">
        <label class="col-sm-2 control-label">E-mail </label>
        <div class="col-sm-10">
          <label class="control-label"><?php echo $row['Email'] ?></label>
          </div>
          </div> 
        <div class="form-group">
        <label class="col-sm-2 control-label"> Full Name</label>
        <div class="col-sm-10">
          <label class="control-label"><?php echo $row['Fullname'] ?></label>
          </div>
          </div>
        <div class="form-group">
        <label class="col-sm-2 control-label"> Phone Number</label>
        <div class="col-sm-10">
          <label class="control-label"><?php echo $row['PhoneNumber'] ?></label>
          </div>
          </div>
        
          </div> 

          <?php

            echo '<center> <a href="members.php?do=Edit&userid=' . $_SESSION['ID'] . '" class="btn-custom data-aos-delay="50" style="margin-top: : 10000px"><span>Edit Profile</span></a></center>';
            ?>
            
  </div>

  <?php
    

    ?>

</br></br></br></br></br></br></br></br>
 <!------Footer---->
    <footer class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h2 class="footer-heading text-uppercase mb-4">About Us</h2>

          <p>This website was mainly developed for a course project. the course is mainly about database creation but we created a website to integrate with database to be more professional about our work this project was developed by four AAST students 
    <ul><li>Ahmed Bakr</li><li>Hassan El-Sabag</li><li>Ahmed El-Nagar</li><li>Mohamed Medhat</li></ul>

          </div>
          <div class="col-md-3 ml-auto">
            <h2 class="footer-heading text-uppercase mb-4">Quick Links</h2>
            <ul class="list-unstyled">
              <li><a href="#">Feedback</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <h2 class="footer-heading text-uppercase mb-4">Connect with Us</h2>
            <p>
              <a href="#" class="p-2 pl-0"><span class="icon-facebook"></span></a>
              <a href="#" class="p-2"><span class="icon-twitter"></span></a>
              <a href="#" class="p-2"><span class="icon-youtube"></span></a>
              <a href="#" class="p-2"><span class="icon-instagram"></span></a>
            </p>
          </div>
        </div>
        <div class="row">
          
            <div class="col-md-12 text-center">
              <div class="border-top pt-5">
  <p>Powered by <a href="http://www.aast.edu/en/index.php" target="blank" class="w3-hover-text-green" target="blank">AASTSolutions</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>

  <?php

}else{
  echo ' enta khammam ';
    header('Location: index.php');
    exit();
}