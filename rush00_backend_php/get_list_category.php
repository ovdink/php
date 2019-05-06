<?php
	include_once('db_functions.php');
	function get_categories(){
		global $link;
		$sqlq = "SELECT * FROM categories;";
		$res = mysql_query($sqlq, $link) or die("Error_get_categories : ").mysql_error();
		$arr = [];
		while ($item = mysql_fetch_array($res, MYSQL_ASSOC))
		{
			$arr[$item['id']] = $item;
		}
		// array_shift($arr);
		return $arr;
	}
?>