<?php
include_once("db_connect.php");
function deactivate_user($user){
	$row = [
		"active" => "0"
	];
	update_row("users", $user, $row);
}
?>