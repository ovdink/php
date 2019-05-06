<?php
	include('install.php');
	session_start();
	date_default_timezone_set('UTC');
	if (!isset($_SESSION['basket'])){
		header("Location: view/index.php");
		exit();
	}
	$date = date("Y-m-d H:i:s");
	// $date = "2019-05-05 14:15:33";
	// print_r($_SESSION);
	echo "<br>";
	$list_item = get_list_items();
//print_r($list_item);
	$basket = $_SESSION['basket'];
//print_r($basket);
	function check_count(){
		global $link, $basket;
		$arr = [];
		$basket = $_SESSION['basket'];
		$_SESSION['available'] = [];
		foreach($basket as $key => $value){
			if ($value == 0){
				unset($basket[$key]);
				continue ;
			}
			$sqlq = "SELECT * FROM items WHERE id=".$key.";";
			$res = mysql_query($sqlq, $link) or die("Error_check_count : ").mysql_error();
			$res = mysql_fetch_array($res, MYSQL_ASSOC);
			$_SESSION['available'][$key] = $res['count'];
			if ($res['count'] < $value)
				$arr = array_merge($arr, [$res['name']]);
		}
		return $arr;
	}
	// print_r($list_item);
	$arr = check_count();
	if ($arr == [] && $basket != []){
		// print_r($_SESSION);
		$sqlq = "INSERT INTO orders(user_id, date_buy) VALUES(".$_SESSION['user_id'].", '".$date."');";
		$res = mysql_query($sqlq, $link) or die("Error_check_count : ").mysql_error();
		// print_r($sqlq);
		$sqlq = "SELECT * FROM orders WHERE user_id=".$_SESSION['user_id']." AND date_buy='".$date."';";
		$order = mysql_query($sqlq, $link) or die("Error_select_data : ").mysql_error();
		$order = mysql_fetch_array($order, MYSQL_ASSOC);
		// echo "<br>res="; print_r($order);
		foreach($basket as $key => $value){
			$sqlq = "UPDATE items SET count=".($_SESSION['available'][$key] - $value)." WHERE id=".$key.";";
			$res = mysql_query($sqlq, $link) or die("Error_check_count : ").mysql_error();
			$sqlq = "INSERT INTO purchases(check_id, item_id, cost, count) VALUES(".$order['id'].", ".$key.", ".$list_item[$key]['cost'].", ".$value.");";
			$res = mysql_query($sqlq, $link) or die("Error_check_count : ").mysql_error();
			// echo "<br>";print_r($sqlq);
		}
		unset($_SESSION['basket']);
		echo "DONE<br>";
	}
	else
	//print_r($arr);
	echo "<br>";
?>