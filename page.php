<?php

$do = '';
	if( isset($_GET['do'])){
		$do = $_GET['do'];
} else {
	$do = 'Manage';
}

 if ($do == 'Manage'){
 	echo 'welcome manage';
 	echo '<a href="page.php?do=add">Add +</a>';

 } elseif($do == 'add') {

 		echo "welcome add";
 } else {
 	echo "error 404";
 }