 <?php
  session_start();
  if (isset($_SESSION['Username'])){

  	$pageTitle = 'home';
  	include 'connect.php';
  	include 'includes/functions/functions.php';
  	include 'includes/templates/header.php';
  	include "includes/languages/english.php";
  	include 'includes/templates/navbar.php';
  	include "includes/templates/footer.php";

  	$do = '';
	if( isset($_GET['do'])){
		$do = $_GET['do'];
} else {
	$do = 'Manage';
}

if ($do == 'Manage'){

	$value = "hassan";

	$check = checkItem("username", "users", $value);	

	if ($check == 1)
		echo "success";

  } elseif ($do == 'Edit'){ 
	$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 'l2a';

	$stmt = $con->prepare("SELECT * FROM users WHERE usrID = ? LIMIT 1");
  	$stmt->execute(array($userid));
    $row = $stmt->fetch();
  	$count = $stmt->rowCount();

  	if ($stmt->rowCount()>0){ ?>

	<h1 class="text-center">Edit Member</h1>

	<div class="container">
		<form class="form-horizontal" action="?do=Update" method="POST">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<div class="form-group">
				<label class="col-sm-2 control-label"> Username</label>
				<div class="col-sm-10">
					<input type="text" name="Username" class="form-control" value="<?php echo $row['username'] ?>" required="required">
					</div>
					</div> 
					<div class="form-group">
				<label class="col-sm-2 control-label"> Password</label>
				<div class="col-sm-10">
					<input type="hidden" name="oldPassword" value="<?php echo $row['password'] ?>" >
					<input type="Password" name="newPassword" class="form-control" autocomplete="new-password" >
					</div>
					</div> 
					<div class="form-group">
				<label class="col-sm-2 control-label">E-mail </label>
				<div class="col-sm-10">
					<input type="text" name="E-mail" class="form-control" value="<?php echo $row['Email'] ?>" required="required">
					</div>
					</div> 
				<div class="form-group">
				<label class="col-sm-2 control-label"> Full Name</label>
				<div class="col-sm-10">
					<input type="text" name="fullname" class="form-control" value="<?php echo $row['Fullname'] ?>" required="required">
					</div>
					</div> 
						<div class="form-group">
				<label class="col-sm-offset-2 col-sm-10"> Submit</label>
				<div class="col-sm-10">
					<input type="submit" value="update" class= "btn btn-primary">
					</div>
					</div> 
		</form>
	</div>
	
<?php

	} else {

  echo "<div class='container'>";

  $Msg = "<div class='alert alert-danger'>there is no such id </div>";

  redirectHome($Msg);

  echo "</div>";

      } 

    }elseif ($do == 'Update') {
  		echo "<h1 class='text-center'>Update Member</h1>";

  		if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  			$id 	= $_POST['userid'];
  			$user 	= $_POST['Username'];
  			$mail 	= $_POST['E-mail'];
  			$full   = $_POST['fullname'];


  			$pass = '';

  			 
  			if (empty($_POST['newPassword'])){

  				$pass = $_POST['oldPassword'];

  			} else{

  				$pass = sha1($_POST['newPassword']);

  			}

  			$errors = array();

  			if (empty($user))

  				$errors[] = '<div class="alert alert-danger">username cannot be empty</div>';

  			if (strlen($user) < 4)

  				$errors[] = '<div class="alert alert-danger">username cannot be less than 4 characters</div>';

  			if (empty($mail))

  				$errors[] = '<div class="alert alert-danger">E-mail cannot be empty</div>';

  			if (empty($full))

  				$errors[] = '<div class="alert alert-danger">fullname cannot be empty</div>';

  			foreach ($errors as $error) {
  				echo $error ;	
  			}

  			if (empty($errors)){

  				$stmt = $con->prepare("UPDATE users SET username = ?, Email = ?, Fullname = ?, password = ? WHERE usrID = ?");
  				$stmt->execute(array($user, $mail, $full,$pass, $id));

  				$Msg = $stmt->rowCount(). '<div class="alert alert-success">record updated</div>';

          redirectHome($Msg, 'back');
  			}

  		} else {
  			
  			$Msg = '<div class="alert alert-danger">sorry you cant browse this page directly</div>';

  			redirectHome($Msg, 'back');
  		}

  	}elseif ($do == 'Insert') {
  		

  		if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  			echo "<h1 class='text-center'>Update Member</h1>";

  			$user 	= $_POST['Username'];
  			$pass 	= $_POST['Password'];
  			$mail 	= $_POST['E-mail'];
  			$full   = $_POST['fullname'];


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

  			foreach ($errors as $error) {
  				echo '<div class="alert alert-danger">' . $error . '</div>' ;	
  			}

  			if (empty($errors)){

  				$check = checkItem("username", "users", $user);

  				if ($check == 1){

  					$Msg = '<div class="alert alert-danger">this user already exists</div>';

            redirectHome($Msg, 'back');
            
  				}else{

  				$stmt = $con->prepare("INSERT INTO users(username, password, Email, Fullname) VALUES(:zuser, :zpass, :zmail, :zname)");
  				$stmt->execute(array(
  					'zuser' => $user,
  					'zpass' => $hashpass,
  					'zmail' => $mail,
  					'zname' => $full
  				));

  				echo '<div class="alert alert-success">' . $stmt->rowCount(). 'record inserted</div>';
  			}

  		}

  		} else {

  			   $Msg = '<div class="alert alert-danger">sorry you cant browse this page directly</div>';

        redirectHome($Msg, 'back');
      }
  	
  	}

    

  	
  } else {
  	echo ' Not allowed';
  	header('Location: index.php');
  	exit();
  }

  