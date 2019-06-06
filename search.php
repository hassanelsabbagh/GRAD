  <?php
  session_start();
  if (isset($_SESSION['Username'])){
  
    include 'connect.php';
    include 'includes/functions/functions.php';
    include 'includes/templates/header.php';
    include "includes/languages/english.php";
    include 'includes/templates/navbar2.php';
    include "includes/templates/footer.php";
    
    ?>

  
    <?php

     if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      $srch = $_POST['search'];


     $stmt = $con->prepare("SELECT Name FROM playstation4 WHERE Name = ? ");
  	$stmt->execute(array($srch));
    $row = $stmt->fetch();
  	$count = $stmt->rowCount();
 
  	if ($count == 1){
  		echo $srch . " Item Found";
  	}else{
  		echo "no";
  	}
      

  }
 
  }else{

    echo ' enter directly';
    header('Location: index.php');
    exit();
  }

      ?>