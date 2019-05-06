<?php
	include_once('db_functions.php');
	$HOST = "localhost:/tmp/mysql.sock";
	$USER = "root";
	$PASS = "qwas";
	$MAIN_DB = "store_db";
	$link = mysql_connect($HOST, $USER, $PASS) or die("Connect error(000): ".mysql_error());
	create_db("store_db");
	$select_db = mysql_select_db($MAIN_DB) or die("Select error(001): ".mysql_error());
?>