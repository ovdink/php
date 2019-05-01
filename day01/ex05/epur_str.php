#!/usr/bin/php
<?php
if ($argc == 2) {
	$str = trim($argv[1]);
	$arr = explode(" ", $str);
	$arr = array_diff($arr, [""]);
	$str = implode(" ", $arr);
	echo "$str\n";
}
?>
