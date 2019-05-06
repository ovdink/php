<?php
function action_set(){
	setcookie($_GET["name"], $_GET["value"]);
}

function action_get(){
	print_r($_COOKIE[$_GET["name"]]."\n");
}

function action_del(){
	setcookie($_GET["name"], $_GET["value"], 0);
}

switch ($_GET["action"]){
	case "set":
		action_set();
		break;
	case "get":
		action_get();
		break;
	case "del":
		action_del();
		break;
	default:
		break;
}
?>