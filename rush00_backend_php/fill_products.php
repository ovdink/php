<?php
	$column = [
		[
			'name' => 'id',
			'type' => 'INT AUTO_INCREMENT PRIMARY KEY'
		],
		[
			'name' => 'item_id',
			'type' => 'INT NOT NULL'
		],
		[
			'name' => 'category_id',
			'type' => 'INT NOT NULL'
		]
	];
	create_table("products", $column);


	$product = [
		'item_id' => 1,
		'category_id' => 1
	];
	insert_row_product("products", $product);	
	$product = [
		'item_id' => 1,
		'category_id' => 2
	];
	insert_row_product("products", $product);
	$product = [
		'item_id' => 2,
		'category_id' => 1
	];
	insert_row_product("products", $product);	
	$product = [
		'item_id' => 2,
		'category_id' => 2
	];
	insert_row_product("products", $product);
	$product = [
		'item_id' => 3,
		'category_id' => 1
	];
	insert_row_product("products", $product);	
	$product = [
		'item_id' => 3,
		'category_id' => 2
	];
	insert_row_product("products", $product);

	$product = [
		'item_id' => 4,
		'category_id' => 1
	];
	insert_row_product("products", $product);	
	$product = [
		'item_id' => 4,
		'category_id' => 3
	];
	insert_row_product("products", $product);
	$product = [
		'item_id' => 5,
		'category_id' => 1
	];
	insert_row_product("products", $product);	
	$product = [
		'item_id' => 5,
		'category_id' => 3
	];
	insert_row_product("products", $product);
	$product = [
		'item_id' => 6,
		'category_id' => 1
	];
	insert_row_product("products", $product);	
	$product = [
		'item_id' => 6,
		'category_id' => 3
	];
	insert_row_product("products", $product);

	$product = [
		'item_id' => 7,
		'category_id' => 1
	];
	insert_row_product("products", $product);	
	$product = [
		'item_id' => 7,
		'category_id' => 4
	];
	insert_row_product("products", $product);
	$product = [
		'item_id' => 8,
		'category_id' => 1
	];
	insert_row_product("products", $product);	
	$product = [
		'item_id' => 8,
		'category_id' => 4
	];
	insert_row_product("products", $product);
	$product = [
		'item_id' => 9,
		'category_id' => 1
	];
	insert_row_product("products", $product);	
	$product = [
		'item_id' => 9,
		'category_id' => 4
	];
	insert_row_product("products", $product);
?>