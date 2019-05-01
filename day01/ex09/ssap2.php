#!/usr/bin/php
<?php
if ($argc > 1) {
$total = [];
for ($i = 1; $i < $argc; $i++) {
    $arr = explode(" ", $argv[$i]);
    $arr = array_diff($arr, [""]);
    $total = array_merge($total, $arr);
}
function cmp($a, $b){
        $i = 0;
        $line = "abcdefghijklmnopqrstuvwxyz0123456789!\"
        '#'$%&'()*+,-./:;<=>?@[\]^_`{|}~";
        while (($i < strlen($a)) || ($i < strlen($b)))
        {
            $a_index = stripos($line, $a[$i]);
            $b_index = stripos($line, $b[$i]);
            if ($a_index > $b_index)
                return (1);
            else if ($a_index < $b_index)
                return (-1);
            $i++;
        }
}
usort($total, "cmp");
foreach ($total as $value) {
    echo "$value\n";
}
}
?>
