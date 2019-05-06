<?php
	include_once('db_functions.php');
	$column = [
		[
			'name' => 'id',
			'type' => 'INT AUTO_INCREMENT PRIMARY KEY'
		],
		[
			'name' => 'check_id',
			'type' => 'INT NOT NULL'
		],
		[
			'name' => 'item_id',
			'type' => 'INT NOT NULL'
		],
		[
			'name' => 'cost',
			'type' => 'FLOAT NOT NULL'
		],
		[
			'name' => 'count',
			'type' => 'INT NOT NULL'
		]
	];
	create_table("purchases", $column);
?>