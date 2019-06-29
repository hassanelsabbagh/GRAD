<?php
  session_start();
  if (isset($_SESSION['Username'])){

    $pageTitle = 'Games';
    include 'connect.php';
    include 'includes/functions/functions.php';
    include 'includes/templates/header.php';
    include "includes/languages/english.php";
    include 'includes/templates/mainNav.php';
    
?>

    <?php

     if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      $srch = $_POST['search'];


     $stmt = $con->prepare("SELECT Name FROM playstation4 WHERE Name = ? ");
    $stmt->execute(array($srch));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();?>

    <section class="ourgames text-center">
    <div class="container">
      <div class="infogames">
        <h3 class="uppercase">our games</h3>
        <p class=" lead capitalize"><?php echo $count . 'found for ' . $srch . '</p>' ?>
      </div>
      <div class="performance capitalize">
        <div class="row">


<?php

    
 
    if ($count > 0){

    $stmt = $con->prepare("SELECT * FROM playstation4 INNER JOIN users ON playstation4.user_id = users.usrID WHERE Name = ? ");
    $stmt->execute(array($srch));
    $rows = $stmt->fetchAll();
    
    foreach ($rows as $game) {
      # code...

     echo ' <div class="col-md-4">';
          echo '<img src="Imgs/Games/' . $game['ImageGame'] . '" alt="">';
          echo '<h5 class="underline uppercase">' . $game['Name']. '</h5>';
          echo '<a href="profilevis.php?do=view&user=' . $game['username'] . '"<p><span>Posted by: </span>' . $game['username'] . '</a>';
          echo '<p><span>description: </span>' . $game['Description'] . '</p>';
          echo '<p><span>reqirment: </span>' . $game['Requirements'] . '</p>';
          echo  '<p><span>others: </span>' . $game['Other'] . '</p>';
          echo '<center> <a href="Games2.php?do=addToCart&id=' . $game['ID'] . '&name=' . $game['username'] . '" class="btn-custom data-aos-delay=50 style="margin-top: : 10000px; padding: 7px 10px; font-size: 1px"><span>Add to cart</span></a></center>';
          echo '</div> ';

    
        }

    }else{

      echo "no results found";
    }

      


      
    }else{
      echo "no";
    }
      

  ?>

    </div>
  </div>
    </div>  

  </section>



  <?php

  include "includes/templates/footer.php";

}else{
  echo ' Not allowed ';
    header('Location: index.php');
    exit();
}