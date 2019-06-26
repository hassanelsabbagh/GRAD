<?php

	session_start();
	 if (isset($_SESSION['Username'])){
	include 'connect.php';

	/*
	if(isset($_GET['id']) & !empty($_GET['id'])){
			$items = $_GET['id'];
			$_SESSION['cart'] = $items;
			echo "done";
	}else{
		echo "fail";
	} 

/*if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
	$items = $_SESSION['cart'];
	$cartitems = explode(",", $items);
	$items .= "," . $_GET['id'];
	$_SESSION['cart'] = $items;
	echo "success";
}else{
	$items = $_GET['id'];
	$_SESSION['cart'] = $items;
	echo "fail";
}*/


}else{
	 echo ' enta khammam ';
    header('Location: index.php');
    exit();
}

?>

