#!/usr/bin/php
<?php
$total = [];
if ($argc > 1) {
    for ($i = 1; $i < $argc; $i++) {
		$arr = explode(" ", $argv[$i]);
		$arr = array_diff($arr, [""]);
		$total = array_merge($total, $arr);
    }
	sort($total);
	foreach ($total as $key => $value) {
        echo "$value\n";
    }
}
?>
