<?php
	$user_name = "zaz";
	$password = "jaimelespetitsponeys";
	$code = base64_encode($user_name.":".$password);
	$base64_login = explode(" ", $_SERVER[HTTP_AUTHORIZATION])[1];
	if ($code != $base64_login){
		header("WWW-Authenticate: Basic realm='Member area'");
		header("Content-type: text/html");
?>
<html><body>That area is accessible for members only</body></html>
<?php
	}
	else{
		$file = file_get_contents("42.png");
		$base64_img = base64_encode($file);
?>
<html><body>
Hello Zaz<br />
<img src="data:image/png;base64,<?php echo $base64_img ?>">
</body></html>
<?php
	}
?>