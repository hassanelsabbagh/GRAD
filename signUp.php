	<?php
	session_start();
	include 'connect.php';
  	include 'includes/functions/functions.php';
  	include 'includes/templates/header.php';
  	include "includes/languages/english.php";
  	include 'includes/templates/navbar.php';
  	include "includes/templates/footer.php";

  	  	$do = '';
	if( isset($_GET['do'])){
		$do = $_GET['do'];
}

if ($do == 'Insert') {?>

<h1 class="text-center">Sign Up</h1>

	<div class="container">
		<form class="form-horizontal" action="?do=Insert" method="POST">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<div class="form-group">
				<label class="col-sm-2 control-label"> Username</label>
				<div class="col-sm-10">
					<input type="text" name="Username" class="form-control" required="required" placeholder="username">
					</div>
					</div> 
					<div class="form-group">
				<label class="col-sm-2 control-label"> Password</label>
				<div class="col-sm-10">
					<input type="Password" name="Password" class="form-control" autocomplete="new-password" required="required" placeholder="password must be complex" >
					</div>
					</div> 
					<div class="form-group">
				<label class="col-sm-2 control-label">E-mail </label>
				<div class="col-sm-10">
					<input type="text" name="E-mail" class="form-control" required="required" placeholder="enter your email">
					</div>
					</div> 
				<div class="form-group">
				<label class="col-sm-2 control-label"> Full Name</label>
				<div class="col-sm-10">
					<input type="text" name="fullname" class="form-control" placeholder="enter fullname" required="required">
					</div>
					</div> 
						<div class="form-group">
				<label class="col-sm-offset-2 col-sm-10"> Submit</label>
				<div class="col-sm-10">
					<input type="submit" value="Add member" class= "btn btn-primary">
					</div>
					</div> 
		</form>
	</div>


  		<?php

  		if ($_SERVER['REQUEST_METHOD'] == 'POST'){


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

  		} 
  	
  	}
 

  	?>

	