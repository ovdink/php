#!/usr/bin/php
<?php
function ft_split($str){
    $split = explode(" ", $str);
    $split = array_diff($split, [""]);
    return ($split);
}
$argv[1] = array_values(ft_split($argv[1]));
$argv[2] = array_values(ft_split($argv[2]));
$argv[3] = array_values(ft_split($argv[3]));
if ((count($argv[1]) == 1) && (count($argv[2]) == 1) && (count($argv[3]) == 1))
{
if ($argc == 4 && is_numeric($argv[1][0]) && is_numeric($argv[3][0])) {
	if ($argv[2][0] == '+')
		echo($argv[1][0] + $argv[3][0]."\n");
	else if ($argv[2][0] == '-')
		echo($argv[1][0] - $argv[3][0]."\n");
	else if ($argv[2][0] == '*')
	   	echo($argv[1][0] * $argv[3][0]."\n");
	else if ($argv[2][0] == '/')
		echo($argv[1][0] / $argv[3][0]."\n");
	else if ($argv[2][0] == '%')
		echo($argv[1][0] % $argv[3][0]."\n");
	else
		echo ("Incorrect Parametrs\n");

}
else
	echo ("Incorrect Parameters\n");
}
else
	echo ("Incorrect Parameters\n");
?>
