<?php

	function getTitle(){
		global $pageTitle;

		if (isset ($pageTitle)){
			echo $pageTitle;
		}else{
			echo 'Default';
		}
	}

	function redirectHome($Msg, $url = null, $seconds = 3){

		if ($url === null){

			$url = 'index.php';

			$link = 'Homepage';

		} else{ 
			if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !=='' ){
			$url = $_SERVER['HTTP_REFERER'];

			$link = 'Previous Page';

		} else{

			$url = 'index.php';
		}

		}
		echo $Msg;

			echo "<div class='alert alert-info'>You will be redirected to $link after $seconds seconds</div>";

			header("refresh:$seconds;url=$url");	

		exit();

			}

	function checkItem($select, $from, $value){

		global $con;

		$stmt = $con->prepare("SELECT $select FROM $from WHERE $select =?");

		$stmt->execute(array($value));

		$count = $stmt->rowCount();

		return $count;
	}

		function checkItem2($select1, $select2, $from, $value1, $value2){

		global $con;

		$stmt = $con->prepare("SELECT $select1, $select2 FROM $from WHERE $select1 =? AND $select2=?");

		$stmt->execute(array($value1, $value2));

		$count = $stmt->rowCount();

		return $count;
	}

	function getGames(){

		global $con;

		$getGames= $con->prepare("SELECT * FROM playstation4 INNER JOIN users ON playstation4.user_id = users.usrID");

		$getGames->execute();

		$games = $getGames->fetchAll();

		return $games;
	}