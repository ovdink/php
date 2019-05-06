<?php
	include_once('db_functions.php');
	session_start();
	function update_item_row($name_table, $check, $row){
		global $link;
		$res = "name='".$row['name']."', count=".$row['count'].", description='".$row['description']."', img='".$row['img']."'";
		$sqlq = "UPDATE ".$name_table." SET ".$res." WHERE name='$check';";
		$res = mysql_query($sqlq, $link) or die("Error51 : ").mysql_error();
	}
	function remove_product($name){
		global $link;
		$sqlq = "SELECT id FROM items WHERE name='$name'";
		$res = mysql_query($sqlq, $link) or die("Error55 : ").mysql_error();
		$res = mysql_fetch_array($res);
		$sqlq = "DELETE FROM products WHERE item_id=".$res['id'].";";
		// print_r($sqlq);
		$res = mysql_query($sqlq, $link) or die("Error554 : ").mysql_error();
		// $arr = [];
		// while ($item = mysql_fetch_array($res, MYSQL_ASSOC))
		// {
		// 	$arr[] = $item;
		// }
	}
	if ($_POST['name'] != ""){
		$item = [
			'name' => $_POST['name'],
			'count' => (isset($_POST['count'])) ? $_POST['count'] + 0 : 0,
			'description' => $_POST['description'],
			'img' => $_POST['img'],
			'cost' => (isset($_POST['cost'])) ? $_POST['cost'] + 0 : 0
		];
		if (insert_row("items", $item, "name") == FALSE){
			update_item_row("items", $item['name'], $item);
			remove_product($item['name']);
		};

		$sqlq = "SELECT id FROM items WHERE name='".$_POST['name']."';";
		$res = mysql_query($sqlq, $link) or die("Error55 : ").mysql_error();
		$res = mysql_fetch_array($res);
		$product = [
			'item_id' => $res['id'],
			'category_id' => 1
		];
		insert_row_product("products", $product);
		if (isset($_POST['categories']))
			foreach($_POST['categories'] as $key => $value){
				$product = [
					'item_id' => $res['id'],
					'category_id' => $value
				];
				insert_row_product("products", $product);		
			}
		header("Location: view/index.php");
	}
?>