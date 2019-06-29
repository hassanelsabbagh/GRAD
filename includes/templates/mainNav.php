
 <?php

    include 'connect.php';
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>The Swap &mdash; Homepage</title>
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


    <style type="text/css">



      .dropdown{

position: relative;
display: inline-block;

}

.dropdown-content{

display: none;
position: absolute;
right: 0px;
background-color: white;
width: 262px;
z-index: 1;
text-align: left;
border-radius: 10px;
padding: 20px;

}

.dropdown-content a {
color: black;
padding: 10px 10px;
text-decoration: none;
display: block;
}
.dropdown-content button{
  border-radius: 10px;
}

.dropdown-content a:hover{ background-color: #FF4500; border-radius: 10px}
.dropdown:hover .dropdown-content {display: block; width: 262px;}
.dropdown:hover .dropbtn {background-color: grey; }

    </style>
  </head>
  
<?php
  
  $do = '';

  if (isset($_GET['do'])){

    $do = $_GET['do'];
}


    $name = '';

  if (isset($_GET['name'])){

    $name = $_GET['name'];
}
?>

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
    
    <!----menue tetlam--->
    <header class="site-navbar py-3" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-11 col-xl-2">
            <h1 class="mb-0"><a href="home.html" class="text-white h2 mb-0">The<span class="text-primary">Swap</span> </a></h1>
      
          </div>
    <!----Navbar--->
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul style="list-style:none;" class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="swappingPage.php">Deals</a></li>
                <li><a href="Games2.php">Games</a></li>
                <li><a href="books.html">Books</a></li>
                <li><a href="cart.php"><span class="fa fa-shopping-cart"></span></a></li>
                <div class="dropdown">
                <li><a href="?do=swap"><span class="fa fa-bell"></span></a></li>
                <div class="dropdown-content">
            
                <?php 


                    $stmt = $con->prepare("SELECT * FROM playstation4 INNER JOIN reqs ON playstation4.ID = reqs.itemReqID INNER JOIN users ON reqs.userReqID = users.usrID WHERE userReqdID = ? OR userReqID = ?");
                    $stmt->execute(array($_SESSION['ID'], $_SESSION['ID']));
                    $row = $stmt->fetchAll();
                    $count = $stmt->rowCount();

                    if($count !=0 ){

                    foreach ($row as $notif) {
                  
                    if($_SESSION['ID'] != $notif['userReqID']){
                   
                    echo '<a href="swappingPage.php">' . $notif['username'] . ' has a swap deal for you for ' . $notif['Name'] . '</a></br>'; 
                    echo'------------------';
                
                    
      }else{

        echo '<div class="dropdown-content">';
                  
                    echo '<span>You have no new notification</span></br>';
                    echo '</div>';

      }

   }
   }else{
       echo '<div class="dropdown-content">';
                  
                    echo '<span>You have no new notification</span></br>';
                    echo '</div>';
  }



?>

              </div>
              </div>
                <li class="cta"><a href="logout.php">Logout</a></li>              
              </ul>
            </nav>
          </div>
          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
          </div>
        </div>
      </div>

    </header>
    <br><br><br><br><br>




