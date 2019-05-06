<?PHP

	function ft_print_result($flag) {
		if ($flag)
			echo 'OK'."\n";
		else
			echo 'ERROR'."\n";
		exit ;
	}

	$content = file_get_contents("../private/passwd");
	if (!$content || !($array = unserialize($content)))
		ft_print_result(false);
	if ($_POST['login'] && $_POST['newpw'] && $_POST['oldpw'] && $_POST['submit'] == 'OK') {
		$login = $_POST['login'];
		$passwd = $_POST['newpw'];
		$old_passwd = hash("sha256", $_POST['oldpw']);
		$i = 0;
		while ($array[$i]) {
			if ($array[$i]['login'] == $login) {
				if ($array[$i]['passwd'] == $old_passwd)
				{
					$array[$i]["passwd"] = hash("sha256", $passwd);
					$new_content = serialize($array);
					file_put_contents("../private/passwd", serialize($array), true);
					ft_print_result(true);
				}
				else
					ft_print_result(false);
			}
			++$i;
		}
		ft_print_result(false);
	}
	else
		ft_print_result(false);

?>
