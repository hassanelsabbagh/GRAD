 <?php
  session_start();
  if (isset($_SESSION['Username'])){

  	$pageTitle = 'Playstation4';
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

?>

  	<h1 class="text-center">Add PS4 Game To Trade</h1>
  	<div class="container">
		<form class="form-horizontal" action="?do=Add" method="POST">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<div class="form-group">
				<label class="col-sm-2 control-label"> Name</label>
				<div class="col-sm-10">
					<input type="text" name="Name" class="form-control" required="required" placeholder="Name">
					</div>
					</div> 
					<div class="form-group">
				<label class="col-sm-2 control-label"> Description</label>
				<div class="col-sm-10">
					<input type="text" name="description" class="form-control" required="required" placeholder="desctive the category" >
					</div>
					</div> 
				<div class="form-group">
				<label class="col-sm-2 control-label"> Picture</label>
				<div class="col-sm-10">
					<input type="file" name="Image" class="form-control" required="required">
					</div>
					</div> 

						<div class="form-group">
				<label class="col-sm-2 control-label"> Requirements</label>
				<div class="col-sm-10">
					<input type="text" name="requirements" class="form-control" required="required" placeholder="what you need for your item" >
					</div>
					</div> 
						<div class="form-group">
				<label class="col-sm-2 control-label"> Other</label>
				<div class="col-sm-10">
					<input type="text" name="other" class="form-control" required="required" placeholder="" >
					</div>
					</div> 
						<div class="form-group">
				<label class="col-sm-offset-2 col-sm-10"> Submit</label>
				<div class="col-sm-10">
					<input type="submit" value="Add Item" class= "btn btn-primary">
					</div>
					</div> 
		</form>
	</div>

 	<?php

 		if ($do == 'Add') { 


  		if ($_SERVER['REQUEST_METHOD'] == 'POST'){


  			$name 	= $_POST['Name'];
  			$desc 	= $_POST['description'];
  			$img 	= $_POST['Image'];
  			$reqs   = $_POST['requirements'];
  			$other   = $_POST['other'];


  			$errors = array();

  			if (empty($name))

  				$errors[] = 'Item name cannot be empty</div>';


  			if (empty($img))

  				$errors[] = 'please put and image</div>';

  			if (empty($reqs))

  				$errors[] = 'Put your requirements for your item</div>';

  			foreach ($errors as $error) {
  				echo '<div class="alert alert-danger">' . $error . '</div>' ;	
  			}

  				$stmt = $con->prepare("INSERT INTO playstation4(Name, Description, Image, Requirements, Other) VALUES(:zname, :zdesc, :zimg, :zreqs, :zother)");
  				$stmt->execute(array(
  					'zname' => $name,
  					'zdesc' => $desc,
  					'zimg' => $img,
  					'zreqs' => $reqs,
  					'zother' => $other
  				));

  				echo '<div class="alert alert-success">' . $stmt->rowCount(). 'record inserted</div>';
  			}
  		}

  
}else{
	echo 'blash khara';
}