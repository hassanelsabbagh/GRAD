<?php

include 'Games2.php';


	


		global $con; 

		$stmt1 = $con->prepare("SELECT * FROM playstation4 WHERE Name = ?");
		$stmt1->execute(array($game));
		$row = $stmt1->fetch();

		$stmt2 = $con->prepare("INSERT INTO Carts(usrID, itemID) VALUES(:zuser, :zitem)");
  		$stmt2->execute(array(
  					'zuser' => $game['Name'],
  					'zitem' => $row['ID']
  					//'zdate' => date('m/d/y', time())));

  				));


  		header('Location: dashboard.php');




?>
