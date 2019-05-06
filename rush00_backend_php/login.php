<?php
	include 'auth.php';
	session_start();
	// print_r(auth("test", "123321"));
	// print_r($_SERVER);
	if ($_GET['login'] != NULL && $_GET['passwd'] != NULL)
	{
		$login = $_GET['login'];
		$passwd = $_GET['passwd'];
		$res = auth($login, $passwd);
		// echo "login res: "; print_r($res);
		if ($res != FALSE)
		{
			$_SESSION['active_session'] = $res['login'];
			$_SESSION['user_id'] = $res['id'];
			$_SESSION['group_id'] = $res['group_id'];
			// print_r($_SESSION);
			// echo "OK\n";
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>