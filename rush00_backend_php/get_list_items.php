<?php
	include_once('db_functions.php');
	function get_list_items(){
		global $link;
		$sqlq = "SELECT * FROM items;";
		$res = mysql_query($sqlq, $link) or die("Error52 : ").mysql_error();
		$arr = [];
		while ($item = mysql_fetch_array($res, MYSQL_ASSOC))
		{
			$arr[$item['id']] = $item;
		}
		return $arr;
	}
	function get_list_items_cat($cat_id){
		global $link;
		$sqlq = "SELECT * FROM products WHERE category_id=".$cat_id.";";
		$res = mysql_query($sqlq, $link) or die("Error52 : ").mysql_error();
		$arr = [];
		while ($item = mysql_fetch_array($res, MYSQL_ASSOC))
		{
			$arr[$item['id']] = $item;
		}
		$res = [];
		foreach($arr as $key => $value){
			$sqlq = "SELECT * FROM items WHERE id=".$value['item_id'].";";
			$ressql = mysql_query($sqlq, $link) or die("Error52 : ").mysql_error();
			$subarr = [];
			while ($item = mysql_fetch_array($ressql, MYSQL_ASSOC))
			{
				$res[$item['id']] = $item;
				// print_r($res);
			}
		}
		return $res;
	}
?>