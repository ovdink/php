<?php
include_once('db_functions.php');
include_once('db_connect.php');
session_start();
if ($_GET['action'] == 'add'){
	if ($_POST['name'] != ""){
		global $link;
		if (select_row("categories", "WHERE name='".$_POST['name']."'") == ""){
			$category = [
				'name' => $_POST['name'],
				'description' => $_POST['description']
			];
			insert_row("categories", $category, "name");
		}
	}
}
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body> -->
	<form action="add_category.php?action=add" method="post">
		<label for="">Name</label><input type="text" name="name">
		<label for="">Description</label><input type="text" name="description">
		<button type="submit">Добавить</button>
	</form>
<!-- </body>
</html> -->