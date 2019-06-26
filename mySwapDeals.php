<?php

session_start();

  if (isset($_SESSION['Username'])){

    $pageTitle = 'Playstation4';
    include 'connect.php';
    include 'includes/functions/functions.php';
    include 'includes/templates/header.php';
    include "includes/languages/english.php";
    include 'includes/templates/mainNav.php';

    ?>

     <section class="ourgames text-center">
    <div class="container">
    <div class="performance capitalize">

   	<?Php

    $do = '';

  if (isset($_GET['do'])){

    $do = $_GET['do'];
}

    $stmt = $con->prepare("SELECT * FROM playstation4 INNER JOIN reqs ON playstation4.ID = reqs.itemReqID INNER JOIN users ON reqs.userReqID = users.usrID WHERE userReqID = ?");
    $stmt->execute(array($_SESSION['ID']));
    $row = $stmt->fetchAll();
    $count = $stmt->rowCount();

    if ($count != 0){

    	foreach ($row as $key) {
    		# code...
    	
  
      echo '<div class="col-md-4">';
       echo '<img src="Imgs/Games/' . $key['ImageGame'] . '"alt="">';
       echo '<h5 class="underline uppercase">' . $key['Name'] . '</h5>';
       echo '<p><span>Requested by: </span> <a href="profilevis.php?do=view&user=' . $key['username'] . '">' . $key['username'] . '</a>';
       echo '<p><span>Offered Game: ' . $key['itemOffered'] . '</span></p>';
       echo '<form action="?do=accept" method="POST">';
       echo '<div class="col-md-4"><button type="submit" class="data-aos-delay=50 style="margin-top: : 10000px; padding: 7px 10px; font-size: 1px">Accept</button></div>';
       echo '</form>';
       echo '<form action="?do=decline" method="POST">';
       echo '<div class="col-md-4"><button type="submit" class="data-aos-delay=50 style="margin-top: : 10000px; padding: 7px 10px; font-size: 1px">Decline</button></div>';
       echo '</form>';
   }
        
      }else{
      	echo "You got no swap deals";
      }

      ?>
    </section>
	</div>
	</div>
	<?php


       } else {
  	echo ' enta khammam ';
  	header('Location: index.php');
  	exit();
  }
    
?>