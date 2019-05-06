<?PHP
	include_once('db_connect.php');
	function auth($login, $passwd)
	{
		if (!$login || !$passwd)
			return (false);
		global $link;
		$sqlq = "SELECT * FROM users WHERE login='".$login."';";
		$res = mysql_query($sqlq, $link) or die("Auth error: ").mysql_error();
		$res = mysql_fetch_array($res, MYSQL_ASSOC);
		// print_r($res);
		if ($res == "")
			return FALSE;
		$passwd = hash("sha256", $passwd);
		// echo "<br>";
		// print_r($passwd);
		// echo "<br>";
		// print_r($res['passwd']);
		// echo "<br>";
		if ($passwd === $res['passwd']){
			// echo "THIS";
			return $res;
		}
		else{
			// echo "THIS2";
			return FALSE;
		}
	}
?>
