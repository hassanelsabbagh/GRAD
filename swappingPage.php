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
    ?>
      <div class="row opaas">
        <?php
      echo '<div class="col-md-4">';
       echo '<img src="Imgs/Games/' . $key['ImageGame'] . '"alt="">';
        ?>
       </div>
       <?php
       echo '<div class="col-md-6"';
       echo '<h5 class="underline uppercase">' . $key['Name'] . '</h5>';
       echo '<p><span>Requested by: </span> <a href="profilevis.php?do=view&user=' . $key['username'] . '">' . $key['username'] . '</a>';
       echo '<p><span>Offered Game: ' . $key['itemOffered'] . '</span></p>'; 
          if ($key['status'] == 1){
            
          echo '<form action="?do=dealDoneOther&id=' . $key['reqsID'] . '&otherid=' . $key['user2Conf'] . '&userowner=' . $key['userReqdID'] . '" method="POST">';
              echo '<p>How the deal goes with trader?</p>';
              echo '<select name="rate">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>';

       echo '<button type="submit" style="padding: 7px 10px; font-size: 10px">Deal Done</button>';
       echo '</form>';
       echo '<a href="?do=decline&id=' . $key['reqsID'] . '" style="padding: 7px 10px; font-size: 10px">Cancel</a>';
       }else{
        echo "Waiting for acceptance";

         echo '<a href="?do=decline&id=' . $key['reqsID'] . '" style="padding: 7px 10px; font-size: 10px">Cancel</a>';
         ?>
     </div>
   </div>
   <?php
       }
   }else{
    		
    	//foreach ($row as $key) {
    	?>
    	<div class="row opaas">
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
       echo '<form action="?do=dealDoneOwner&id=' . $key['reqsID'] . '&ownerid=' . $key['user1Conf'] . '&userother=' . $key['userReqID'] . '" method="POST">';
       echo '<button type="submit" style="padding: 7px 10px; font-size: 10px">Deal Done</button>';
       echo '<p>How the deal goes with trader?</p>';
       echo '<select name="rate">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>';
       echo '</form>';
       echo '<a href="?do=decline&id=' . $key['reqsID'] . '" style="padding: 7px 10px; font-size: 10px">Cancel</a>';
     }

       ?>
       </div>
      </div>
       <?php
    	}

  
   }

        
      }else{
      	echo "You got no swap deals";
      }
      ?>
	</div>
	</div>
	</section>


<?php



if ($do == 'dealDoneOwner'){

    
     $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 'l2a';
    $ownerid = isset($_GET['ownerid']) && is_numeric($_GET['ownerid']) ? intval($_GET['ownerid']) : 'l2a';
    $userother = isset($_GET['userother']) && is_numeric($_GET['userother']) ? intval($_GET['userother']) : 'l2a';

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

       $rate = '';
    if (isset($_POST['rate'])){

       $rate = $_POST['rate'];
    }

		if ($ownerid != 1){

			$stmt = $con->prepare("UPDATE reqs SET user1Conf = 1 WHERE reqsID = ? ");

    		$stmt->execute(array($id));
}

      $stmt2 = $con->prepare("SELECT user1Conf, user2Conf FROM reqs WHERE user1Conf = 1 AND user2Conf = 1 AND reqsID = ? ");

      $stmt2->execute(array($id));

      $row = $stmt2->fetch();

      $count = $stmt2->rowCount();

       $stmt3 = $con->prepare("INSERT INTO rating(userRater, userRated, rate) VALUES(:zuserrater, :zuserrated, :zrate)");

         $stmt3->execute(array(
            'zuserrater' => $_SESSION['ID'],
            'zuserrated' => $userother,
            'zrate' => $rate
          ));

      if ($count == 1 ){

        echo 'Deal is done';

          $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 'l2a';

    $stmt4 = $con->prepare("DELETE FROM reqs WHERE reqsID = ? ");
    $stmt4->execute(array($id));
    header('Refresh: 0; URL=swappingPage.php');

         

      }else{

        echo "Other trader didn't confirm that the deal is done";
      }


	}

	}


if ($do == 'dealDoneOther'){

   
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 'l2a';
    $otherid = isset($_GET['otherid']) && is_numeric($_GET['otherid']) ? intval($_GET['otherid']) : 'l2a';
    $userowne = isset($_GET['userowner']) && is_numeric($_GET['userowner']) ? intval($_GET['userowner']) : 'l2a';

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $rate = '';
    if (isset($_POST['rate'])){

       $rate = $_POST['rate'];
    }


    if ($otherid != 1){

      $stmt = $con->prepare("UPDATE reqs SET user2Conf = 1 WHERE reqsID = ? ");

        $stmt->execute(array($id));
}

      $stmt2 = $con->prepare("SELECT user1Conf, user2Conf FROM reqs WHERE user1Conf = 1 AND user2Conf = 1 AND reqsID = ? ");

      $stmt2->execute(array($id));

      $row = $stmt2->fetch();

      $count = $stmt2->rowCount();
        $stmt3 = $con->prepare("INSERT INTO rating(userRater, userRated, rate) VALUES(:zuserrater, :zuserrated, :zrate)");

         $stmt3->execute(array(
            'zuserrater' => $_SESSION['ID'],
            'zuserrated' => $userowne,
            'zrate' => $rate
          ));

      if ($count == 1 ){

        echo 'Deal is done';

          $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 'l2a';

          $stmt4 = $con->prepare("DELETE FROM reqs WHERE reqsID = ? ");
          $stmt4->execute(array($id));
          header('Refresh: 0; URL=swappingPage.php');

       


      }else{

        echo "Other trader didn't confirm that the deal is done";
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


