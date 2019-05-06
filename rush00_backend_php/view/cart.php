<?php
	include_once('../install.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/stylecart.css" type="text/css">
	<title>CART</title>
</head>
<body>
<a href="index.php">На главную</a>
<form action="../buy_basket.php">
  <div class="container">
    <h1>Корзина</h1>
    <hr>
	<?php
	$total_sum = 0;
	if (isset($_SESSION['basket']))
		foreach($_SESSION['basket'] as $key => $value){
			$res = select_row("items", "WHERE id=$key");
?>
<div class="flex-container">
<div class="item" id="<?php echo "item_".$res['id']?>">
		<img src="<?php echo $res['img']?>" alt="" height="30px;">
		<span class="name"><?php echo $res['name']?></span>
		<input type="number" class="count" min="0" value="<?php echo $_SESSION['basket'][$key]?>" onchange="reload_item(this)">
		<span class="cost"><?php echo $res['cost']?> руб.</span>
		<span class="total_cost"><?php echo $res['cost'] * $_SESSION['basket'][$key]?> руб.</span>
		<button onclick="delete_item(this.value)" value="<?php echo $res['id']?>">Delete item</button>
</div>
</div>

<?php
			$total_sum += $res['cost'] * $_SESSION['basket'][$key];
		}
?>
    <hr>

    <button type="submit" class="registerbtn">Оплатить</button>
  </div>

<script>
function reload_item(id) {
	var str = id.parentElement.id;
	var id = str.replace('item_', "");
	var div = (document.getElementById("item_" + id));
	var elem = div.querySelectorAll('input.count')[0];
	var cost = parseFloat(div.querySelectorAll('span.cost')[0].innerHTML);
	var total = div.querySelectorAll('span.total_cost')[0];
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			elem.value = this.responseText;
			total.innerHTML = Math.floor(cost * elem.value * 100) / 100 + " руб.";
		}
	};
	xmlhttp.open("GET", "../reload_basket.php?action=reload&id=" + id + "&count=" + elem.value, true);
	xmlhttp.send();
}

function delete_item(id) {
	var div = (document.getElementById("item_" + id));
	var elem = div.querySelectorAll('input.count')[0];
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == true)
				location.reload(true);
		}
	};
	xmlhttp.open("GET", "../reload_basket.php?action=delete&id=" + id, true);
	xmlhttp.send();
}
</script>
</body>
</html>