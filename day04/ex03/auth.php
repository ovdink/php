<?PHP
	function auth($login, $passwd)
	{
		if (!$login || !$passwd)
			return (false);
		$content = file_get_contents("../private/passwd");
		if (!$content || !($array = unserialize($content)))
			return (false);
		$passwd = hash("sha256", $passwd);
		$i = 0;
		while ($array[$i]) {
			if ($array[$i]['login'] == $login) {
				if ($array[$i]['passwd'] == $passwd)
					return (true);
			}
			++$i;
		}
		return (false);
	}
?>
