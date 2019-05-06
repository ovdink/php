<?php
	$table_name = "user_groups";
	$column = [
		[
			'name' => 'id',
			'type' => 'INT AUTO_INCREMENT PRIMARY KEY'
		],
		[
			'name' => 'name',
			'type' => 'VARCHAR(20) NOT NULL'
		],
		[
			'name' => 'privilege',
			'type' => 'VARCHAR(200)'
		],
		[
			'name' => 'discount',
			'type' => 'INT'
		]
	];
	create_table($cat, $column);


	$group = [
		'name' => 'default',
		'privilege' => ''
	];
	insert_row($table_name, $group, "name");
	
	$group = [
		'name' => 'superadmin',
		'privilege' => ''
	];
	insert_row($table_name, $group, "name");

	$group = [
		'name' => 'admin',
		'privilege' => ''
	];
	insert_row($table_name, $group, "name");

	$group = [
		'name' => 'club',
		'privilege' => 'discount',
		'discount' => '5'
	];
	insert_row($table_name, $group, "name");

	$group = [
		'name' => 'vip',
		'privilege' => 'discount',
		'discount' => '15'
	];
	insert_row($table_name, $group, "name");
?>