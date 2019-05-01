#!/usr/bin/php
<?php
function ft_split($str) {
	$arr = explode(" ", $str);
	$arr = array_diff($arr, [""]);
	$arr = array_values($arr);
	sort($arr);
	return($arr);
}
?>
