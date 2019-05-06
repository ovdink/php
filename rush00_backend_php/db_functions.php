<?php
include_once('db_connect.php');
function create_db($name){
	global $link;
	$sqlq = 'CREATE DATABASE IF NOT EXISTS '.$name.';';
	mysql_query($sqlq, $link) or die("Error0 : ").mysql_error();
}

function delete_db($name){
	global $link;
	$sqlq = 'DROP DATABASE IF EXISTS '.$name.';';
	mysql_query($sqlq, $link) or die("Error1 : ").mysql_error();
}

function create_table($name, $column){
	global $link;
	$sqlq = 'CREATE TABLE IF NOT EXISTS '.$name.' (';
	$flag = 0;
	foreach ($column as $elem)
	{
		if ($flag)
			$sqlq .= ', ';
		$sqlq .= $elem['name'].' '.$elem['type'];
		$flag = 1;
	}
	$sqlq .= ');';
	mysql_query($sqlq, $link) or die("Error2 : ").mysql_error();
}

function insert_row($name_table, $row, $param){
	global $link;
	$sqlq = "SELECT * FROM ".$name_table." WHERE ".$param."='".$row[$param]."';";
	$res = mysql_query($sqlq, $link) or die("Error3 : ").mysql_error();
	$res = mysql_fetch_array($res);
	if ($res == ""){
		$sqlq = 'INSERT INTO '.$name_table.'(';
		$flag = 0;
		foreach ($row as $key => $value){
			if ($flag == 1)
				$sqlq .= ', ';
			$sqlq .= $key;
			$flag = 1;
		}
		$sqlq .= ') VALUES(';
		$flag = 0;
		$flag_str = 0;
		foreach ($row as $key => $value){
			$flag_str = strstr($key, "id");
			if ($flag == 1)
				$sqlq .= ', ';
			if ($flag_str == false)
				$sqlq .= "'";
			$sqlq .= $value;
			if ($flag_str == false)
				$sqlq .= "'";
			$flag = 1;
		}
		$sqlq .= ');';
		$res = mysql_query($sqlq, $link) or die("Error44 : ").mysql_error();
		return TRUE;
	}
	return FALSE;
}

function insert_row_product($name_table, $row){
	global $link;
	$sqlq = "SELECT * FROM ".$name_table." WHERE item_id=".$row['item_id']." AND category_id=".$row['category_id'].";";
	// print($sqlq);		
	$res = mysql_query($sqlq, $link) or die("Error3 : ").mysql_error();
	$res = mysql_fetch_array($res);
	// echo "<br>";
	// print("{".$res."}");
	// echo "<br>";
	if ($res == ""){
		$sqlq = 'INSERT INTO '.$name_table.'(';
		$flag = 0;
		foreach ($row as $key => $value){
			if ($flag == 1)
				$sqlq .= ', ';
			$sqlq .= $key;
			$flag = 1;
		}
		$sqlq .= ') VALUES(';
		$flag = 0;
		$flag_str = 0;
		foreach ($row as $key => $value){
			$flag_str = strstr($key, "id");
			if ($flag == 1)
				$sqlq .= ', ';
			if ($flag_str == false)
				$sqlq .= "'";
			$sqlq .= $value;
			if ($flag_str == false)
				$sqlq .= "'";
			$flag = 1;
		}
		$sqlq .= ');';
		// print_r($sqlq);
		$res = mysql_query($sqlq, $link) or die("Error4 : ").mysql_error();
	}
	// echo "<br>";
	// print_r($sqlq);
	// echo "<br>";
}

function select_row($name_table, $row){
	global $link;
	$sqlq = "SELECT * FROM ".$name_table." ".$row.";";
	$res = mysql_query($sqlq, $link) or die("Error_select_row : ").mysql_error();
	$res = mysql_fetch_array($res, MYSQL_ASSOC);
	return $res;
}

function update_row($name_table, $user, $row){
	global $link;
	$res = "";
	foreach($row as $key => $value){
		$res .= $key."=";
		if (strstr($key, "id"))
			$res .= "'$value' ";
		else
			$res .= "$value ";
	}
	$sqlq = "UPDATE ".$name_table." SET ".$res." WHERE login='$user';";
	// print_r($sqlq);
	$res = mysql_query($sqlq, $link) or die("Error_update_row : ").mysql_error();
}
?>