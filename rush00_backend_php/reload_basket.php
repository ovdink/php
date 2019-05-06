<?php
	session_start();
	if ($_GET['action'] == "reload"){
		$id = $_GET['id'];
		$new_count = $_GET['count'];
		if ($new_count == 0)
			echo FALSE;
		$_SESSION['basket'][$id] = $new_count;
		echo $new_count;
	}
	else if ($_GET['action'] == "delete"){
		$id = $_GET['id'];
		unset($_SESSION['basket'][$id]);
		echo true;
	}
?>