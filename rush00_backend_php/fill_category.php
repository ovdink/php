<?php
	$table_name = "categories";
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
			'name' => 'description',
			'type' => 'VARCHAR(200)'
		]
	];
	create_table($table_name, $column);


	$category = [
		'name' => 'All products',
		'description' => 'Description cat 0'
	];
	insert_row($table_name, $category, "name");
	
	$category = [
		'name' => 'Headphones',
		'description' => 'Headphones'
	];
	insert_row($table_name, $category, "name");

	$category = [
		'name' => 'Watch',
		'description' => 'Watch'
	];
	insert_row($table_name, $category, "name");

	$category = [
		'name' => 'Mouse',
		'description' => 'Mouse'
	];
	insert_row($table_name, $category, "name");


	$category = [
		'name' => 'DC',
		'description' => 'DC'
	];
	insert_row($table_name, $category, "name");

	$category = [
		'name' => 'Marvel',
		'description' => 'Marvel'
	];
	insert_row($table_name, $category, "name");

	$category = [
		'name' => 'Манга',
		'description' => 'Манга'
	];
	insert_row($table_name, $category, "name");

	$category = [
		'name' => 'На русском',
		'description' => 'На русском'
	];
	insert_row($table_name, $category, "name");
?>