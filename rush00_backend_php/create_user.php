<?PHP
include_once('db_functions.php');
include_once('db_connect.php');
session_start();
$res = [];
if ($_GET['action'] == 'delete' && $_POST['login'] != NULL){
	$sqlq = "DELETE FROM users WHERE login='".$_POST['login']."';";
	$res = mysql_query($sqlq, $link) or die("Error_user_change: ").mysql_error();
}
if ($_GET['action'] == 'deleteCat' && $_POST['name'] != NULL){
	$sqlq = "DELETE FROM categories WHERE name='".$_POST['name']."';";
	$res = mysql_query($sqlq, $link) or die("Error_user_change: ").mysql_error();
}
if ($_GET['action'] == 'deleteItem' && $_POST['name'] != NULL){
	$sqlq = "DELETE FROM items WHERE name='".$_POST['name']."';";
	$res = mysql_query($sqlq, $link) or die("Error_user_change: ").mysql_error();
}

if ($_GET['action'] == 'search')
{
	$res = select_row("users", "WHERE login='".$_POST['login']."'");
//print_r($res);
}
if ($_POST['login'] != NULL){
	global $link;
	$res = select_row("users", "WHERE login='".$_POST['login']."'");
	if ($res == [] && $_POST['passwd'] != NULL){
		$user = [
			'login' => $_POST['login'],
			'passwd' => hash("sha256", $_POST['passwd']),
			'group_id' => (isset($_POST['group_id'])) ? $_POST['group_id'] : '1'
		];
		insert_row("users", $user, "login");
	}
	else{
		$sqlq = "UPDATE users SET group_id=".((isset($_POST['group_id'])) ? $_POST['group_id'] : '1')." WHERE login='".$_POST['login']."';";
		$res = mysql_query($sqlq, $link) or die("Error_user_change: ").mysql_error();
		// echo "sqlq: "; print_r($sqlq);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Create user</title>
</head>
<body>
<a href="view/index.php">На главную</a>
<?php
if (isset($_SESSION['active_session']) && ($_SESSION['group_id'] == 10 || $_SESSION['group_id'] == 100) && false){
?>
<form action="create_user.php?action=search" method="post">
	<label for="">Login</label>
	<input type="text" name="login">
	<button type="submit">Search</button>
</form>
<?php
}
?>
<?php
	if ($_GET['action'] == 'search' && $res == [] && false){
?>
<h2>User not found <?php echo $_POST['login'];?></h2>
<?php
}
?>
<h1>Create user</h1>
	<form action="create_user.php" method="post">
		Username: <input type="text" name="login" value="<?php echo ($res != []) ? $res['login'] : "";?>"/>
		<br/>
		Password: <input type="password" name="passwd" />
<?php
		if ($_SESSION['group_id'] == 10 || $_SESSION['group_id'] == 100){
?>
		Groups:
		<select name="group_id" id="">
			<option value="1">Покупатель</option>
			<option value="2">Скидка 10%</option>
			<option value="3">Скидка 20%</option>
			<option value="4">Vip-пользователь</option>
<?php
		if ($_SESSION['group_id'] == 100){
?>
			<option value="10">Админ</option>
			<option value="100">Суперадмин</option>
<?php
		}
?>
		</select>
<?php
		}
?>
		<input type="submit" name="submit" value="OK"/>
	</form>
<hr>
<h1>Удалить пользователя</h1>
	<form action="create_user.php?action=delete" method="post">
		Username: <input type="text" name="login" value="<?php echo ($res != []) ? $res['login'] : "";?>"/>
		<input type="submit" name="submit" value="Удалить пользователя"/>
	</form>
<hr>
<h1>Удалить категорию</h1>
	<form action="create_user.php?action=deleteCat" method="post">
		Название: <input type="text" name="name" value="<?php echo ($res != []) ? $res['login'] : "";?>"/>
		<input type="submit" name="submit" value="Удалить категорию"/>
	</form>
<hr>
<h1>Добавить категорию:</h1>
<?php
include_once('add_category.php');
?>
<hr>
<?php
include_once('page_change_item.php');
?>
<hr>
<h1>Удалить товар</h1>
	<form action="create_user.php?action=deleteItem" method="post">
		Название: <input type="text" name="name" value="<?php echo ($res != []) ? $res['login'] : "";?>"/>
		<input type="submit" name="submit" value="Удалить товар"/>
	</form>
<hr>
<h1>Заказы</h1>
<?php
include_once('page_show_orders.php');
?>
</body>
</html>