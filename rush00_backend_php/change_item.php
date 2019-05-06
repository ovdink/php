<?php
	include_once('db_connect.php');
//print_r($_POST);
	function update_item($name_table, $check, $row){
		global $link;
		$res = "name='".$row['name']."', count=".$row['count'].", description='".$row['description']."', img='".$row['img']."'";
		$sqlq = "UPDATE ".$name_table." SET ".$res." WHERE id='$check';";
		exit();
		$res = mysql_query($sqlq, $link) or die("Error90 : ").mysql_error();
	}
	if (isset($_POST['change']))
		foreach($_POST['change'] as $key => $value){
			if ($_POST['name'][$value - 2] != ""){
				$row = [
					'name' => $_POST['name'][$value - 2],
					'count' => $_POST['count'][$value - 2],
					'description' => $_POST['description'][$value - 2],
					'img' => $_POST['img'][$value - 2]
				];	
				update_item("items", $value, $row);
			}
		}
?>