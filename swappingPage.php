<?php

session_start();
 ob_start();
  if (isset($_SESSION['Username'])){

    $pageTitle = 'Playstation4';
    include 'connect.php';
    include 'includes/functions/functions.php';
    include 'includes/templates/header.php';
    include "includes/languages/english.php";
    include 'includes/templates/mainNav.php';
    
    
    
?>

<style type="text/css">
	
	.ext{
		display: none;
	}
</style>

    <section class="ourgames text-center">
    <div class="container">
      <div class="infogames">
        <h3 class="uppercase">YOUR DEALS</h3>
        
      </div>
      <div class="performance capitalize">
        


   	<?Php

    $do = '';

  if (isset($_GET['do'])){

    $do = $_GET['do'];
}

    $stmt = $con->prepare("SELECT * FROM playstation4 INNER JOIN reqs ON playstation4.ID = reqs.itemReqID INNER JOIN users ON reqs.userReqID = users.usrID WHERE userReqdID = ? OR userReqID = ?");
    $stmt->execute(array($_SESSION['ID'], $_SESSION['ID']));
    $row = $stmt->fetchAll();
    $count = $stmt->rowCount();

    $i = 0;
    
    if ($count != 0){
    

    foreach ($row as $key) {

    if ($_SESSION['ID'] == $key['userReqID']){
    
      echo '<div class="col-md-4">';
       echo '<img src="Imgs/Games/' . $key['ImageGame'] . '"alt="">';
       echo '<h5 class="underline uppercase">' . $key['Name'] . '</h5>';
       echo '<p><span>Requested by: </span> <a href="profilevis.php?do=view&user=' . $key['username'] . '">' . $key['username'] . '</a>';
       echo '<p><span>Offered Game: ' . $key['itemOffered'] . '</span></p>'; 
          if ($key['status'] == 1){

          echo '<form action="?do=dealDone" method="POST">';
       echo '<button type="submit" style="padding: 7px 10px; font-size: 10px">Deal Done</button>';
       echo '</form>';
       }else{
        echo "Waiting for acceptance";

         echo '<a href="?do=decline&id=' . $key['reqsID'] . '" style="padding: 7px 10px; font-size: 10px">Cancel</a>';
       }
   }else{
    		
    	//foreach ($row as $key) {
    	?>
    	<div class="row">
    	<?php
      echo '<div class="col-md-4">';
       echo '<img src="Imgs/Games/' . $key['ImageGame'] . '"alt="">';
       ?>
       </div>
       <?php
       echo '<div class="col-md-6">';
       echo '<h5 class="underline uppercase">' . $key['Name'] . '</h5>';
       echo '<span>Requested by: </span> <a href="profilevis.php?do=view&user=' . $key['username'] . '">' . $key['username'] . '</a>';
       echo '<p><span>Offered Game: ' . $key['itemOffered'] . '</span></p>';

   

       ?>
       </div>
       <?php
       echo '<div class="col-md-2">';
       if ($key['status'] == 0){
       echo '<form action="?do=accept&id=' . $key['reqsID'] . '&stat=' . $key['status'] . '" method="POST">';
       echo '<button type="submit" class="zor" type="button" style="padding: 7px 10px; font-size: 10px">Accept</button>';
       echo '</form>';
       echo '<a href="?do=decline&id=' . $key['reqsID'] . '" style="padding: 7px 10px; font-size: 10px">Decline</a>';

     }elseif($key['status'] == 1){
      echo '<div>Item accepted</div>';
       echo '<form action="?do=dealDone&id=' . $key['reqsID'] . '&usr1id=' . $key['user1Conf'] . '&usr2id=' . $key['user2Conf'] . '&stat=' . $key['status'] . '" method="POST">';
       echo '<button type="submit" style="padding: 7px 10px; font-size: 10px">Deal Done</button>';
       echo '</form>';
       echo '<a href="?do=decline&id=' . $key['reqsID'] . '" style="padding: 7px 10px; font-size: 10px">Cancel</a>';
     }

       ?>
       </div>
      </div>
       <?php
    	}

    	$i++;
   }

        
      }else{
      	echo "You got no swap deals";
      }
      ?>
	</div>
	</div>
	</section>


<?php



if ($do == 'dealDone'){
echo "string";
     $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 'l2a';
    $usr1id = isset($_GET['usr1id']) && is_numeric($_GET['usr1id']) ? intval($_GET['usr1id']) : 'l2a';
    $usr2id = isset($_GET['user2id']) && is_numeric($_GET['user2id']) ? intval($_GET['user2id']) : 'l2a';

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){


		if ($usr1id != 1){

			$stmt = $con->prepare("UPDATE reqs SET user1Conf = 1 WHERE reqsID = ? ");

    		$stmt->execute(array($id));

  		}elseif ($usr2id != 1){

  			$stmt = $con->prepare("UPDATE reqs SET user2Conf = 1 WHERE reqsID = ? ");

    		$stmt->execute(array($id));

    	}else{

  			echo "Item is already done";
  
		}

	}

	}


  if ($do == 'accept'){

    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 'l2a';
    $stat = isset($_GET['stat']) && is_numeric($_GET['stat']) ? intval($_GET['stat']) : 'l2a';

  	if ($_SERVER['REQUEST_METHOD'] == 'POST'){


    if ($stat != 1 ){
      echo "string";
    $stmt = $con->prepare("UPDATE reqs SET status = 1 WHERE reqsID = ? ");
    $stmt->execute(array($id));
    header('Refresh: 0; URL=swappingPage.php');
  }elseif($stat == 1){
  	echo "Item is already accepted";
  
}
}
  }

  if ($do == 'decline'){


  	$id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 'l2a';

    $stmt = $con->prepare("DELETE FROM reqs WHERE reqsID = ? ");
    $stmt->execute(array($id));
    header('Refresh: 0; URL=swappingPage.php');

  }

   } else {
  	echo ' enta khammam ';
  	header('Location: index.php');
  	exit();
  }
include 'includes/templates/footer.php';
?>


