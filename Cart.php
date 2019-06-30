 <?php
  session_start();
  ob_start();
  if (isset($_SESSION['Username'])){

    $pageTitle = 'Games';
    include 'connect.php';
    include 'includes/functions/functions.php';
    include 'includes/templates/header.php';
    include "includes/languages/english.php";
    include 'includes/templates/mainNav.php'; ?>

    <style type="text/css">

#txtb{
  visibility: hidden;
  position: absolute;
  z-index: 1;

}

#lamona:hover #txtb{
  visibility: visible;
}

    </style>

    <section class="ourgames text-center">
    <div class="container">
      <div class="infogames">
        <h3 class="uppercase">my cart</h3>
        
      </div>
      <div class="performance capitalize">
        
    	
    	

   	<?php

   	  $do = '';

      if( isset($_GET['do'])){

        $do = $_GET['do'];

      }

    $stmt = $con->prepare("SELECT * FROM playstation4 INNER JOIN cart ON playstation4.ID = cart.itemID INNER JOIN users ON playstation4.user_id = users.usrID WHERE cartUsrID = ?");
    $stmt->execute(array($_SESSION['ID']));
    $row = $stmt->fetchAll();
    $count = $stmt->rowCount();

    if($count !=0 ){

    foreach ($row as $game) {

          ?>
          <div class="row opaas">
          <?php
    	   
    	   echo ' <div class="col-md-3">';
          echo "<img src='Imgs/Games/" . $game['ImageGame'] . "' alt='' >";
           ?>
          </div>
          <?php
          echo ' <div class="col-md-5">';
          echo '<h5 class="underline uppercase">' . $game['Name']. '</h5>';

          
          echo '<a href="profilevis.php?do=view&user=' . $game['username'] . '"><p><span>Posted by: </span>' . $game['username'] . '</a>';
          echo '<p><span>description: </span>' . $game['Description'] . '</p>';
          echo '<p><span>reqirment: </span>' . $game['Requirements'] . '</p>';
          echo  '<p><span>others: </span>' . $game['Other'] . '</p>';
          ?>
          </div>
          <?php
          
		      echo '<div class="col-md-3"><a href="?do=remove&id=' . $game['ID'] . '">Remove</a>';
          echo '<form action="?do=swap&id=' . $game['ID'] . '&id2=' . $game['user_id'] . '" method="POST"';
    		  echo '<div id="lamona">';
    		  echo '<div><button onclick="myFunction()" type="submit">SWAP</a></div>';
    		  echo '<input class="form-control" id="txtb" type="text" name="gameoffer" placeholder="Place your game offering" required="required">';
          echo '</form>';
    		  echo '</div>';
          echo '</div>';
    		  

       


    }



if ($do == 'swap'){

	$id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 'No';
  $id2 = isset($_GET['id2']) && is_numeric($_GET['id2']) ? intval($_GET['id2']) : 'No';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$gamee = $_POST['gameoffer'];

		
if (empty($gamee)){

	'<div class="alert alert-danger">cannot ask for the game for nothing</div>';

}else{

	
		$stmt = $con->prepare("INSERT INTO reqs(userReqID, userReqdID, itemReqID, itemOffered, status, user1Conf, user2Conf) VALUES(:zuserID, :zuserdID, :zitemID, :zitemoffered, :zstatus, :zuser1, :zuser2)");
  				$stmt->execute(array(
  					'zuserID' => $_SESSION['ID'],
  					'zuserdID' => $id2,
  					'zitemID' => $id,
  					'zitemoffered' => $gamee,
  					'zstatus' => 0,
            'zuser1' => 0,
            'zuser2' => 0

  				));

  				
 
  	$stmt2 = $con->prepare("DELETE FROM cart WHERE itemID = ?");
		$stmt2->execute(array($id));

    

		header('Refresh: 0; URL=cart.php');
	}		



}

}


if ($do == 'remove'){

		$id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 'l2a';

		$stmt = $con->prepare("DELETE FROM cart WHERE itemID = ?");
		$stmt->execute(array($id));

    echo "item deleted";

		header('Refresh: 0; URL=cart.php');
	}
	}else{

	echo '<center><p>You got nothing in your cart</p></center>';
}

    ?>


</div>

</div>
</section>
    
<?php

  include "includes/templates/footer.php";

}else{
  echo ' enta khammam ';
    header('Location: index.php');
    exit();
}
?>

<script>
function myFunction() {
  alert("Swapping is under processing, we've sent to the owner request"); 
}
</script>