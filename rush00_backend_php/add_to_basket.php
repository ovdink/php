<?php
	session_start();
	if ($_POST['count'] != 0){
		if (!isset($_SESSION['basket'])){
			$_SESSION['basket'] = [];
		}
		if (isset($_SESSION['basket'][$_POST['product_id']])){
			$_SESSION['basket'][$_POST['product_id']] += $_POST['count'];
		}
		else{
			$_SESSION['basket'][$_POST['product_id']] = $_POST['count'];
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>