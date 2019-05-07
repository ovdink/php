<?PHP
	session_start();
	echo ($_SESSION['loggued_on_user'] != "") ? $_SESSION['loggued_on_user'] : 'ERROR';
	echo "\n";
?>