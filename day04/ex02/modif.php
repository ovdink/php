<?php
	session_start();
	if ($_POST['submit'] == 'OK' && $_POST['oldpw'] != "" && $_POST['newpw'] != ""){
		$login = $_POST['login'];
		$pass = $_POST['newpw'];
		$oldp = $_POST['oldpw'];
		$data['login'] = $login;
		$data['passwd'] = hash("sha256", $pass);
		if (!file_exists("../private/passwd")){
			mkdir("../private");
			file_put_contents("../private/passwd", "");
		}
		$file = file_get_contents("../private/passwd");
		$file = unserialize($file);
		$flag = 0;
		if ($file)
			foreach($file as $key => $val){
				if ($flag == 0 && $val['login'] == $data['login'] && $val['passwd'] == hash("sha256", $_POST['oldpw'])){
					$file[$key]['passwd'] = hash("sha256", $_POST['oldpw']);
					$flag = 2;
				}
			}
		if ($flag != 0){
			$file[] = $data;
			$file = serialize($file);
			file_put_contents("../private/passwd", $file);
			echo "OK\n";
		}
		else
			echo "ERROR\n";
	}
	else
		echo "ERROR\n";
?>