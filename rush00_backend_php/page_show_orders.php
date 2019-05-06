<?php
	include_once('db_functions.php');
	include_once('db_connect.php');
	function get_list_orders(){
		global $link;
		$sqlq = "SELECT * FROM orders;";
		$res = mysql_query($sqlq, $link) or die("Error_get_orders : ").mysql_error();
		$arr = [];
		while ($item = mysql_fetch_array($res, MYSQL_ASSOC))
		{
			$arr[$item['id']] = $item;
		}
		return $arr;
	}
	session_start();
	$order = get_list_orders();
	// print_r($order);
	if ($order != []){
		foreach($order as $key => $value){
			$sqlq = "SELECT * FROM purchases WHERE check_id=".$value['id'];
			$res = mysql_query($sqlq, $link) or die("Error_get_orders : ").mysql_error();
			$subarr = [];
			while ($item = mysql_fetch_array($res, MYSQL_ASSOC))
			{
				$subarr[] = $item;
			}
			$arr[$value['id']] = $subarr;
		}
		// echo "<br>";
		// print_r($arr);
		// echo "<br>";
	}
?>
<?php
	if ($arr != []){
		foreach($arr as $key => $value){
?>
<div class="order" style="border: 2px solid #000; margin: 10px;">
<div class="order_id"><span>Номер заказа: <?php echo $key;?></span><br><span>Покупатель: <?php echo $order[$key]['user_id'];?></span></div>
<?php
			if ($value != []){
				foreach($value as $subkey => $subvalue){
?>
					<span>Артикул: <?php echo $subvalue['item_id']?></span>
					<span>Стоимость: <?php echo $subvalue['cost']?></span>
					<span>Количество: <?php echo $subvalue['count']?></span>
					<span>Суммарная стоимость: <?php echo $subvalue['count'] * $subvalue['cost']?></span>
					<br>
<?php
				}
			}
?>
</div>
<?php
		}
	}
?>
