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

     $do = '';

      if( isset($_GET['do'])){

        $do = $_GET['do'];

      }else{

        $do = 'Manage';
            }


  if ($do == 'view'){

    if (isset($_GET['user'])){

        $user = $_GET['user'];

    }
    
    $stmt = $con->prepare("SELECT username, Email, Fullname, PhoneNumber, ImageUsr, AVG(userRated) FROM users INNER JOIN rating ON users.usrID = rating.userRated WHERE username = ? ");
    $stmt->execute(array($user));
    $row = $stmt->fetch();



   ?>

    <div class="container">
      <input type="hidden" name="userid" value="<?php echo $userid ?>">
      <div class="form-group edcss">
        <label class="col-sm-2 control-label "> Image </label>
        <div class="col-sm-10">
         <?php echo "<img width='200' height='100' src='Imgs/Users/" . $row['ImageUsr'] . "' alt='' >";?>
          </div>
          </div>
      <div class="form-group edcss">
        <label class="col-sm-2 control-label "> Username</label>
        <div class="col-sm-10">
          <label class="control-label form-control"><?php echo $row['username'] ?></label>
          </div>
          </div> 
          <div class="form-group edcss">
        <label class="col-sm-2 control-label">E-mail </label>
        <div class="col-sm-10">
          <label class="control-label form-control"><?php echo $row['Email'] ?></label>
          </div>
          </div> 
        <div class="form-group edcss">
        <label class="col-sm-2 control-label"> Full Name</label>
        <div class="col-sm-10">
          <label class="control-label form-control"><?php echo $row['Fullname'] ?></label>
          </div>
          </div>
        <div class="form-group edcss">
        <label class="col-sm-2 control-label"> Phone Number</label>
        <div class="col-sm-10">
          <label class="control-label form-control"><?php echo $row['PhoneNumber'] ?></label>
          </div>
          </div>
           <div class="form-group edcss">
        <label class="col-sm-2 control-label"> Rating</label>
        <div class="col-sm-10">
          <label class="control-label form-control"><?php echo $row['AVG(userRated)']/10 ?>/5</label>
          </div>
          </div>
        
          </div> 
            
  </div>

  <?php
    }

    ?>



  <?php


include "includes/templates/footer.php";

}else{
  echo ' enta khammam ';
    header('Location: index.php');
    exit();
}