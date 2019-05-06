<?php
	session_start();
	if (isset($_SESSION['basket']))
		unset($_SESSION['basket']);
	header("Location: view/index.php");
?>