#!/usr/bin/php
<?php
while (1) {
echo "Enter a number: ";
$c = trim(fgets(STDIN));
if (feof(STDIN)) {
	echo "\n";
	break ;
}
if (is_numeric($c)) {
	if ($c % 2 == 0)
		echo "The number $c is even \n";
	else
		echo "The number $c is odd \n";
}
else
	echo "'$c' is not a number \n";
}
?>
