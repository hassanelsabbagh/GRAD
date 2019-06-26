<?php
  session_start();
  if (isset($_SESSION['Username'])){

  	$pageTitle = 'home';
  	include 'includes/functions/functions.php';
  	include 'includes/templates/header.php';
  	include "includes/languages/english.php";
    include 'includes/templates/mainNav.php';
  	include 'includes/templates/navbar2.php';

  	include "includes/templates/footer.php";

  	

  	
  } else {
  	echo ' enta khammam ';
  	header('Location: index.php');
  	exit();
  }