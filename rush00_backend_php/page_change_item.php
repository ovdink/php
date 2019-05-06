<?php
	include('get_list_category.php');
	include('get_list_items.php');
//print_r($_POST);
//print_r($_GET);
	function get_item($item){
		global $link;
		$sqlq = "SELECT * FROM items WHERE name='$item';";
		$res = mysql_query($sqlq, $link) or die("Error_Get_item_change : ").mysql_error();
		$arr = [];
		while ($item = mysql_fetch_array($res, MYSQL_ASSOC))
		{
			$arr[] = $item;
		}
		return $arr;
	}
	function get_cat_item($item_id){
		global $link;
		$sqlq = "SELECT * FROM products WHERE item_id=$item_id;";
		$res = mysql_query($sqlq, $link) or die("Error_get_cat_item : ").mysql_error();
		$arr = [];
		while ($item = mysql_fetch_array($res, MYSQL_ASSOC))
		{
			$arr[] = $item;
		}
		return $arr;
	}
	function check_select($check_id, $cat){
		if ($cat != NULL)
			foreach($cat as $key => $value){
				if ($value['category_id'] == $check_id){
					return TRUE;
				}
		}
		return FALSE;
	}
	if ($_GET['action'] == 'searchItem'){
		$arr = get_item($_POST['name'])[0];
		$cat = get_cat_item($arr['id']);
	//print_r($cat);
	}
?>
<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body> -->
	<form action="create_user.php?action=searchItem" method="post">
		<h1>Добавить/изменить товар</h1>
		<input type="text" name="name">
		<button type="submit" value="searchItem">Search</button>
	</form>
	<form action="add_items.php" method="post">
		<input type="text" placeholder="Name" name="name" value="<?php echo $arr['name'];?>" required>
		<input type="number" id="count" name="count" min="0" value="<?php echo $arr['count'] + 0;?>" required>
		<input type="number" placeholder="cost" name="cost" min="0" value="<?php echo $arr['cost'] + 0;?>" required>
		<input type="text" placeholder="Description" name="description" value="<?php echo $arr['description'];?>">
		<input type="text" placeholder="img url" name="img" value="<?php echo $arr['img'];?>">
<br>
	<p name="category">
<?php
	$list_cat = get_categories();
	foreach($list_cat as $key => $value){
?>
		<span><?php echo $value['name'];?></span>
		<input type="checkbox" name="categories[]" value="<?php echo $value['id'];?>" <?php echo (check_select($value['id'], $cat)) ? " checked" : ""?>>
<?php
	}
?>
	</p>
	<button type="submit">Submit</button>
	</form>
<!-- </body>
</html> -->