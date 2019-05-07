<?php
	session_start();
	if ($_POST['submit'] == 'OK' && $_POST['passwd'] != ""){
		$login = $_POST['login'];
		$pass = $_POST['passwd'];
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
				if ($val['login'] == $data['login']){
					$flag = 1;
					echo "ERROR\n";
				}
			}
		if ($flag != 1){
			$file[] = $data;
			$file = serialize($file);
			file_put_contents("../private/passwd", $file);
			echo "OK\n";
		}
	}
	else
		echo "ERROR\n";
?>