#!/usr/bin/php
<?php
function ft_is_sort($arr)
{
   $temp = $arr;
   sort($temp);
   $res = array_intersect_assoc($temp, $arr);
   if (count($res) == count($arr))
       return(true);
   else
       return(false);
}
?>
