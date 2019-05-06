<?php
	include_once('install.php');
	$list_cat = get_categories();
	if ($_GET['action'] == 'change')
		$list_item = get_list_items_cat($_POST['cat']);
	else
		$list_item = get_list_items();
?>
<form action="main.php?action=change" method="post">
	<select name="cat" id="">
		<option value="1">Все товары</option>
<?php
		foreach($list_cat as $key => $value){
?>
			<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
<?php
		}
?>
	</select>
	<button type="submit">Изменить</button>
</form>

<?php
	foreach($list_item as $key => $value){
?>
<form action="add_to_basket.php" method="post">
	<img src="<?php echo $value['img']?>" alt="<?php echo $value['name']?>">
	<label for="" id="name"><?php echo $value['name']?></label>
	<label for="" id="name"><?php echo $value['description']?></label>
	<input type="hidden" name="product_id" value="<?php echo $value['id']?>">
	<label for="" id="cost"><?php echo $value['cost']?> руб.</label>
	<input type="number" id="count" name="count" min="0" value="0">
	<button>Add to basket</button>
</form>
<?php
}
?>