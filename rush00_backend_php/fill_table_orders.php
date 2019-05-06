<?php
	include_once('db_functions.php');
	$column = [
		[
			'name' => 'id',
			'type' => 'INT AUTO_INCREMENT PRIMARY KEY'
		],
		[
			'name' => 'user_id',
			'type' => 'INT NOT NULL'
		],
		[
			'name' => 'date_buy',
			'type' => 'DATETIME'
		]
	];
	create_table("orders", $column);
?>