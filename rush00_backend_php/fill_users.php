<?php
	include_once('db_functions.php');
	$column = [
		[
			'name' => 'id',
			'type' => 'INT AUTO_INCREMENT PRIMARY KEY'
		],
		[
			'name' => 'login',
			'type' => 'VARCHAR(20) NOT NULL'
		],
		[
			'name' => 'passwd',
			'type' => 'VARCHAR(100)'
		],
		[
			'name' => 'group_id',
			'type' => 'INT NOT NULL DEFAULT 1'
		],
		[
			'name' => 'active',
			'type' => 'INT NOT NULL DEFAULT 1'
		]
	];
	create_table("users", $column);

	$user = [
			'login' => 'test',
			'passwd' => hash("sha256", '123'),
	];
	insert_row("users", $user, "login");

	$user = [
		'login' => 'test2',
		'passwd' => hash("sha256", '123'),
	];
	insert_row("users", $user, "login");

	$user = [
		'login' => 'sudo',
		'passwd' => hash("sha256", 'sudo'),
		'group_id' => 100
	];
	insert_row("users", $user, "login");

	$user = [
		'login' => 'admin',
		'passwd' => hash("sha256", 'admin'),
		'group_id' => 10
	];
	insert_row("users", $user, "login");

?>