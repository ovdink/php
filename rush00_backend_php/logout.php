<?PHP
	session_start();
	unset($_SESSION['active_session']);
	unset($_SESSION['group_id']);
	unset($_SESSION['basket']);
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>
