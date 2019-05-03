#!/usr/bin/php
<?php
if ($argc > 1) {
	$regexp = '/\w+/';
	preg_match_all ($regexp, $argv[1], $str);
	$str = implode(" ", $str[0]);
	print_r($str."\n");
}
?>
