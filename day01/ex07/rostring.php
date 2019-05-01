#!/usr/bin/php
<?php
if ($argc > 1) {
		$arr = explode(" ", $argv[1]);
		$arr = array_diff($arr, [""]);
		$temp = [$arr[0]];
		$arr[0] = "";
		$arr = array_diff($arr, [""]);
		$arr = array_merge($arr, $temp);
	foreach ($arr as $key => $value) {
        echo "$value ";
	}
	echo "\n";
}
?>
