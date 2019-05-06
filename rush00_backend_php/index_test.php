<?php
	include('install.php');
	include('get_list_category.php');
	include('get_list_items.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<?php
if (!isset($_SESSION['active_session'])){
?>
	<form action="login.php" method="get">
		Username: <input type="text" name="login" />
		<br />
		Password: <input type="password" name="passwd" />
		<input type="submit" name="submit" value="OK"/>
	</form>
<?php
}
else {
//print_r($_SESSION['active_session']);
//print_r($_SESSION);
?>
<form action="logout.php"><button type="submit">LogOut</button></form>
<?php
}
?>
	<main>
		<form action="add_to_basket.php" method="post">
			<input type="hidden" name="product_id" value="1">
			<input type="number" id="count" name="count" min="0" max="100" value="0">
			<button>Add to basket</button>
		</form>
		<form action="add_to_basket.php" method="post">
			<input type="hidden" name="product_id" value="2">
			<input type="number" id="count" name="count" min="0" max="100" value="0">
			<button>Add to basket</button>
		</form>
		<form action="add_to_basket.php" method="post">
			<input type="hidden" name="product_id" value="3">
			<input type="number" id="count" name="count" min="0" max="100" value="0">
			<button>Add to basket</button>
		</form>
		<form action="add_to_basket.php" method="post">
			<input type="hidden" name="product_id" value="4">
			<input type="number" id="count" name="count" min="0" max="100" value="0">
			<button>Add to basket</button>
		</form>
		<form action="add_to_basket.php" method="post">
			<input type="hidden" name="product_id" value="5">
			<input type="number" id="count" name="count" min="0" max="100" value="0">
			<button>Add to basket</button>
		</form>
		<form action="add_to_basket.php" method="post">
			<input type="hidden" name="product_id" value="6">
			<input type="number" id="count" name="count" min="0" max="100" value="0">
			<button>Add to basket</button>
		</form>
		<form action="clear_basket.php"><button type="submit">Clear</button></form>
	<footer>Footer</footer>
</body>
<form action="drop_db.php"><button type="submit">DropDB</button></form>

<br>
<form action="add_items.php" method="post">
<input type="text" placeholder="Name" name="name">
<input type="text" placeholder="Description" name="description">
<input type="number" id="count" name="count" min="0" value="0">
<input type="text" placeholder="img url" name="img">
<input type="number" placeholder="cost" name="cost" min="0" value="0">
<br>
<p name="category">
<?php
	$list_cat = get_categories();
	foreach($list_cat as $key => $value){
?>
	<span><?php echo $value['name'];?></span>
	<input type="checkbox" name="categories[]" value="<?php echo $value['id'];?>">
<?php
	}
?>
</p>
<button type="submit">Submit</button>
</form>

<form action="change_item.php" method="post">
<?php
	$list_items = get_list_items();
	foreach($list_items as $key => $value){
?>

<label>Name </label><input type="text" value="<?php echo $value['name']?>" name="name[]" disable>
<label>Count </label><input type="number" value="<?php echo $value['count']?>" name="count[]">
<label>Cost </label><input type="number" value="<?php echo $value['cost']?>" name="cost[]">
<label>Description </label><input type="text" value="<?php echo $value['description']?>" name="description[]">
<label>Img </label><input type="text" value="<?php echo $value['img']?>" name="img[]">
<input type="checkbox" name="change[]" value="<?php echo $value['id'];?>">
<select multiple name='category[]'>
<?php
	foreach($list_cat as $key => $value)
	{
?>
	<option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
<?php
	}
?>
</select>
<br>
<?php
	}
	// print_r($list_items);
?>
<br>
<button>SUBMIT</button>
</form>
<?php
	// print_r($_SESSION);
?>
</html>