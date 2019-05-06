<?php
	include_once('db_functions.php');
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
			'name' => 'count',
			'type' => 'INT NOT NULL'
		],
		[
			'name' => 'description',
			'type' => 'VARCHAR(200)'
		],
		[
			'name' => 'img',
			'type' => 'VARCHAR(300)'
		],
		[
			'name' => 'cost',
			'type' => 'DOUBLE NOT NULL DEFAULT 0'
		],
	];
	create_table("items", $column);

	$item = [
		'name' => 'JBLT500BTWHT',
		'count' => 77,
		'description' => 'Наушники Bluetooth JBL Tune 500BT White',
		'img' => 'https://img.mvideo.ru/Pdb/50122815b.jpg',
		'cost' => 2999.99
	];
	insert_row("items", $item, "name");
	$item = [
		'name' => 'TWS SBH-530',
		'count' => 97,
		'description' => 'Наушники Bluetooth InterStep TWS SBH-530 BT5.0 HiFi, Black',
		'img' => 'https://img.mvideo.ru/Pdb/50124943b.jpg',
		'cost' => 5990.78
	];
	insert_row("items", $item, "name");
	$item = [
		'name' => 'JBLT205BTBLK',
		'count' => 15,
		'description' => 'Наушники Bluetooth JBL Tune 205BT Black',
		'img' => 'https://img.mvideo.ru/Pdb/50117621b.jpg',
		'cost' => 3511.0
	];
	insert_row("items", $item, "name");

	$item = [
		'name' => 'SM-R500',
		'count' => 32,
		'description' => 'Смарт-часы Samsung Galaxy Watch Active SM-R500',
		'img' => 'https://img.mvideo.ru/Pdb/30043076b.jpg',
		'cost' => 16690.0
	];
	insert_row("items", $item, "name");
	$item = [
		'name' => 'SP1 Black',
		'count' => 85,
		'description' => 'Смарт-часы Jet Phone SP1 Black',
		'img' => 'https://img.mvideo.ru/Pdb/30038627b.jpg',
		'cost' => 1990.40
	];
	insert_row("items", $item, "name");
	$item = [
		'name' => 'S9m Black',
		'count' => 43,
		'description' => 'Смарт-часы Digma Smartline S9m Black',
		'img' => 'https://img.mvideo.ru/Pdb/30043145b.jpg',
		'cost' => 4990.0
	];
	insert_row("items", $item, "name");

	$item = [
		'name' => 'RSQ-10002',
		'count' => 54,
		'description' => 'Игровая мышь Red Square Model Z',
		'img' => 'https://img.mvideo.ru/Pdb/50046722b.jpg',
		'cost' => 690.0
	];
	insert_row("items", $item, "name");
	$item = [
		'name' => 'HX-MC002B',
		'count' => 35,
		'description' => 'Игровая мышь Kingston HyperX Pulsefire Surge RGB ',
		'img' => 'https://img.mvideo.ru/Pdb/50119416b.jpg',
		'cost' => 4490.50
	];
	insert_row("items", $item, "name");
	$item = [
		'name' => 'A4Tech X-87',
		'count' => 43,
		'description' => 'Игровая мышь A4Tech X-87 Maze',
		'img' => 'https://img.mvideo.ru/Pdb/50053415b.jpg',
		'cost' => 4990.0
	];
	insert_row("items", $item, "name");
?>