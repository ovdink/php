#!/usr/bin/php
<?php
function wrong() {
	echo "Wrong Format\n";
	exit();
}

if ($argc == 2) {
	date_default_timezone_set ('Europe/Paris');
	$regexp = '/(\w+) (\d{1,2}) (\w+) (\d{4}) (\d{2}):(\d{2}):(\d{2})/i';
	preg_match($regexp, $argv[1], $pars);

	$arr0 = array(0 => 'dimanche', 1 => 'lundi', 2 => 'mardi', 3 => 'mercredi', 4 => 'jeudi', 5 => 'vendredi', 6 => 'samedi');
	$arr1 = array(1 => 'janvier', 2 => 'février', 3 => 'mars', 4 => 'avril', 5 => 'mai', 6 => 'juin', 7 => 'juillet', 8 => 'août', 9 => 'septembre', 10 => 'octobre', 11 => 'novembre', 12 => 'décembre');

	$day_week = $pars[1];
	$day = $pars[2];
	$month = $pars[3];
	$year = $pars[4];
	$hour = $pars[5];
	$minute = $pars[6];
	$second = $pars[7];

	if ($hour > 24 || $minute > 59 || $second > 59)
		wrong();

	$mon_num = array_search(strtolower($month), $arr1);

	$value = mktime($hour, $minute, $second, $mon_num, $day, $year);

	$day_num = (getdate($value)[wday]);
	$month_num = (getdate($value)[mon]);

	if ($arr0[$day_num] === strtolower($day_week) && ($month_num === $mon_num))
		echo "$value\n";
	else
		wrong();
}
?>
