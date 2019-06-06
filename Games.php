
 <?php
  session_start();
  if (isset($_SESSION['Username'])){

  	$pageTitle = 'Games';
  	include 'connect.php';
  	include 'includes/functions/functions.php';
  	include 'includes/templates/header.php';
  	include "includes/languages/english.php";
  	include 'includes/templates/navbar.php';
  	include "includes/templates/footer.php";
?>
    
     <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
                <li><a href="Profile.html">Profile</a></li>
                <li><a href="Traders.html">Traders</a></li>
                <li class="active"><a href="Games.html">Games</a></li>
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

 <!-----tittle----->
</br></br></br>

<!-- start games -->
<section class="ourgames text-center">
    <div class="container">
      <div class="infogames">
        <h3 class="uppercase">our games</h3>
        <p class=" lead capitalize">2019 National games Critics Circle Award Winners </p>
      </div>
      <div class="performance capitalize">
        <div class="row">
          <div class="col-md-4">
            <img class="img-fluid img-responsive" src="design/css/pubg.png" alt="pic">
            <h5 class="underline uppercase">pubg mobile</h5>
            <p><span>description:</span> l3ba 7elwa yawalad</p>
            <p><span>reqirment:</span> god of war</p>
            <p><span>others:</span>gameeeeeeel</p>
          </div>
          <div class="col-md-4">
            <img class="img-fluid img-responsive" src="design/css/pubg.png" alt="pic">
            <h5 class="underline uppercase">pubg mobile</h5>
            <p><span>description:</span> l3ba 7elwa yawalad</p>
            <p><span>reqirment:</span> god of war</p>
            <p><span>others:</span>gameeeeeeel</p>
          </div>
          <div class="col-md-4">
            <img class="img-fluid img-responsive" src="design/css/pubg.png" alt="pic">
            <h5 class="underline uppercase">pubg mobile</h5>
            <p><span>description:</span> l3ba 7elwa yawalad</p>
            <p><span>reqirment:</span> god of war</p>
            <p><span>others:</span>gameeeeeeel</p>
          </div>
          <div class="col-md-4">
            <img class="img-fluid img-responsive" src="design/css/pubg.png" alt="pic">
            <h5 class="underline uppercase">pubg mobile</h5>
            <p><span>description:</span> l3ba 7elwa yawalad</p>
            <p><span>reqirment:</span> god of war</p>
            <p><span>others:</span>gameeeeeeel</p>
          </div>
          <div class="col-md-4">
            <img class="img-fluid img-responsive" src="design/css/pubg.png" alt="pic">
            <h5 class="underline uppercase">pubg mobile</h5>
            <p><span>description:</span> l3ba 7elwa yawalad</p>
            <p><span>reqirment:</span> god of war</p>
            <p><span>others:</span>gameeeeeeel</p>
          </div>
          <div class="col-md-4">
            <img class="img-fluid img-responsive" src="design/css/pubg.png" alt="pic">
            <h5 class="underline uppercase">pubg mobile</h5>
            <p><span>description:</span> l3ba 7elwa yawalad</p>
            <p><span>reqirment:</span> god of war</p>
            <p><span>others:</span>gameeeeeeel</p>
          </div>
        </div>
      </div>   
    </div>  
  </section>

<!-- end games -->




</br></br></br></br></br></br></br></br>
 <!------Footer---->
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
    
  </div>


  <script src="design/js/jquery-3.3.1.min.js"></script>
  <script src="design/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="design/js/jquery-ui.js"></script>
  <script src="design/js/popper.min.js"></script>
  <script src="design/js/bootstrap.min.js"></script>
  <script src="design/js/owl.carousel.min.js"></script>
  <script src="design/js/jquery.stellar.min.js"></script>
  <script src="design/js/jquery.countdown.min.js"></script>
  <script src="design/js/jquery.magnific-popup.min.js"></script>
  <script src="design/js/bootstrap-datepicker.min.js"></script>
  <script src="design/js/aos.js"></script>

  <script src="design/js/main.js"></script>
  <?php

}else{
  echo ' enta khammam ';
    header('Location: index.php');
    exit();
}